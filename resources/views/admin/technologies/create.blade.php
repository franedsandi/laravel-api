@extends('layouts.admin')
@section('content')
<div class="container py-5">
    <h1>Add new technology knowledge </h1>
    <form action="{{ route('admin.technologies.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Technology Name </label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" >
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="description" class="form-label">Technology Experience Description</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="3" >{{old('description')}}
            </textarea>
            @error('description')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="level" class="form-label">Technology personal level</label>
            <input type="number" class="form-control" id="level" name="level" value="{{old('level')}}">
            @error('level')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    
        <div class="d-flex gap-2 mt-2">
            <button type="submit" class="btn btn-warning"> Submit</button>
            <button type="reset" class="btn btn-danger"> Reset</button>
        </div>
    </form>

</div>

@endsection