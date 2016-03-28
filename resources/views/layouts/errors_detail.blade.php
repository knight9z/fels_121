@if ($errors->has($fieldError))
    <span class="help-block">
        <strong>{{ $errors->first($fieldError) }}</strong>
    </span>
@endif