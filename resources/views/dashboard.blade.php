<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulir Data Alumni') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('alumni.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Data Pribadi -->
                    <div>
                        <label class="block">Tahun Lulus</label>
                        <input type="number" name="tahun_lulus" class="form-input w-full">
                    </div>

                    <div>
                        <label class="block">NPM</label>
                        <input type="text" name="npm" class="form-input w-full">
                    </div>

                    <div>
                        <label class="block">Nama Mahasiswa</label>
                        <input type="text" name="nama" class="form-input w-full">
                    </div>

                    <div>
                        <label class="block">NIK / Nomor KTP</label>
                        <input type="text" name="nik" class="form-input w-full">
                    </div>

                    <div>
                        <label class="block">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-input w-full">
                    </div>

                    <div>
                        <label class="block">Email</label>
                        <input type="email" name="email" class="form-input w-full">
                    </div>

                    <div>
                        <label class="block">No. HP</label>
                        <input type="text" name="telepon" class="form-input w-full">
                    </div>

                    <div>
                        <label class="block">NPWP</label>
                        <input type="text" name="npwp" class="form-input w-full">
                    </div>

                    <div>
                        <label class="block">Nama Dosen Pembimbing (tanpa gelar)</label>
                        <input type="text" name="dosen_pembimbing" class="form-input w-full">
                    </div>

                    <!-- Sumber Dana Kuliah -->
                    <div>
                        <label class="block font-bold">Sumber Dana Kuliah</label>
                        @foreach(['Biaya Sendiri / Keluarga', 'Beasiswa ADIK', 'Beasiswa BIDIK MISI', 'Beasiswa PPA', 'Beasiswa AFIRMASI', 'Beasiswa Perusahaan/Swasta'] as $option)
                            <label class="block">
                                <input type="radio" name="sumber_dana" value="{{ $option }}"> {{ $option }}
                            </label>
                        @endforeach
                        <label class="block">
                            <input type="radio" name="sumber_dana" value="lain"> Yang lain:
                            <input type="text" name="sumber_dana_lain" class="form-input mt-1">
                        </label>
                    </div>

                    <!-- Status Saat Ini -->
                    <div>
                        <label class="block font-bold">Status Saat Ini</label>
                        @foreach(['Bekerja', 'Belum memungkinkan bekerja', 'Wiraswasta', 'Melanjutkan Pendidikan', 'Tidak Kerja Tetapi sedang mencari kerja'] as $status)
                            <label class="block">
                                <input type="radio" name="status" value="{{ $status }}"> {{ $status }}
                            </label>
                        @endforeach
                    </div>

                    <!-- Kompetensi Saat Lulus dan Sekarang -->
                    <x-form-kompetensi title="Kompetensi Saat Lulus" prefix="kompetensi_lulus" />
                    <x-form-kompetensi title="Kompetensi Saat Ini di Pekerjaan" prefix="kompetensi_pekerjaan" />

                    <!-- Metode Pembelajaran -->
                    <x-form-metode />

                    <!-- Kapan mulai cari kerja -->
                    <div>
                        <label class="block font-bold">Kapan mulai mencari pekerjaan?</label>
                        @foreach([
                            'Saya mencari pekerjaan sebelum lulus',
                            'Saya mencari pekerjaan sesudah lulus',
                            'Saya tidak mencari pekerjaan'
                        ] as $item)
                            <label class="block">
                                <input type="radio" name="waktu_cari_kerja" value="{{ $item }}"> {{ $item }}
                            </label>
                        @endforeach
                    </div>

                    <!-- Cara mencari kerja -->
                    <div>
                        <label class="block font-bold">Bagaimana Anda mencari pekerjaan?</label>
                        @php
                            $methods = [
                                'Iklan di koran/majalah', 'Melamar langsung', 'Bursa kerja', 'Internet/Online',
                                'Dihubungi perusahaan', 'Kemenakertrans', 'Agen tenaga kerja', 'Pusat karir kampus',
                                'Kemahasiswaan/Alumni', 'Jejaring sejak kuliah', 'Relasi (dosen, orang tua, dll)',
                                'Membangun bisnis sendiri', 'Magang/penempatan kerja', 'Kerja semasa kuliah'
                            ];
                        @endphp
                        @foreach($methods as $method)
                            <label class="block">
                                <input type="checkbox" name="cara_cari_kerja[]" value="{{ $method }}"> {{ $method }}
                            </label>
                        @endforeach
                        <label class="block">
                            <input type="checkbox" name="cara_cari_kerja[]" value="lain"> Yang lain:
                            <input type="text" name="cara_cari_kerja_lain" class="form-input mt-1">
                        </label>
                    </div>

                    <!-- Jumlah Lamaran, Respons, Wawancara -->
                    <div>
                        <label class="block">Jumlah Lamaran Sebelum Diterima</label>
                        <input type="number" name="jumlah_lamaran" class="form-input w-full">
                    </div>

                    <div>
                        <label class="block">Jumlah Respons Lamaran</label>
                        <input type="number" name="jumlah_respons" class="form-input w-full">
                    </div>

                    <div>
                        <label class="block">Jumlah Wawancara</label>
                        <input type="number" name="jumlah_wawancara" class="form-input w-full">
                    </div>

                    <!-- Aktif cari kerja 4 minggu terakhir -->
                    <div>
                        <label class="block font-bold">Aktif mencari kerja 4 minggu terakhir?</label>
                        @foreach([
                            'Tidak',
                            'Tidak, tapi menunggu hasil',
                            'Ya, akan mulai 2 minggu lagi',
                            'Ya, tapi belum pasti',
                        ] as $item)
                            <label class="block">
                                <input type="radio" name="aktif_cari_kerja" value="{{ $item }}"> {{ $item }}
                            </label>
                        @endforeach
                        <label class="block">
                            <input type="radio" name="aktif_cari_kerja" value="lain"> Yang lain:
                            <input type="text" name="aktif_cari_kerja_lain" class="form-input mt-1">
                        </label>
                    </div>

                    <!-- Alasan pekerjaan tidak sesuai -->
                    <div>
                        <label class="block font-bold">Jika pekerjaan tidak sesuai dengan pendidikan, kenapa?</label>
                        @php
                            $reasons = [
                                'Pekerjaan sesuai', 'Belum dapat yang sesuai', 'Prospek karir baik',
                                'Lebih suka bidang lain', 'Dipromosikan ke bidang lain',
                                'Pendapatan lebih tinggi', 'Lebih aman/secure',
                                'Lebih menarik', 'Jadwal fleksibel', 'Dekat rumah',
                                'Menjamin kebutuhan keluarga', 'Harus menerima diawal karir'
                            ];
                        @endphp
                        @foreach($reasons as $reason)
                            <label class="block">
                                <input type="checkbox" name="alasan_pekerjaan[]" value="{{ $reason }}"> {{ $reason }}
                            </label>
                        @endforeach
                        <label class="block">
                            <input type="checkbox" name="alasan_pekerjaan[]" value="lain"> Yang lain:
                            <input type="text" name="alasan_pekerjaan_lain" class="form-input mt-1">
                        </label>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
