@props(['disabled' => false, 'placeholder' => ''])

<input @disabled($disabled)
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => 'form-control bg-transparent']) }}>
