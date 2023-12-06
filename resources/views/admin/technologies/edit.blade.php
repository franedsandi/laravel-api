@extends('layouts.admin')
@section('content')
<h1>Modify your technology knowledge {{$technology->name}}</h1>

<form action="{{ route('admin.technologies.update', $technology) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Technology Name </label>
        <input type="text" class="form-control" id="name" name="name" value="{{$technology->name}}" >
        @error('name')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Technology Experience Description</label>
        <textarea type="text" class="form-control" id="description" name="description" rows="3" >{{$technology->description}}
        </textarea>
        @error('description')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="level" class="form-label">Technology personal level</label>
        <input type="number" class="form-control" id="level" name="level" value="{{$technology->level}}">
        @error('level')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="d-flex gap-2 mt-2">
        <button type="submit" class="btn btn-warning"> Submit</button>
        <button type="reset" class="btn btn-danger"> Reset</button>
    </div>
</form>
@endsection