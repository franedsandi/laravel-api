@extends('layouts.admin')

@section('content')
    <div class="top d-flex align-items-center justify-content-between my-4">
        <h1>Technology List</h1>
        <a class="btn btn-light" href="{{route('admin.technologies.create')}}">
            <i class="fa-solid fa-plus fa-beat-fade"></i>
            <span>Add new technology</span>
        </a>
    </div>
    @if(session('deleted'))
    <div class="alert alert-danger">
        {{ session('deleted') }}
    </div>
    @endif
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Level</th>
                <th class="col-2 text-center" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($technologies as $technology)
            <tr>
                <th>{{ $technology->id }}</th>
                <td>{{ $technology->name }}</td>
                <td>{{ $technology->level }}</td>
                <td class="text-center">
                    <div class="d-flex gap-2 justify-content-center">
                        @include('generic_stuff.generic_show_buton', ['route' => route('admin.technologies.show', $technology)])
                        @include('generic_stuff.generic_edit_buton', ['route' => route('admin.technologies.edit', $technology)])
                        @include('generic_stuff.generic_delete_buton', ['route' => route('admin.technologies.destroy', $technology)])
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $technologies->links()}}





@endsection
