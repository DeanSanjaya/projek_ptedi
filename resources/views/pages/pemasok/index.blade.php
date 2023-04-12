@extends('templates.default')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Pemasok</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Data Pemasok</h6>
                        <button type="button" class="btn btn-primary mb-2"><a href="{{ route('pemasok.create') }}"
                                style="color:white">Tambah Pemasok</a> </button>
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
                                @foreach ($pemasok as $pemasok)
                                    <tr>
                                        <td>{{ $pemasok->name }}</td>
                                        <td>{{ $pemasok->phone }}</td>
                                        <td>{{ $pemasok->address }}</td>
                                        <td>{{ $pemasok->email }}</td>

                                        <td>
                                            <button onclick="window.location='{{ route('pemasok.edit', $pemasok->id) }}'"
                                                type="button" class="btn btn-primary btn-icon">
                                                <i data-feather="edit-2"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-icon"
                                                data-bs-target="#modal{{ $pemasok->id }}" data-bs-toggle="modal">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modal{{ $pemasok->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel-2">Delete Pemasok</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="btn-Close">
                                                        {{-- <span aria-hidden="true">&times;</span> --}}
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class=""
                                                        action="{{ route('pemasok.destroy', $pemasok->id) }}"
                                                        method="post">
                                                        @csrf
                                                        {{-- @method('PUT') --}}
                                                        @method('delete')
                                                        <p>Delete <strong>{{ $pemasok->name }}</strong> </p>
                                                        
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
