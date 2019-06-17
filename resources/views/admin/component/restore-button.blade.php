<form action="{{ $link }}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-success">@lang('Label.Restore')</button>
</form>