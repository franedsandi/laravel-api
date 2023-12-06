@extends('layouts.admin')


@section('content')

<div class="container py-5">
    <h1>Create a new project display{{$project->title}}</h1>
    <form action="{{ route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Project Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" >
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
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
                @if (in_array($technology->id,old('technologies',[])))
                    checked
                @endif
                >

                <label
                class="btn btn-outline-dark"
                for="technology_{{$technology->id}}">{{$technology->name}}</label>
            @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Project Description</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="3" >{{old('description')}}
            </textarea>
            @error('description')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="publication_date" class="form-label">Project Publication Date</label>
            <input type="date" class="form-control" id="publication_date" name="publication_date" value="{{old('publication_date')}}">
            @error('publication_date')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Project Picture</label>
            <input type="file" class="form-control" id="image" name="image"
            onchange="showImage(event)" value="{{old('image')}}">
            <img id="thumb" width="150" onerror="this.src='/img/placeholder.png'"  src="{{ asset('storage/' . $project?->image) }}" />
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Project Type</label>
            <select name="" id=""></select>
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Project Type</label>
            <select class="form-control" id="type_id" name="type_id">
                <option value="">Select Type</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
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
