<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Technology;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\TechnologyRequest;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::orderBy('id', 'desc')->paginate(4);
        return view('admin.technologies.index', compact('technologies'));
    }
    public function projectTechnology(Technology $technology){
        $project = $technology->projects;
        return view('admin.technologies.project-technology', compact('project','technology'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TechnologyRequest $request)
    {
        $form_data = $request->all();
        $new_technology = new Technology();
        $form_data['slug'] = Technology::generateSlug($form_data['name']);
        $new_technology->fill($form_data);
        $new_technology->save();
        return redirect()->route('admin.technologies.show',  $new_technology->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TechnologyRequest $request, Technology $technology)
    {
        $form_data = $request->all();

        if ($technology->name === $form_data['name']) {
            $form_data['slug'] = $technology->slug;
        } else {
            $form_data['slug'] = Technology::generateSlug($form_data['name']);
        }

        $technology->update($form_data);

        return redirect()->route('admin.technologies.show', ['technology' => $technology->id])->with('updated', "Your experience with $technology->name have been updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('deleted', "The technology $technology->name has been deleted successfully");
    }
}
