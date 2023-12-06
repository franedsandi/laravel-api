@extends('layouts.admin')
@section('content')
<h1>projets with {{$technology->name}}</h1>

<ul>
    @foreach ($technology->projects as $project )
        <li><a href="{{route('admin.projects.show', $project)}}">{{$project->title}}</a></li>
    @endforeach
    
</ul>
@endsection
