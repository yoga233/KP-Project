@props([
    'label' => '',  // Judul komponen, default kosong supaya tidak error
    'name',
    'options' => [],
    'other' => null
])

<div class="space-y-2">
    @if ($label)
        <h3 class="text-lg font-medium text-gray-800 mb-2">{{ $label }}</h3>
    @endif

    <div class="space-y-2">
        @foreach ($options as $option)
            <label class="flex items-center gap-2">
                <input type="radio" name="{{ $name }}" value="{{ $option }}" class="form-radio text-blue-600">
                <span>{{ $option }}</span>
            </label>
        @endforeach

        @if ($other)
            <div class="flex items-center gap-2">
                <input type="radio" name="{{ $name }}" value="lain" class="form-radio text-blue-600">
                <input type="text" name="{{ $other }}" placeholder="Lainnya..." class="form-input rounded-lg w-full border-gray-300 shadow-sm">
            </div>
        @endif
    </div>
</div>
