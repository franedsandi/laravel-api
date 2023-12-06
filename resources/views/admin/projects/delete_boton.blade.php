<form
action="{{route('admin.projects.destroy', $project) }}"
method="Post"
onsubmit="return confirm('Are you sure you want to DELETE the project {{$project->title}}')">

    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>
</form>