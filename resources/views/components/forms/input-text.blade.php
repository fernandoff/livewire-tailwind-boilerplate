@props(['name', 'label', 'inline'])

@php

if(!empty($slot) && strlen($slot) > 0){
    $finalLabel = $slot;
}
else if(!empty($label) && strlen($label) > 0){
    $finalLabel = $label;
}
else{
    $finalLabel = ucfirst($name);
}

@endphp

<label for="{{ $name }}"
       class="mt-3">
    {{ $finalLabel }}
</label>

@if(empty($inline))
    <br>
@endif

<input type="text" name="{{ $name }}" {{ $attributes }} >
<div>
    @error($name) <span class="error">{{ $message }}</span> @enderror
</div>
