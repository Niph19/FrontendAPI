@extends('layouts.app')

@section('title', 'Pendaftaran OSIS')

@section('content')
    @php
        $registrations = collect($daftar ?? []);
    @endphp

    <div class="page-heading">
        <div>
            <h1>Pendaftaran OSIS</h1>
            <p>Lengkapi pilihan siswa, bidang yang diminati, dan motivasi bergabung.</p>
        </div>
    </div>

    <div class="registration-layout">
        <section class="panel form-panel" aria-labelledby="registration-form-title">
            <div class="panel-heading">
                <div>
                    <h2 id="registration-form-title">Formulir pendaftaran</h2>
                    <p>Pastikan pilihan dan motivasi sudah sesuai.</p>
                </div>
            </div>

            <form>
                <div class="field-group">
                    <label for="student">Siswa</label>
                    <select id="student" name="student" required>
                        <option value="" selected disabled>Pilih siswa</option>
                        <option value="contoh-siswa-1">Siswa contoh 1</option>
                        <option value="contoh-siswa-2">Siswa contoh 2</option>
                    </select>
                </div>

                <div class="field-group">
                    <label for="field">Bidang yang diminati</label>
                    <select id="field" name="field" required>
                        <option value="" selected disabled>Pilih bidang</option>
                        <option value="kreativitas">Bidang Kreativitas (contoh)</option>
                        <option value="olahraga">Bidang Olahraga (contoh)</option>
                        <option value="kedisiplinan">Bidang Kedisiplinan (contoh)</option>
                    </select>
                </div>

                <div class="field-group">
                    <label for="motivation">Motivasi</label>
                    <textarea id="motivation" name="motivation" rows="5" placeholder="Ceritakan alasanmu ingin bergabung dengan OSIS." required></textarea>
                    <span class="field-hint">Tuliskan alasan dan kontribusi yang ingin kamu berikan.</span>
                </div>

                <div class="form-actions">
                    <button class="button button--primary" type="button" disabled>Kirim pendaftaran</button>
                    <p class="form-note">Formulir ini belum tersambung ke penyimpanan data.</p>
                </div>
            </form>
        </section>

        <aside class="guidance-panel" aria-labelledby="guidance-title">
            <h2 id="guidance-title">Sebelum mendaftar</h2>
            <p>Pilih bidang yang sesuai dengan minatmu. Ceritakan motivasi dengan jelas dan gunakan kata-katamu sendiri.</p>
            <div class="sample-note">
                Pilihan siswa dan bidang saat ini hanya contoh tampilan.
            </div>
        </aside>
    </div>

    <section class="panel table-panel registration-table" aria-labelledby="registration-list-title">
        <div class="panel-heading">
            <div>
                <h2 id="registration-list-title">Daftar pendaftar</h2>
                <p>Informasi siswa dan motivasi pendaftaran OSIS.</p>
            </div>
            <span class="record-count">{{ $registrations->count() }} pendaftar</span>
        </div>

        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Siswa</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jenis kelamin</th>
                        <th scope="col">Bidang</th>
                        <th scope="col">Motivasi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($registrations as $registration)
                        @php
                            $studentName = data_get($registration, 'siswa.nama_siswa')
                                ?? data_get($registration, 'nama_siswa')
                                ?? 'Nama belum tersedia';
                            $className = data_get($registration, 'siswa.kelas.nama_kelas')
                                ?? data_get($registration, 'nama_kelas')
                                ?? '-';
                            $genderName = data_get($registration, 'siswa.jenis_kelamin.nama_jenis_kelamin')
                                ?? data_get($registration, 'jenis_kelamin')
                                ?? '-';
                        @endphp
                        <tr>
                            <td class="table-primary">{{ $studentName }}</td>
                            <td>{{ $className }}</td>
                            <td>{{ $genderName }}</td>
                            <td>{{ data_get($registration, 'bidang.nama_bidang', data_get($registration, 'nama_bidang', data_get($registration, 'bidang', '-'))) }}</td>
                            <td class="motivation-cell">{{ data_get($registration, 'motivasi', 'Belum ada motivasi.') }}</td>
                            <td>
                                <div class="table-actions">
                                    <button class="button button--small button--quiet" type="button" disabled>Edit</button>
                                    <button class="button button--small button--danger" type="button" disabled>Hapus</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="empty-cell" colspan="6">Belum ada pendaftar yang dapat ditampilkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <p class="panel-footnote">Tombol Edit dan Hapus belum terhubung ke backend.</p>
    </section>
@endsection
