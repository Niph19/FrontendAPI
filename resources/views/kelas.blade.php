@extends('layouts.app')

@section('title', 'Data Kelas')

@section('content')
    @php
        $classes = collect($kelas ?? []);
    @endphp

    <div class="page-heading">
        <div>
            <h1>Data Kelas</h1>
            <p>Daftar kelas yang menjadi referensi data siswa.</p>
        </div>
    </div>

    <section class="panel table-panel" aria-labelledby="class-list-title">
        <div class="panel-heading">
            <div>
                <h2 id="class-list-title">Daftar kelas</h2>
                <p>Informasi kelas ditampilkan sesuai data yang tersedia.</p>
            </div>
            <span class="record-count">{{ $classes->count() }} kelas</span>
        </div>

        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama kelas</th>
                        <th scope="col">Tingkat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($classes as $class)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="table-primary">{{ data_get($class, 'nama_kelas', data_get($class, 'nama', 'Nama kelas belum tersedia')) }}</td>
                            <td>{{ data_get($class, 'tingkat', '-') }}</td>
                            <td>
                                <div class="table-actions">
                                    <button class="button button--small button--quiet" type="button" disabled>Edit</button>
                                    <button class="button button--small button--danger" type="button" disabled>Hapus</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="empty-cell" colspan="4">Belum ada data kelas untuk ditampilkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <p class="panel-footnote">Tombol Edit dan Hapus belum terhubung ke backend.</p>
    </section>
@endsection
