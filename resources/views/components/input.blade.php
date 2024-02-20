@php
    if ($errors->has($attributes['name'])) {
        $class = 'form-control is-invalid shadow-sm';
    } else {
        $class = 'form-control shadow-sm';
    }
    if ($attributes['placeholder']) {
        $placeholder = str()->ucfirst(str()->replace('_', ' ', $attributes['placeholder']));
    } else {
        $placeholder = str()->ucfirst(str()->replace('_', ' ', $attributes['name']));
    }
@endphp

<input {{ $attributes->merge(['class' => $class]) }} placeholder="{{ $placeholder }}" />
