@props(['title', 'prefix'])

<div>
    <label class="block font-bold">{{ $title }}</label>
    @php
        $opsi = ['Sangat Rendah', 'Rendah', 'Cukup', 'Tinggi', 'Sangat Tinggi'];
    @endphp

    <div class="space-y-4 mt-2">
        <div>
            <label class="block">Etika</label>
            @foreach($opsi as $opt)
                <label class="inline-block mr-4">
                    <input type="radio" name="{{ $prefix }}_etika" value="{{ $opt }}"> {{ $opt }}
                </label>
            @endforeach
        </div>

        <div>
            <label class="block">Keahlian berdasarkan bidang ilmu</label>
            @foreach($opsi as $opt)
                <label class="inline-block mr-4">
                    <input type="radio" name="{{ $prefix }}_keahlian" value="{{ $opt }}"> {{ $opt }}
                </label>
            @endforeach
        </div>

        <div>
            <label class="block">Bahasa Inggris</label>
            @foreach($opsi as $opt)
                <label class="inline-block mr-4">
                    <input type="radio" name="{{ $prefix }}_bhs_inggris" value="{{ $opt }}"> {{ $opt }}
                </label>
            @endforeach
        </div>

        <div>
            <label class="block">Penggunaan teknologi informasi</label>
            @foreach($opsi as $opt)
                <label class="inline-block mr-4">
                    <input type="radio" name="{{ $prefix }}_it" value="{{ $opt }}"> {{ $opt }}
                </label>
            @endforeach
        </div>

        <div>
            <label class="block">Kemampuan komunikasi</label>
            @foreach($opsi as $opt)
                <label class="inline-block mr-4">
                    <input type="radio" name="{{ $prefix }}_komunikasi" value="{{ $opt }}"> {{ $opt }}
                </label>
            @endforeach
        </div>

        <div>
            <label class="block">Kerjasama tim</label>
            @foreach($opsi as $opt)
                <label class="inline-block mr-4">
                    <input type="radio" name="{{ $prefix }}_tim" value="{{ $opt }}"> {{ $opt }}
                </label>
            @endforeach
        </div>

        <div>
            <label class="block">Pengembangan diri</label>
            @foreach($opsi as $opt)
                <label class="inline-block mr-4">
                    <input type="radio" name="{{ $prefix }}_pengembangan" value="{{ $opt }}"> {{ $opt }}
                </label>
            @endforeach
        </div>
    </div>
</div>
