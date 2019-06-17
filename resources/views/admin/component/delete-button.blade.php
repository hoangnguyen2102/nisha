<form action="{{ $link }}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger">@lang('Label.Delete')</button>
</form>