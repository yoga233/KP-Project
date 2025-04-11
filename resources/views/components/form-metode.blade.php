@props(['title' => 'Metode Pembelajaran'])

<div>
    <label class="block font-bold mb-2">{{ $title }}</label>

    @php
        $metodes = [
            'Kuliah tatap muka',
            'Praktikum',
            'Kerja praktik / magang',
            'Diskusi kelas',
            'Belajar mandiri',
            'Tugas individu',
            'Tugas kelompok',
            'Proyek / Studi kasus',
            'E-learning',
            'Kuliah tamu / seminar',
            'Kegiatan kemahasiswaan',
        ];
    @endphp

    @foreach($metodes as $metode)
        <label class="block">
            <input type="checkbox" name="metode_pembelajaran[]" value="{{ $metode }}">
            {{ $metode }}
        </label>
    @endforeach

    <label class="block">
        <input type="checkbox" name="metode_pembelajaran[]" value="lain"> Yang lain:
        <input type="text" name="metode_pembelajaran_lain" class="form-input mt-1">
    </label>
</div>
