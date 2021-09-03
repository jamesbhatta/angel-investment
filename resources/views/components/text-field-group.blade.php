@props(['label' => false, 'name'])
<x-form-group>
    @if($label)
    <label class="form-label">{{ $label }}</label>
    @endif
    <input type="text" name="{{ $name }}" class="form-control {{ invalid_class($name) }}" {{ $attributes }}>
    <x-invalid-feedback :field="$name"></x-invalid-feedback>
</x-form-group>