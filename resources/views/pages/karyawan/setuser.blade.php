@extends('templates.default')

@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page">Karyawan</li>
                {{-- <li class="breadcrumb-item" aria-current="page">Edit</li> --}}
            </ol>
        </nav>
        <div class="row">
            <div class="col grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Data Karyawan</h4>
                        <form class="cmxform" method="post" action="{{ route('buatakun') }}">
                            @csrf
                            {{-- @method('PATCH') --}}
                            <input type="hidden" name="id_toko" id="id_toko" value="{{Auth::user()->id_toko}}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input id="name" class="form-control" name="name" type="text"
                                    value="{{ $karyawan->name }}" placeholder="Nama Karyawan" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <input id="address" class="form-control"
                                    name="address" type="text" value="{{$karyawan->address}}"
                                    placeholder="Alamat Karyawan" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input id="phone" class="form-control"
                                    name="phone" type="text" value="{{$karyawan->phone }}"
                                    placeholder="No. Telp Karyawan" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" type="email" value="{{ $karyawan->email }}"
                                    placeholder="email Karyawan" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">Password <span style="color: grey"> (default)
                                    </span> </label>
                                <input class="form-control" type="text" name="password" id="password" value="12345678">
                            </div>
                            <input class="btn btn-primary" type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
