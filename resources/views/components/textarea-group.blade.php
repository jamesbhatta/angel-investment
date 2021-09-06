@props(['label' => false, 'name'])
<x-form-group>
    @if($label)
    <label class="form-label">{{ $label }}</label>
    @endif
    <textarea name="{{ $name }}" class="form-control  {{ invalid_class($name) }}" cols="30" rows="10">{{ $slot }}</textarea>
    <x-invalid-feedback :field="$name"></x-invalid-feedback>
</x-form-group>