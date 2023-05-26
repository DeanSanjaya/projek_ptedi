@extends('templates.default')

@section('content')
    <div class="page-content">

        {{-- <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Hasil Pencarian</li>
            </ol>
        </nav> --}}

        @if ($totalpencarian > 0)

            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0" style="font-weight:normal">HASIL PENCARIAN <span
                            style="font-weight: bold">"{{ $hasil }}"</span></h4>
                    <p class="mb-3 mb-md-0"> {{ $totalpencarian }} Data ditemukan</p>
                </div>

            </div>

            @if (count($kategoris) > 0)
                {{-- <p>ada</p> --}}
                {{-- {{ $kategoris }} --}}
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header bg-light">Kategori</div>
                            @foreach ($kategoris as $kategori)
                                <div class="card-body">
                                    <h5 class="card-title">{{ $kategori->name }}</h5>
                                    {{-- <p>tesss</p> --}}

                                </div>
                                <div class="card-footer">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                {{-- <p>tidak ada</p> --}}
            @endif

            @if (count($barangs) > 0)
                {{-- <p>ada</p> --}}
                {{-- {{ $barangs }} --}}
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header bg-light">barang</div>
                            @foreach ($barangs as $barang)
                                <div class="card-body">
                                    <h5 class="card-title">{{ $barang->name }}</h5>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <p>Stok :</p>
                                                <p>Harga Jual :</p>
                                            </div>
                                            <div class="col-9">
                                                <p>{{ $barang->stok }} {{ $barang->stok_deskripsi }}</p>
                                                <p>Rp. {{ number_format($barang->harga_jual, 0, ',', '.') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                {{-- <p>tidak ada</p> --}}
            @endif

            @if (count($karyawans) > 0)
                {{-- <p>ada</p> --}}
                {{-- {{ $karyawans }} --}}
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header bg-light">Karyawan</div>
                            @foreach ($karyawans as $karyawan)
                                <div class="card-body">
                                    <h5 class="card-title">{{ $karyawan->name }}</h5>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <p>Email :</p>
                                                <p>Phone :</p>
                                                <p>Alamat :</p>
                                            </div>
                                            <div class="col-9">
                                                <p>{{ $karyawan->email }}</p>
                                                <p>{{ $karyawan->phone }}</p>
                                                <p>{{ $karyawan->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                {{-- <p>tidak ada</p> --}}
            @endif

            @if (count($pemasoks) > 0)
                {{-- <p>ada</p> --}}
                {{-- {{ $pemasoks }} --}}
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header bg-light">pemasok</div>
                            @foreach ($pemasoks as $pemasok)
                                <div class="card-body">
                                    <h5 class="card-title">{{ $pemasok->name }}</h5>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <p>Email :</p>
                                                <p>Phone :</p>
                                                <p>Alamat :</p>
                                            </div>
                                            <div class="col-9">
                                                <p>{{ $pemasok->email }}</p>
                                                <p>{{ $pemasok->phone }}</p>
                                                <p>{{ $pemasok->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                {{-- <p>tidak ada</p> --}}
            @endif

        @else
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0" style="font-weight:normal">HASIL PENCARIAN <span
                        style="font-weight: bold">"{{ $hasil }}"</span></h4>
                <p class="mb-3 mb-md-0"> <span  style="font-weight: bold">"{{ $hasil }}"</span>  Tidak ditemukan</p>
            </div>

        </div>
        @endif


        {{-- <div class="card text-white bg-primary">
            <div class="card-header">Header</div>
            <div class="card-body">
              <h5 class="card-title">Primary card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div> --}}
    </div>
@endsection
