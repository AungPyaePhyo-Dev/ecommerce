<form action="{{ $action }}" method="post" class="d-inline">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-sm" type="submit"><i class="material-icons">delete</i>  </button>
  </form>