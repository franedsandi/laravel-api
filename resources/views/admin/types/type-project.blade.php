@extends('layouts.admin')

@section('content')
    <div>
        <h1>Projects List by Type</h1>

        <table class="table table-dark text-center" >
        <thead>
          <tr>
            <th class="col-4" scope="col">ID</th>
            <th class="col-4" scope="col">Type</th>
            <th class="col-4" scope="col">Posts</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
            <tr>
                <td>{{$type->id}}</td>
                <td>{{$type->name}}</td>
                <td>
                    <ul class="list-unstyled">
                        @foreach ($type->projects as $project)
                        <li>
                            <a href="{{route('admin.projects.show', $project)}}">{{$project->title}}</a>
                        </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>

        </table>
    </div>
@endsection
