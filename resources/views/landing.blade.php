@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="welcome-panel">
        <div class="welcome-copy">
            <h1>Waktunya ambil bagian.</h1>
            <p>Daftarkan dirimu untuk OSIS SMA Negeri 1 Babelan. Pilih bidang yang kamu minati dan ceritakan alasanmu bergabung.</p>
            <a class="button button--primary" href="{{ route('osis.index') }}">Mulai pendaftaran</a>
        </div>

        <div class="welcome-steps" aria-label="Ringkasan langkah pendaftaran">
            <h2>Yang perlu disiapkan</h2>
            <ol>
                <li>Pilih identitas siswa</li>
                <li>Tentukan bidang pilihan</li>
                <li>Tulis motivasi bergabung</li>
            </ol>
        </div>
    </section>

    <section class="home-section" aria-labelledby="reference-title">
        <div class="section-heading">
            <h2 id="reference-title">Data referensi</h2>
            <p>Lihat informasi siswa dan data kelas yang tersedia.</p>
        </div>
        <div class="reference-links">
            <a class="reference-link" href="{{ route('siswa.index') }}">
                <span>Data Siswa</span>
                <span class="link-description">Informasi siswa dan kelas</span>
            </a>
            <a class="reference-link" href="{{ route('kelas.index') }}">
                <span>Data Kelas</span>
                <span class="link-description">Daftar kelas sekolah</span>
            </a>
            <a class="reference-link" href="{{ route('jeniskelamin.index') }}">
                <span>Jenis Kelamin</span>
                <span class="link-description">Data referensi siswa</span>
            </a>
        </div>
    </section>
@endsection
