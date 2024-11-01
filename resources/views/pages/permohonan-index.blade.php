@extends('layouts.app')

@section('title', 'Daftar Permohonan')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Permohonan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Formulir</a></div>
                <div class="breadcrumb-item">Daftar Permohonan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Daftar Permohonan</h2>
            <p class="section-lead">
                Berikut adalah daftar permohonan yang telah diajukan.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Permohonan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Ayah</th>
                                            <th>Nama Ibu</th>
                                            <th>Nama Calon Suami</th>
                                            <th>Nama Calon Isteri</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permohonans as $permohonan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $permohonan->nama_ayah }}</td>
                                                <td>{{ $permohonan->nama_ibu }}</td>
                                                <td>{{ $permohonan->nama_calon_suami }}</td>
                                                <td>{{ $permohonan->nama_calon_isteri }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary">Detail</a>
                                                    <a href="{{ route('permohonan.edit', $permohonan->id) }}" class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('permohonan.destroy', $permohonan->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus permohonan ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraries -->
@endpush
