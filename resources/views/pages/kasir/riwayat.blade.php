@extends('templates.default')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Riwayat Penjualan</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Riwayat Penjualan</h6>
                        <div class="table-responsive">
                            <table id="dataTablekat" class="display table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama Kasir</th>
                                        <th>Total</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Item</th>
                                        <th>Harga</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                        $rowid = 0;
                                        $rowspan = 0;
                                    @endphp
                                    @foreach ($penjualans as $key => $penjualan)
                                        @php
                                            $rowid += 1;
                                        @endphp
                                        <tr>

                                            @if ($key == 0 || $rowspan == $rowid)
                                                @php
                                                    $rowid = 0;
                                                    // $x =
                                                    $rowspan = $penjualan->jumlah_item;
                                                @endphp
                                                
                                                <td rowspan="{{ $rowspan }}">{{ $no++ }}</td>
                                                <td rowspan="{{ $rowspan }}">{{ $penjualan->date }}</td>
                                                <td rowspan="{{ $rowspan }}">{{ $penjualan->created_by }} </td>
                                                <td rowspan="{{ $rowspan }}">{{ $penjualan->total_bayar }} </td>
                                            @endif
                                            <td>{{ $penjualan->nama_barang }}</td>
                                            <td>{{ $penjualan->jumlah_barang }}</td>
                                            <td>{{ $penjualan->harga }}</td>
                                            <td>{{ $penjualan->subtotal }}</td>
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
@endsection
