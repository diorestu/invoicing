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


<div class="mb-3 row">
    <label for="" class="col-md-2 col-form-label">{{ $label }}</label>
    <div class="col-md-10">
        <input {{ $attributes->merge(['class' => $class]) }} placeholder="{{ $placeholder }}" />
    </div>
</div>
