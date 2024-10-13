@extends('layouts.app')

@section('title', 'Gugatan List')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>All Gugatan</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Gugatan</a></div>
                    <div class="breadcrumb-item">All Gugatan</div>
                </div>
            </div>
            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Gugatan</h4>
                                <div class="section-header-button">
                                    <a href="{{ route('gugatan.form') }}" class="btn btn-primary">New Gugatan</a>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('gugatan.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Penggugat</th>
                                            <th>Nama Tergugat</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($gugatans as $gugatan)
                                            <tr>
                                                <td>{{ $gugatan->id }}</td>
                                                <td>{{ $gugatan->nama_penggugat }}</td>
                                                <td>{{ $gugatan->nama_tergugat }}</td>
                                                <td>{{ $gugatan->created_at }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('gugatan.edit', $gugatan->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>

                                                        {{-- <form action="{{ route('gugatan.destroy', $gugatan->id) }}"
                                                            method="POST" class="ml-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form> --}}
                                                        <form action="{{ route('gugatan.destroy', $gugatan->id) }}" method="POST" class="ml-2 delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger btn-icon confirm-delete"
                                                                    data-confirm="Apakah Anda ingin menghapus ?|Apakah Anda ingin melanjutkan?"
                                                                    data-confirm-yes="document.querySelector('.delete-form').submit()">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                        <a href="{{ route('gugatan.generateWord', $gugatan->id) }}"
                                                            class="btn btn-sm btn-primary btn-icon ml-2">
                                                            <i class="fas fa-download"></i> Download Word
                                                        </a>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $gugatans->withQueryString()->links() }}
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
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
