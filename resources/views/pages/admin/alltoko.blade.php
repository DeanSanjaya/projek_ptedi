@extends('templates.default')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Semua Toko</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Data Semua Toko</h6>
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>No. Hp</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($toko as $toko)
                                    <tr>
                                        <td>{{ $toko->name }}</td>
                                        <td>{{ $toko->phone }}</td>
                                        <td>{{ $toko->address }}</td>
                                        <td> <img src="{{ asset('storage/' . $toko->photo) }}" class=" wd-300"
                                                alt="{{ $toko->photo }}"></td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
