@extends('templates.default')

@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Penjualan</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Penjualan Stok</h4>

                        <form action="{{ route('barang.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="merk" class="form-label">BARANG</label>
                                <select class="merk form-select js-example-basic-single" name="merk" id="merk"
                                    data-width="100%">
                                    <option value="">PILIH BARANG</option>
                                    @foreach ($barangs as $barang)
                                        <option value="{{ $barang->id }}" id_kat="{{ $barang->id }}"
                                            beratsatuan="{{ $barang->volume }}" jumlah="{{ $barang->jumlah }}"
                                            deskripsijumlah="{{ $barang->deskripsijumlah }}"
                                            berat_volume="{{ $barang->berat_volume }}" desk_b_v="{{ $barang->desk_b_v }}"
                                            hargabeli="{{ $barang->hargabeli }}" totalbeli="{{ $barang->totalbeli }}" hargajual="{{$barang->harga_jual}}">
                                            {{ $barang->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="col-12">
                                    <div class="row">
                                        <label for="jenis-barang" class="form-label">Jumlah Barang</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" readonly id="jumlah" name="jumlah">
                                        </div>
                                        <div class="col-6">
                                            {{-- <label for="jenis-barang" class="form-label">Berat Satuan</label> --}}
                                            <input type="text" class="form-control" readonly id="deskripsijumlah" name="deskripsijumlah">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="berat_volume" id="berat_volume2" class="form-label">Berat/Isi/Volume Satu Wadah</label>
                                            <input id="berat_volume" class="form-control" readonly name="berat_volume" type="text">
                                        </div>
                                        <div class="col-6">
                                            <label for="desk_b_v" class="form-label" id="berat"> Deskripsi Berat/Isi/Volume Satu
                                                Wadah</label>
                                            <input type="text" class="form-control" readonly name="desk_b_v" id="desk_b_v">

                                        </div>
                                        {{-- <div class="col-4">
                                            <label for="beratsatuan" class="form-label" id="berat">Berat/Volume Satuan
                                                Barang</label>
                                            <input type="text" class="form-control" readonly name="beratsatuan" id="beratsatuan">
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="hargabeli"  class="form-label">Harga Beli</label>
                                        <input id="hargabeli" class="form-control" readonly name="hargabeli" type="text">
                                    </div>
                                    <div class="col-6">
                                        <label for="minhargajual" class="form-label">Minimum Harga Jual</label>
                                        <input id="minhargajual" class="form-control" readonly name="minhargajual" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="" class="form-label">Jual Stok Per Wadah</label>
                                        <input type="number" class="form-control" name="jualwadah" id="jualwadah">
                                    </div>
                                    <div class="col-4">
                                        <label for="stok" class="form-label">Persedian Stok Satuan</label>
                                        <input type="text" readonly class="form-control" name="stok" id="stok">
                                    </div>
                                    <div class="col-4">
                                        <label for="hargajual" class="form-label">Tetapkan Harga Jual</label>
                                        <input type="number" class="form-control" name="hargajual" id="hargajual">
                                    </div>
                                </div>

                            </div>

                            <input class="btn btn-primary" type="submit" value="Submit">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('select[name="merk"]').on('change', function() {
                var id_bar = $("#merk option:selected").attr("value");
                $("#id_bar").val(id_bar);
                // console.log(nama_pemasok);
                var beratsatuan = $("#merk option:selected").attr("beratsatuan");
                $("#beratsatuan").val(beratsatuan);
                var jumlah = $("#merk option:selected").attr("jumlah");
                $("#jumlah").val(jumlah);
                var deskripsijumlah = $("#merk option:selected").attr("deskripsijumlah");
                $("#deskripsijumlah").val(deskripsijumlah);
                var berat_volume = $("#merk option:selected").attr("berat_volume");
                $("#berat_volume").val(berat_volume);
                document.getElementById("berat_volume2").innerHTML = 'Berat/Isi/Volume Satu ' + deskripsijumlah;
                var desk_b_v = $("#merk option:selected").attr("desk_b_v");
                $("#desk_b_v").val(desk_b_v);
                var hargabeli = $("#merk option:selected").attr("hargabeli");
                $("#hargabeli").val(hargabeli);
                var hargajual = $("#merk option:selected").attr("hargajual");
                $("#hargajual").val(hargajual);
                var minhargajual = hargabeli / berat_volume;
                $("#minhargajual").val(minhargajual);

            })
            $("#jualwadah").keyup(function() {
                var x = $("#jualwadah").val();
                var y = $("#berat_volume").val();
                var z = x * y;
                $("#stok").val(z);
            });
        })
    </script>
@endsection
