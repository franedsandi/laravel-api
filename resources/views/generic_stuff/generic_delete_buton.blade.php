<form
    action="{{ $route }}"
    method="POST"
    onsubmit="return confirm('Are you sure you want to DELETE this item?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>
</form>