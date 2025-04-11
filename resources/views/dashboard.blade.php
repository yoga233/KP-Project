<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tracer Study Lulusan ITATS - Teknik INFORMATIKA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="mb-8 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-4 rounded">
                    <h3 class="font-bold text-lg mb-2">Selamat Datang!</h3>
                    <p>Terima kasih atas partisipasi Anda dalam mengisi Tracer Study Lulusan ITATS</p>
                    <p class="mt-2">Tracer study ini hanya untuk program studi / jurusan yang masih aktif. Isi semua pertanyaan sesuai dengan kondisi Anda saat ini. Data yang Anda berikan akan digunakan untuk:</p>
                    <ul class="list-disc list-inside mt-2 space-y-1">
                        <li class="pl-5">1. Mengevaluasi kualitas program pendidikan di ITATS.</li>
                        <li class="pl-5">2. Memahami pengembangan karir lulusan.</li>
                        <li class="pl-5">3. Meningkatkan kualitas pendidikan dan layanan kemahasiswaan.</li>
                    </ul>
                    <p class="mt-4">Apabila Anda memiliki pertanyaan atau kendala, silakan hubungi <strong>Pak Isa Albanna</strong> di nomor <strong>WA 0858-1568-3477</strong> atau email <strong>isaalbanna@itats.ac.id</strong>.</p>
                </div>

                <p class="text-red-600 font-bold italic">* Menunjukan pertanyaan yang wajib di isi.</p>

                <form action="{{ route('alumni.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Data Pribadi -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div>
                            <x-label required>Tahun Lulus</x-label>
                            <select name="tahun_lulus" class="form-select w-full" required>
                                <option value="">-- Pilih Tahun --</option>
                                @for ($year = 2020; $year <= 2030; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>

                        <div>
                            <x-label required>NPM</x-label>
                            <input type="text" name="npm" class="form-input w-full" required>
                        </div>

                        <div>
                            <x-label required>Nama Mahasiswa</x-label>
                            <input type="text" name="nama" class="form-input w-full" required>
                        </div>

                        <div>
                            <x-label required>NIK / Nomor KTP</x-label>
                            <input type="text" name="nik" class="form-input w-full" required>
                        </div>

                        <div>
                            <x-label required>Tanggal Lahir</x-label>
                            <input type="date" name="tanggal_lahir" class="form-input w-full" required>
                        </div>

                        <div>
                            <x-label required>Email</x-label>
                            <input type="email" name="email" class="form-input w-full" required>
                        </div>

                        <div>
                            <x-label required>No. HP</x-label>
                            <input type="text" name="telepon" class="form-input w-full" required>
                        </div>

                        <div>
                            <x-label>NPWP</x-label>
                            <input type="text" name="npwp" class="form-input w-full">
                        </div>

                        <div>
                            <x-label>Nama Dosen Pembimbing (tanpa gelar)</x-label>
                            <input type="text" name="dosen_pembimbing" class="form-input w-full">
                        </div>
                    </div>

                    <!-- Sumber Dana Kuliah -->
                    <div>
                        <x-label required>Sumber Dana Kuliah</x-label>
                        @foreach(['Biaya Sendiri / Keluarga', 'Beasiswa ADIK', 'Beasiswa BIDIK MISI', 'Beasiswa PPA', 'Beasiswa AFIRMASI', 'Beasiswa Perusahaan/Swasta'] as $option)
                            <label class="block">
                                <input type="radio" name="sumber_dana" value="{{ $option }}" required> {{ $option }}
                            </label>
                        @endforeach
                        <label class="block">
                            <input type="radio" name="sumber_dana" value="lain"> Yang lain:
                            <input type="text" name="sumber_dana_lain" class="form-input mt-1">
                        </label>
                    </div>

                    <!-- Status Saat Ini -->
                    <div>
                        <x-label required>Status Saat Ini</x-label>
                        @foreach(['Bekerja', 'Belum memungkinkan bekerja', 'Wiraswasta', 'Melanjutkan Pendidikan', 'Tidak Kerja Tetapi sedang mencari kerja'] as $status)
                            <label class="block">
                                <input type="radio" name="status" value="{{ $status }}" required> {{ $status }}
                            </label>
                        @endforeach
                    </div>

                    <!-- Kompetensi -->
                    <x-form-kompetensi title="Kompetensi Saat Lulus" prefix="kompetensi_lulus" />
                    <x-form-kompetensi title="Kompetensi Saat Ini di Pekerjaan" prefix="kompetensi_pekerjaan" />

                    <!-- Metode Pembelajaran -->
                    <x-form-metode />

                    <!-- Cari Kerja -->
                    <div>
                        <x-label required>Kapan mulai mencari pekerjaan?</x-label>
                        @foreach([
                            'Saya mencari pekerjaan sebelum lulus',
                            'Saya mencari pekerjaan sesudah lulus',
                            'Saya tidak mencari pekerjaan'
                        ] as $item)
                            <label class="block">
                                <input type="radio" name="waktu_cari_kerja" value="{{ $item }}" required> {{ $item }}
                            </label>
                        @endforeach
                    </div>

                    <div>
                        <x-label>Bagaimana Anda mencari pekerjaan?</x-label>
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

                    <!-- Statistik Lamaran -->
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1">
                            <x-label>Jumlah Lamaran Sebelum Diterima</x-label>
                            <input type="number" name="jumlah_lamaran" class="form-input w-full">
                        </div>

                        <div class="flex-1">
                            <x-label>Jumlah Respons Lamaran</x-label>
                            <input type="number" name="jumlah_respons" class="form-input w-full">
                        </div>

                        <div class="flex-1">
                            <x-label>Jumlah Wawancara</x-label>
                            <input type="number" name="jumlah_wawancara" class="form-input w-full">
                        </div>
                    </div>


                    <div>
                        <x-label>Aktif mencari kerja 4 minggu terakhir?</x-label>
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

                    <!-- Alasan -->
                    <div>
                        <x-label>Jika pekerjaan tidak sesuai dengan pendidikan, kenapa?</x-label>
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

                    <!-- Tombol Submit -->
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
