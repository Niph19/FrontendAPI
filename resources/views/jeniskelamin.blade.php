@extends('layouts.app')

@section('title', 'Jenis Kelamin')

@section('content')
    @php
        $genders = collect($jenisKelamin ?? []);
    @endphp

    <div class="page-heading">
        <div>
            <h1>Jenis Kelamin</h1>
            <p>Data referensi jenis kelamin untuk informasi siswa.</p>
        </div>
    </div>

    <section class="panel table-panel" aria-labelledby="gender-list-title">
        <div class="panel-heading">
            <div>
                <h2 id="gender-list-title">Daftar jenis kelamin</h2>
                <p>Data referensi yang digunakan pada informasi siswa.</p>
            </div>
            <span class="record-count">{{ $genders->count() }} data</span>
        </div>

        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Jenis kelamin</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($genders as $gender)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="table-primary">
                                {{ data_get($gender, 'nama_jenis_kelamin', data_get($gender, 'jenis_kelamin', data_get($gender, 'nama', 'Data belum tersedia'))) }}
                            </td>
                            <td>
                                <div class="table-actions">
                                    <button class="button button--small button--quiet" type="button" disabled>Edit</button>
                                    <button class="button button--small button--danger" type="button" disabled>Hapus</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="empty-cell" colspan="3">Belum ada data jenis kelamin untuk ditampilkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <p class="panel-footnote">Tombol Edit dan Hapus belum terhubung ke backend.</p>
    </section>
@endsection
