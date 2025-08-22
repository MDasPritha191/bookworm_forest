{{-- resources/views/components/text-input.blade.php --}}
@props(['disabled' => false, 'placeholder' => '']) {{-- Add the 'placeholder' prop with a default value --}}

<input 
    {{ $disabled ? 'disabled' : '' }} 
    placeholder="{{ $placeholder }}" {{-- Output the placeholder attribute --}}
    {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}
>