<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TypeRequest;


class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }
    public function typeProject(){
        $types = Type::all();
        return view('admin.types.type-project', compact('types'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeRequest $request)
    {
        $exist = Type::where('name', $request->name)->first();
        if($exist){
            return redirect()->route('admin.types.index')->with('error', 'Type already exist');
        }else{
            $new_type = new Type();
            $new_type->name = $request->name;
            $new_type->slug = Type::generateSlug($request['name']);
            $new_type->save();
            return redirect()->route('admin.types.index')->with('success', 'Type created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeRequest $request,  Type $type)
    {
        $val_edit_data = $request->validate([
            'name' =>'required|max:50',
        ]);

        $exist = Type::where('name', $request->name)->first();
        if($exist){
            return redirect()->route('admin.types.index')->with('error', 'Type already exist');
        }

        if ($type->title === $val_edit_data['name']) {
            $val_edit_data['slug'] = $val_edit_data->slug;
        } else {
            $val_edit_data['slug'] = Type::generateSlug($val_edit_data['name']);
        }

        $type->update($val_edit_data);

        return redirect()->route('admin.types.index')->with('success', 'Type updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index')->with('success', 'Type deleted');
    }
}
