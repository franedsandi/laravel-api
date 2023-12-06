@extends('layouts.admin')

@section('content')
<div>
<h1>Index Types</h1>

    <form action="{{ route('admin.types.store') }}" method="POST">
        @csrf
        <div class="d-flex mb-3 border border-3 border-black">
            <input type="text" class="form-control" placeholder="New Type" name="name">
            <button class="btn btn-outline-secondary border-0 rounded-0" type="submit" id="button-addon2">Create</button>
        </div>
        @error('name')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </form>

    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Name Types</th>
            <th class="col-2 text-center" scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($types as $type)
                <tr>
                    <td>
                        <form
                          class="d-none"
                          action="{{ route('admin.types.update', $type) }}"
                          method="POST"
                          id="form-edit-{{ $type->id }}">
                          @csrf
                          @method('PUT')
                          <input type="text" class="form-cst w-25" value="{{ $type->name }}" name="name">

                          <button onclick="submitForm({{ $type->id }})" class="btn btn-warning">Send</button>
                        </form>
                        <span id="name-{{ $type->id }}" class="">{{ $type->name }}</span>

                    </td>

                    <td class="d-flex justify-content-center gap-2">

                        <button onclick="startEdit({{ $type->id }})" class="btn btn-warning">Edit</button>
                        @include('generic_stuff.generic_delete_buton', [
                            'route' => route('admin.types.destroy', $type),
                            'message' => 'Are you sure you want to delete this type?',
                        ])

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <script>
        function submitForm(id) {
            const form = document.getElementById('form-edit-' + id);
            form.submit();

            const name = document.getElementById('name-' + id);
            form.classList.add('d-none');
            name.classList.remove('d-none');
        }


        function startEdit(id) {
            const form = document.getElementById('form-edit-' + id);
            const name = document.getElementById('name-' + id);

            form.classList.remove('d-none');
            name.classList.add('d-none');
        }

    </script>
@endsection
