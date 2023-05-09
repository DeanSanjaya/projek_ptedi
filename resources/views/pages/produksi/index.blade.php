@extends('templates.default')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Produksi Barang</h6>
                        <a type="button" title="PRODUKSI BARANG" class="btn btn-primary mb-2"
                            href="{{ route('produksi.create') }}"><i data-feather="plus">
                            </i>Produksi</a>
                        <div class="table-responsive">
                            <table id="dataTablekat" class="display table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Stok</th>
                                        <th>Harga Jual</th>
                                        <th>Dibuat Oleh</th>
                                        <th colspan="2">Bahan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                        $rowid = 0;
                                        $rowspan = 0;
                                    @endphp
                                    @foreach ($produksis as $key => $produksi)
                                        @php
                                            $rowid += 1;
                                        @endphp
                                        <tr>

                                            @if ($key == 0 || $rowspan == $rowid)
                                                @php
                                                    $rowid = 0;
                                                    $rowspan = $produksi->row;
                                                @endphp
                                                <td rowspan="{{ $rowspan }}">{{ $no }}</td>
                                                <td rowspan="{{ $rowspan }}">{{ $produksi->name }}</td>
                                                <td rowspan="{{ $rowspan }}">
                                                    {{ $produksi->stok }} {{ $produksi->stok_deskripsi }}
                                                </td>
                                                <td rowspan="{{ $rowspan }}">
                                                    Rp.{{ number_format($produksi->harga_jual, 0, ',', '.') }}
                                                </td>
                                                <td rowspan="{{ $rowspan }}">{{ $produksi->created_by }}</td>
                                            @endif
                                            <td>{{ $produksi->bahan }}</td>
                                            <td>{{ $produksi->jumlah }}</td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-icon">

                                                    <i data-feather="trash-2"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @php($no++)
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
