@extends('layouts.admin')

@section('content')


<div class="container">

    <h1 class="py-5">Project Details</h1>

    @if(session('updated'))
    <div class="alert alert-success">
        {{ session('updated') }}
     </div>
    @endif
        <div class="card mb-5" style="width: 100%;">

            <div class="card">
                <div class="card-body">
                <h2 class="card-title">{{ $technology->name}}</h2>
                <h4>Personal Level: {{ $technology->level}}/5</h4>
                <p class="card-text">{{ $technology->description }}</p>
                <div class="d-flex  justify-content-center gap-2">
                    @include('generic_stuff.generic_edit_buton', ['route' => route('admin.technologies.edit', $technology)])
                    @include('generic_stuff.generic_delete_buton', ['route' => route('admin.technologies.destroy', $technology)])
                </div>
                </div>
            </div>

        </div>
        <a class="btn btn-light fw-bold" href="{{ route('admin.technologies.index')}}"><i class="fa-solid fa-arrow-left"></i></a>

</div>


@endsection