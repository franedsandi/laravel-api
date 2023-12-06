@extends('layouts.admin')
@section('content')

<div class="container py-5">
<h1>Modify the information of the project {{$project->title}}</h1>

<form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Project Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$project->title}}" >
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Project Description</label>
        <textarea type="text" class="form-control" id="description" name="description" rows="3" >{{$project->description}}
        </textarea>
    </div>
    <div class="mb-3">
        <label for="publication_date" class="form-label">Project Publication Date</label>
        <input type="date" class="form-control" id="publication_date" name="publication_date" value="{{$project->publication_date}}">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Project Picture</label>
        <input type="file" class="form-control" id="image" name="image" onchange="showImage(event)">
        @if ($project)
            <img id="thumb" width="150px" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" onerror="this.src='/img/placeholder.png'">
        @endif
    </div>
    <div class="mb-3">
        <label for="type_id" class="form-label">Project Type</label>
        <select class="form-control" id="type_id" name="type_id">
            <option value="">Select Type</option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($technologies as $technology )
                <input
                id="technology_{{$technology->id}}"
                class="btn-check"
                autocomplete="off"
                type="checkbox"
                name="technologies[]"
                value="{{$technology->id}}"
                @if ($errors->any() && in_array($technology->id,old('technologies',[])))
                    checked
                @elseif (!$errors->any() && $project->technologies->contains($technology))
                    checked
                @endif
                >

                <label
                class="btn btn-outline-dark"
                for="technology_{{$technology->id}}">{{$technology->name}}</label>
            @endforeach
        </div>
    </div>

    <div class="d-flex gap-2 mt-2">
        <button type="submit" class="btn btn-warning"> Submit</button>
        <button type="reset" class="btn btn-danger"> Reset</button>
    </div>
</form>
</div>
<script>
    function showImage(event){
        const thumb = document.getElementById('thumb');
        thumb.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection
