@extends('templates.default')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Karyawan</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Data Karyawan</h6>
                        <button type="button" class="btn btn-primary mb-2"><a href="{{ route('karyawan.create') }}"
                                style="color:white">Tambah Karyawan</a> </button>
                        {{-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official
                                DataTables Documentation </a>for a full list of instructions and other options.</p> --}}
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>No. Hp</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($karyawan as $karyawan)
                                    <tr>
                                        <td>{{ $karyawan->name }}</td>
                                        <td>{{ $karyawan->phone }}</td>
                                        <td>{{ $karyawan->address }}</td>
                                        <td>{{ $karyawan->email }}</td>

                                        <td>
                                            <button onclick="window.location='{{ route('karyawan.edit', $karyawan->id) }}'"
                                                type="button" class="btn btn-primary btn-icon">
                                                <i data-feather="edit-2"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-icon"
                                                data-bs-target="#modal{{ $karyawan->id }}" data-bs-toggle="modal">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                            <button onclick="window.location='{{ route('set_user', $karyawan->id) }}'"
                                                type="button" title="Jadikan Sebagai User" class="btn btn-secondary btn-icon">
                                                <i data-feather="user-plus"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modal{{ $karyawan->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel-2">Delete Karyawan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="btn-Close">
                                                        {{-- <span aria-hidden="true">&times;</span> --}}
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class=""
                                                        action="{{ route('karyawan.destroy', $karyawan->id) }}"
                                                        method="post">
                                                        @csrf
                                                        {{-- @method('PUT') --}}
                                                        @method('delete')
                                                        <p>Delete <strong>{{ $karyawan->name }}</strong> </p>
                                                        
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger text-white">Delete</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
