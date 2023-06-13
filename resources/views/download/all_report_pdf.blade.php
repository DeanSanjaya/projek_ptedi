<!DOCTYPE html>
<html>

<head>
    <title>Laporan {{ $toko[0]->name }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h4>Laporan PDF </h4>
        <h5>{{ $toko[0]->name }}</h5>
        <h5>{{ $toko[0]->address }}</h5>
        <h5>{{ $toko[0]->phone }}</h5>
    </center>

    <h6>Daftar Pengeluaran</h6>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No.</th>
                <th>Pemasok</th>
                <th>Kategori</th>
                <th>Nama/Merk</th>
                <th>Jumlah</th>
                <th>Berat/Isi/Volume</th>
                <th>Harga Beli Satuan</th>
                <th>Harga Total Beli</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($pembelian as $pembelian)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $pembelian->pemasokname }}</td>
                    <td>{{ $pembelian->kategoriname }}</td>
                    <td>{{ $pembelian->barangname }}</td>
                    <td>{{ $pembelian->jumlah }} {{ $pembelian->deskripsijumlah }}</td>
                    <td>{{ $pembelian->berat_volume }} {{ $pembelian->desk_b_v }}</td>
                    <td>Rp. {{ number_format($pembelian->hargabeli, 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($pembelian->totalbeli, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr>
                <th colspan="7">Total</th>
                <th> Rp. {{ number_format($totalbeli, 0, ',', '.') }}</th>
            </tr>
        </tbody>
    </table>
    <br>

    <h6>Daftar Pendapatan</h6>
    <table class='table table-bordered'>
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
            @foreach ($penjualan as $key => $penjualan)
                @php
                    $rowid += 1;
                @endphp
                <tr>

                    @if ($key == 0 || $rowspan == $rowid)
                        @php
                            $rowid = 0;
                            $rowspan = $penjualan->jumlah_item;
                        @endphp
                        {{-- @if ($no === 1)
                            <td rowspan="{{ $rowspan }}">{{ $no }}</td>
                        @else
                            @php
                                $no = $no - $rowspan + 1;
                            @endphp
                            <td rowspan="{{ $rowspan }}">{{ $no }}</td>
                        @endif --}}
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
            <tr>
                <th colspan="3">Total</th>
                <th colspan="5"> Rp. {{ number_format($totaljual, 0, ',', '.') }}</th>

            </tr>
        </tbody>
    </table>
<br>

    <h6>Daftar Karyawan</h6>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($karyawan as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->address }}</td>
                    <td>{{ $p->phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
