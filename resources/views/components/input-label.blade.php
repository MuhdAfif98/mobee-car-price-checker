@props(['value'])

<label {{ $attributes->merge(['class' => 'text-base font-normal text-primary-500 leading-normal']) }}>
    {{ $value ?? $slot }}
</label>
