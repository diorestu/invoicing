<select {!! $attributes->merge([
    'class' => $errors->has($attributes['name']) ? 'form-select is-invalid shadow-sm' : 'form-select shadow-sm',
]) !!}>
    {{ $slot }}
</select>
