@extends('templates.default')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Karyawan</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">User Karyawan</h6>
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Foto Profile</th>
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
                                        <td><img src="{{ asset('storage/' . $karyawan->photo) }}" class="img-fluid"
                                                style="width: 150px !important; height: 150px !important "></td>
                                        <td>{{ $karyawan->name }}</td>
                                        <td>{{ $karyawan->phone }}</td>
                                        <td>{{ $karyawan->address }}</td>
                                        <td>{{ $karyawan->email }}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-icon"
                                                title="Hapus User Karyawan" data-bs-target="#modal{{ $karyawan->id }}"
                                                data-bs-toggle="modal">
                                                <i data-feather="trash-2"></i>
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
                                                        action="{{ route('karyawan.userdestroy', $karyawan->id_user) }}"
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
