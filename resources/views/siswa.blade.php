@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
    @php
        $students = collect($siswa ?? []);
    @endphp

    <div class="page-heading">
        <div>
            <h1>Data Siswa</h1>
            <p>Daftar siswa yang tersedia untuk pendaftaran OSIS.</p>
        </div>
    </div>

    <section class="panel table-panel" aria-labelledby="student-list-title">
        <div class="panel-heading">
            <div>
                <h2 id="student-list-title">Daftar siswa</h2>
                <p>Data siswa dan informasi kelas.</p>
            </div>
            <span class="record-count">{{ $students->count() }} siswa</span>
        </div>

        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama siswa</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jenis kelamin</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        @php
                            $className = data_get($student, 'kelas.nama_kelas')
                                ?? data_get($student, 'nama_kelas')
                                ?? (is_string(data_get($student, 'kelas')) ? data_get($student, 'kelas') : '-');
                            $gender = data_get($student, 'jenis_kelamin.nama_jenis_kelamin')
                                ?? data_get($student, 'jenis_kelamin.nama')
                                ?? (is_string(data_get($student, 'jenis_kelamin')) ? data_get($student, 'jenis_kelamin') : '-');
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ data_get($student, 'nis', data_get($student, 'nisn', '-')) }}</td>
                            <td class="table-primary">{{ data_get($student, 'nama_siswa', data_get($student, 'nama', 'Nama belum tersedia')) }}</td>
                            <td>{{ $className }}</td>
                            <td>{{ $gender }}</td>
                            <td>
                                <div class="table-actions">
                                    <button class="button button--small button--quiet" type="button" disabled>Edit</button>
                                    <button class="button button--small button--danger" type="button" disabled>Hapus</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="empty-cell" colspan="6">Belum ada data siswa untuk ditampilkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <p class="panel-footnote">Tombol Edit dan Hapus belum terhubung ke backend.</p>
    </section>
@endsection
