@extends('templates.default')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kasir</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <h6 class="card-title p-1 rounded" style="background-color:darkgray">Kasir</h6> --}}
                        <div class="mb-3">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-3 ">
                                        <label for="cari" class="form-label card-title rounded p-2"
                                            style="background-color:lightgray; width:100%"> <i data-feather="search"></i>
                                            Cari
                                            Barang</label>
                                        <input type="text" name="cari" id="cari" class="form-control"
                                            placeholder="Masukkan nama barang">
                                    </div>
                                    <div class="col-9">
                                        <label for="hasil" class="form-label card-title rounded p-2"
                                            style="background-color:lightgray; width:100%"> <i data-feather="list"></i>
                                            Hasil
                                            Pencarian</label>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        {{-- <th>No</th> --}}
                                                        <th>Nama</th>
                                                        <th>Harga</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="pencarian">
                                                    <tr>
                                                        {{-- <th>1</th> --}}
                                                        {{-- <td>testing</td>
                                                        <td>Rp. 5.0000</td>
                                                        <td> <button type="button" class="btn btn-primary btn-icon">

                                                                <i data-feather="plus"></i>
                                                            </button>
                                                        </td> --}}
                                                    </tr>
                                                    <tr>
                                                        {{-- <th>2</th> --}}
                                                        {{-- <td>testing</td>
                                                        <td>Rp. 5.0000</td>
                                                        <td> <button type="button" class="btn btn-primary btn-icon">

                                                                <i data-feather="plus"></i>
                                                            </button>
                                                        </td> --}}
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title form-label p-2 rounded" style="background-color:lightgray">
                            <i data-feather="shopping-cart"></i> Kasir
                            {{-- <button class=" btn btn-danger"
                                style="margin-left: 70%">Reset Keranjang</button> --}}
                            <a href="javascript:window.location.reload()" class=" btn btn-danger"
                                style="margin-left: 70%">Reset Keranjang</a>
                        </h3>
                        <div class="mb-3">


                            <div class="row">
                                <label for="tanggal" class="col-3 col-form-label mb-1">Tanggal</label>
                                <div class="col-9">
                                    <input type="text" name="tanggal" id="tanggal" class="form-control" readonly
                                        value="{{ date('d/m/Y') }}">
                                </div>
                                <label for="tanggal" class="col-3 col-form-label">Nama Kasir</label>
                                <div class="col-9">
                                    <input type="text" name="namakasir" id="namakasir" class="form-control" readonly
                                        value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <form action="{{ route('kasir.store') }}" method="post">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                {{-- <th>No</th> --}}
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody id="keranjang">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row p-1 mt-1">
                                    <div class="col-6 mb-1">
                                        <div class="row">
                                            <label for="total" class="col-3 form-label">Total Semua</label>
                                            <div class="col-9">
                                                <input type="number" name="total" id="total" class="form-control"
                                                    placeholder="Rp. 0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-1">
                                        <div class="row">
                                            <label for="nominal" class="col-3 form-label">Nominal Uang</label>
                                            <div class="col-9">
                                                <input type="number" name="nominal" id="nominal"
                                                    class="form-control nominal" placeholder="Masukan nominal uang">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-1">
                                        <div class="row">
                                            <label for="kembalian" class="col-3 form-label">Kembalian</label>
                                            <div class="col-9">
                                                <input type="text" name="kembalian" id="kembalian" class="form-control"
                                                    placeholder="Kembalian uang">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-1 d-grid gap-2">
                                        <button id="btn_bayar" type="submit" value="submit" class="btn btn-success bayar"
                                            disabled><i data-feather="check"></i> Bayar</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('input[name="cari"]').on('change', function() {
                var name = $("#cari").val();
                // console.log(name);
                // let id_kategori = $(this).val();
                if (name) {
                    jQuery.ajax({
                        // url yg di root yang kita buat tadi
                        url: "/search_barang/" + name,
                        // aksion GET, karena kita mau mengambil data
                        type: 'GET',
                        // type data json
                        dataType: 'json',
                        // jika data berhasil di dapat maka kita mau apain nih
                        success: function(data) {
                            // jika tidak ada select dr provinsi maka select kota kososng / empty
                            $('#pencarian').empty();
                            // jika ada kita looping dengan each
                            $.each(data, function(key, value) {
                                // perhtikan dimana kita akan menampilkan data select nya, di sini saya memberi name select kota adalah kota_id
                                $('#pencarian').append('<tr> <td>' + value.name +
                                    '</td> <td>' + 'Rp. ' + value.harga_jual +
                                    '</td> <td> <button type="button" id="' + value
                                    .id +
                                    '"onClick="tambah(this.id)" class="btn btn-primary btn-icon"> <i data-feather="plus"></i>  </button> </td> <td><input type="hidden" name="id_barang" id="id_barang" value="' +
                                    value.id + '"></td></tr>');
                                // $("#bsat").val(value.berat_volume);
                                // console.log(value.berat_volume);
                                feather.replace()
                            });
                        }
                    });
                } else {
                    $('input[name="cari"]').empty();
                }
            })

        })
    </script>
    <script type="text/javascript">
        function tambah(id) {
            // alert(id);
            // alert(event.srcElement.id);
            if (id) {
                jQuery.ajax({
                    url: "/detail_barang/" + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#keranjang').append('<tr> <td>' + value.name +
                                '</td> <td>' + 'Rp. ' + value.harga_jual +
                                '</td> <td> <input type="number" onChange="item(this.id)" name="item[]" idd="item' +
                                value.id + '" id="item' + value.id +
                                '" id_item ="' + value.id +
                                '" harga_jual ="' + value.harga_jual +
                                '" class="form-control price" style="width: 50%"> <input type="hidden" name="subtotall[]" id="subtotall' +
                                value.id +
                                '" class="subtotal"> <input type="hidden" name="nama_item[]" value="' +
                                value.name + '" > <input type="hidden" name="id_barang[]" value="' +
                                value.id + '"> <input type="hidden" name="harga[]" value="' + value
                                .harga_jual + '"> </td> <td id="subtotal' +
                                value.id + '"> SUBTOTAL  </td> </tr>'
                            );
                            feather.replace()
                        });
                    }
                });
            } else {
                // $('#keranjang').empty();
            }
        }
    </script>
    <script>
        function item(id) {


            var idd = jQuery('#' + id).attr('idd');
            if ((id) == (idd)) {
                var id_item = jQuery('#' + id).attr('id_item');
                var jumlah = jQuery('#' + id).val();
                var harga = jQuery('#' + id).attr('harga_jual');
                // console.log(jumlah);
                // console.log(harga);
                // console.log(id_item);
                var subtotal = harga * jumlah;
                // alert(true);    
                jQuery("#subtotall" + id_item).val(subtotal);
                document.getElementById("subtotal" + id_item).innerHTML = "Rp. " + subtotal;
            } else {
                jQuery('#' + id).empty();
                // alert(false);
            }
        }
        $(document).on('keyup', ".price", function() {
            var total = 0;

            $('.subtotal').each(function() {
                total += parseFloat($(this).val());
            })

            console.log(total)
            $("#total").val(total);
        })
        $(document).on('keyup', ".nominal", function() {
            var uang = $("#nominal").val();
            var total = $("#total").val();
            var kembalian = uang - total;
            // console.log(uang);
            // console.log(total);
            // console.log(kembalian);
            if ((kembalian) < 0) {
                console.log(kembalian);
                // document.getElementById("kembalian").reset();
                document.getElementById("btn_bayar").disabled = true;
            } else {
                // console.log(true);
                $("#kembalian").val(kembalian);

                document.getElementById("btn_bayar").disabled = false;

            }

        })
    </script>
@endsection
