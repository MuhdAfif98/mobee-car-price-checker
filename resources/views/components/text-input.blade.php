@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} 
    {!! $attributes->merge(
        [
            'class' => ( $disabled ? 'bg-gray-200 ' : '') . 'text-primary-500 border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm placeholder-gray-400'
        ]) 
    !!}
>
