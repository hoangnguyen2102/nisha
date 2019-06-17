<form action="{{ $link }}" method="POST">
    @method('PUT')
    @csrf
    <input type="hidden" name="data" value="{{ $id }}">
    <button type="submit" class="btn btn-success">@lang('Label.Confirm')</button>
</form>