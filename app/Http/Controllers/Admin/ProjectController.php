<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(7);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = new Project();
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('project', 'types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = Project::generateSlug($form_data['title']);

        if (array_key_exists('image', $form_data)) {
            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
            $form_data['image'] = Storage::put('uploads', $form_data['image']);
        }


        $new_project = Project::create($form_data);

        if (array_key_exists('technologies', $form_data)) {
            $new_project->technologies()->attach($form_data['technologies']);
        }

        return redirect()->route('admin.projects.show', $new_project->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();


        if ($project->title === $form_data['title']) {
            $form_data['slug'] = $project->slug;
        } else {
            $form_data['slug'] = Project::generateSlug($form_data['title']);
        }
        if(array_key_exists('image', $form_data)){
            if($project->image){
                Storage::disk('public')->delete($project->image);
            }
            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
            $form_data['image'] = Storage::put('uploads', $form_data['image']);
        }


        $project->update($form_data);

        if (array_key_exists('technologies', $form_data)) {
            $project->technologies()->sync($form_data['technologies']);
        }
        else{
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.show', ['project' => $project->id])->with('updated', "The project $project->title have been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('deleted', "The project $project->title have been deleted successfully");
    }
}
