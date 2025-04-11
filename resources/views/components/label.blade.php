@props(['required' => false])

<label {{ $attributes->merge(['class' => 'block mb-1']) }}>
    {{ $slot }} 
    @if ($required)
        <span class="text-red-600">*</span>
    @endif
</label>
