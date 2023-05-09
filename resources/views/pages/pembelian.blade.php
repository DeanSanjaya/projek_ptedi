@extends('templates.default')

@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pembelian Stok</li>
            </ol>
        </nav>
        {{-- <form method="post" action="#"> --}}
        <div class="row">
            <div class="col grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pembelian Stok</h4>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="gudang-tab" data-bs-toggle="tab" href="#gudang"
                                    role="tab" aria-controls="gudang" aria-selected="true">Form Pembelian</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" id="jual-tab" data-bs-toggle="tab" href="#jual" role="tab"
                                    aria-controls="jual" aria-selected="true">Jual Kembali</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" id="riwayat-tab" data-bs-toggle="tab" href="#riwayat" role="tab"
                                    aria-controls="riwayat" aria-selected="true">Riwayat Pembelian</a>
                            </li>
                        </ul>

                        <div class="tab-content border border-top-0 p-3" id="myTabContent">

                            {{-- SECTION GUDANG --}}
                            <div class="tab-pane fade show active" id="gudang" role="tabpanel"
                                aria-labelledby="gudang-tab">
                                <form action="{{ route('pembelian.store') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Pemasok</label>
                                        <select class="js-example-basic-single form-select" name="pemasok" id="pemasok"
                                            data-width="100%">
                                            <option value="">Pilih Pemasok</option>
                                            @foreach ($pemasoks as $pemasok)
                                                <option value="{{ $pemasok->id }}" phone="{{ $pemasok->phone }}"
                                                    address="{{ $pemasok->address }}" email="{{ $pemasok->email }}"
                                                    nama_pemasok="{{ $pemasok->name }}">{{ $pemasok->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input id="nama_pemasok" class="form-control" name="nama_pemasok" type="text">
                                        <input type="hidden" id="id_pemasok" name="id_pemasok">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input id="alamat_pemasok" class="form-control" name="alamat_pemasok"
                                            type="text">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Nomor Telepon</label>
                                        <input id="phone" class="form-control" name="phone" type="text">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" class="form-control" name="email" type="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">kategori</label>
                                        <select class="js-example-basic-single form-select" name="kategori" id="kategori"
                                            data-width="100%">
                                            <option value="">PILIH KATEGORI</option>
                                            @foreach ($kategoris as $kategori)
                                                <option value="{{ $kategori->id }}" id_kat="{{ $kategori->id }}">
                                                    {{ $kategori->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="jenis-barang" class="form-label">Merk Barang</label>
                                                    <select id="merk" class="merk form-select js-example-basic-single"
                                                        name="merk" data-width="100%">
                                                        <option value="0">Pilih</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="jenis-barang" class="form-label">Berat Satuan</label>
                                                    <input type="text" readonly class="form-control" id="bsat"
                                                        name="bsat">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row">
                                                        <label for="jumlah" class="form-label">Jumlah</label>
                                                        <div class="col-6">
                                                            <input id="jumlah" class="form-control" name="jumlah"
                                                                type="number">
                                                        </div>
                                                        <div class="col-6">
                                                            <select class="form-select" name="wadah" id="wadah">
                                                                <option value="">DESKRIPSI</option>
                                                                <option value="pack">pack</option>
                                                                <option value="toples">toples</option>
                                                                <option value="kardus">kardus</option>
                                                                <option value="karung">karung</option>
                                                                <option value="galon">galon</option>
                                                                <option value="tangki">tangki</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="" class="form-label"
                                                        id="berat">Berat/Isi/Volume</label>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input id="berat" class="form-control" name="berat"
                                                                type="number">
                                                        </div>
                                                        <div class="col-6">
                                                            <select class="form-select" name="satuanberat"
                                                                id="satuanberat">
                                                                <option value="">DESKRIPSI</option>
                                                                <option value="kg">kg</option>
                                                                <option value="g">gram</option>
                                                                <option value="mg">mg</option>
                                                                <option value="ons">ons</option>
                                                                <option value="pack">pack</option>
                                                                <option value="pcs">pcs</option>
                                                                <option value="liter">liter</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="harga" id="harga" class="form-label">Harga</label>
                                                <input id="harga" class="form-control" name="harga"
                                                    type="text">
                                            </div>
                                            <div class="col-6">
                                                <label for="total" class="form-label">Total Harga Beli</label>
                                                <input id="total" class="form-control" name="total"
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </form>
                            </div>

                            {{-- SECTION JUAL --}}
                            <div class="tab-pane fade" id="jual" role="tabpanel" aria-labelledby="jual-tab">
                                <div class="mb-3">
                                    <label class="form-label">Pemasok jual</label>
                                    <select class="js-example-basic-single form-select" name="pemasokjual"
                                        id="pemasokjual" data-width="100%">
                                        <option value="">Pilih Pemasok</option>
                                        @foreach ($pemasoks as $pemasok)
                                            <option value="{{ $pemasok->id }}" phone="{{ $pemasok->phone }}"
                                                address="{{ $pemasok->address }}" email="{{ $pemasok->email }}"
                                                nama_pemasok="{{ $pemasok->name }}">{{ $pemasok->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input id="nama_pemasokjual" class="form-control" name="nama_pemasokjual"
                                        type="text">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input id="alamat_pemasokjual" class="form-control" name="alamat_pemasokjual"
                                        type="text">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input id="phonejual" class="form-control" name="phonejual" type="text">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="emailjual" class="form-control" name="emailjual" type="email">
                                </div>
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">kategori</label>
                                    <select class="js-example-basic-single form-select" name="kategori" id="kategori"
                                        data-width="100%">
                                        <option value="">PILIH KATEGORI</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}" id_kat="{{ $kategori->id }}">
                                                {{ $kategori->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{-- <input id="barang" class="form-control" name="barang" type="text"> --}}
                                </div>

                                <div class="mb-3">
                                    <label for="jenis-barang" class="form-label">Merk Barang</label>
                                    <select id="merk" class="merk form-select js-example-basic-single"
                                        name="merk">
                                        <option value="0">Pilih</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="jumlah" class="form-label">Jumlah Total</label>
                                                    <div class="col-6">
                                                        <input id="jumlah" class="form-control" name="jumlah"
                                                            type="number">
                                                    </div>
                                                    <div class="col-6">
                                                        <select class="form-select" name="wadahjual" id="wadahjual">
                                                            <option value="">DESKRIPSI</option>
                                                            <option value="toples">toples</option>
                                                            <option value="kardus">kardus</option>
                                                            <option value="karung">karung</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="" class="form-label" name="berat"
                                                    id="berat">Berat Total</label>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <input id="berat" class="form-control" name="berat"
                                                            type="number">
                                                    </div>
                                                    <div class="col-6">
                                                        <select class="form-select" name="satuanberat" id="satuanberat">
                                                            <option value="">DESKRIPSI</option>
                                                            <option value="kg">kg</option>
                                                            <option value="g">g</option>
                                                            <option value="mg">mg</option>
                                                            <option value="ons">ons</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="jumlah" id="jumlahisijual" class="form-label">Jumlah
                                                        Isi Satuan Per</label>
                                                    <div class="col-6">
                                                        <input id="jumlahisijual" class="form-control"
                                                            name="jumlahisijual" type="number">
                                                    </div>
                                                    <div class="col-6">
                                                        <select class="form-select" name="wadah" id="wadah">
                                                            <option value="">DESKRIPSI</option>
                                                            <option value="pcs">pcs</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="" class="form-label" name="berat"
                                                    id="berat">Berat Satuan Per pcs</label>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <input id="berat" class="form-control" name="berat"
                                                            type="number">
                                                    </div>
                                                    <div class="col-6">
                                                        <select class="form-select" name="satuanberat" id="satuanberat">
                                                            <option value="">DESKRIPSI</option>
                                                            <option value="kg">kg</option>
                                                            <option value="g">g</option>
                                                            <option value="mg">mg</option>
                                                            <option value="ons">ons</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="hargabeli" id="hargabeli" class="form-label">Harga Beli Satuan
                                                Per</label>
                                            <input id="hargabeli" class="form-control" name="hargabeli" type="text">
                                        </div>
                                        <div class="col-6">
                                            <label for="total" class="form-label">Total Harga Beli</label>
                                            <input id="total" class="form-control" name="total" type="text">
                                        </div>
                                    </div>
                                </div>

                                <input class="btn btn-primary" type="submit" value="Submit">
                            </fieldset>
                        </form>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="harga" class="form-label">Harga Jual Satuan Per pcs</label>
                                            <input id="harga" class="form-control" name="harga" type="text">
                                        </div>
                                        <div class="col-6">
                                            <label for="total" id="hargajual" class="form-label">Harga Jual</label>
                                            <input id="total" class="form-control" name="total" type="text">
                                        </div>
                                    </div>
                                </div>
                                <input class="btn btn-primary" type="submit" value="Submit">
                            </div>

                            {{-- SECTION RIWAYAT --}}
                            <div class="tab-pane fade" id="riwayat" role="tabpanel" aria-labelledby="riwayat-tab">
                                <div class="table-responsive">
                                    <table id="dataTablemerk" class="display table">
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
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($no = 1)
                                            @foreach ($pembelians as $pembelian)
                                                <tr>
                                                    <th>{{ $no }}</th>
                                                    <td>{{ $pembelian->pemasokname }}</td>
                                                    <td>{{ $pembelian->kategoriname }}</td>
                                                    <td>{{ $pembelian->barangname }}</td>
                                                    <td>{{ $pembelian->jumlah }} {{ $pembelian->deskripsijumlah }}</td>
                                                    <td>{{ $pembelian->berat_volume }} {{ $pembelian->desk_b_v }}</td>
                                                    <td>Rp. {{ number_format($pembelian->hargabeli, 0, ',', '.') }}</td>
                                                    <td>Rp. {{ number_format($pembelian->totalbeli, 0, ',', '.') }}</td>
                                                    <td>
                                                        {{-- <button type="button" class="btn btn-primary btn-icon"
                                                            data-bs-target="#modalbarangedit{{ $pembelian->id }}"
                                                            data-bs-toggle="modal">
                                                            <i data-feather="edit-2"></i>
                                                        </button> --}}
                                                        <button type="button" class="btn btn-danger btn-icon"
                                                            data-bs-target="#modalbaranghapus{{ $pembelian->id }}"
                                                            data-bs-toggle="modal">
                                                            <i data-feather="trash-2"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @php($no++)

                                                {{-- POP UP HAPUS --}}
                                                <div class="modal fade" id="modalbaranghapus{{ $pembelian->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel-2"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel-2">Delete
                                                                    Detail Pembelian</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="btn-Close">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class=""
                                                                    action="{{ route('pembelian.destroy', $pembelian->id) }}"
                                                                    method="post">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <p>Delete <strong>{{ $pembelian->barangname }}</strong>
                                                                    </p>
                                                                    <input type="hidden" name="jumlah_besar"
                                                                        id="jumlah_besar" value="{{ $pembelian->jumlah }}">


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger text-white">Delete</button>
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
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('select[name="pemasok"]').on('change', function() {
                var nama_pemasok = $("#pemasok option:selected").attr("nama_pemasok");
                $("#nama_pemasok").val(nama_pemasok);
                var alamat_pemasok = $("#pemasok option:selected").attr("address");
                $("#alamat_pemasok").val(alamat_pemasok);
                var phone = $("#pemasok option:selected").attr("phone");
                $("#phone").val(phone);
                var email = $("#pemasok option:selected").attr("email");
                $("#email").val(email);
                var id = $("#pemasok option:selected").attr("value");
                $("#id_pemasok").val(id);

            })

            $('select[name="pemasokjual"]').on('change', function() {
                var nama_pemasokjual = $("#pemasokjual option:selected").attr("nama_pemasok");
                $("#nama_pemasokjual").val(nama_pemasokjual);
                // console.log(nama_pemasok);
                var alamat_pemasokjual = $("#pemasokjual option:selected").attr("address");
                $("#alamat_pemasokjual").val(alamat_pemasokjual);
                var phonejual = $("#pemasokjual option:selected").attr("phone");
                $("#phonejual").val(phonejual);
                var emailjual = $("#pemasokjual option:selected").attr("email");
                $("#emailjual").val(emailjual);

            })
        })
    </script>
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#kategori').change(function() {
                $('.js-example-basic-single').select2();
                var id = $(this).val();
                $.ajax({
                    url: "/kategori_ip",
                    method: "post",
                    data: {
                        id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].id + '" >' + data[i].name +
                                '</option>';
                        }
                        $('.merk').html(html);

                    }
                });

            });
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $('select[name="kategori"]').on('change', function() {
                var id_kat = $("#kategori option:selected").attr("id_kat");
                // console.log(id_kat);
                let id_kategori = $(this).val();
                if (id_kategori) {
                    jQuery.ajax({
                        // url yg di root yang kita buat tadi
                        url: "/kategori_ip/" + id_kategori,
                        // aksion GET, karena kita mau mengambil data
                        type: 'GET',
                        // type data json
                        dataType: 'json',
                        // jika data berhasil di dapat maka kita mau apain nih
                        success: function(data) {
                            // jika tidak ada select dr provinsi maka select kota kososng / empty
                            $('select[name="merk"]').empty();
                            // jika ada kita looping dengan each
                            $.each(data, function(key, value) {
                                // perhtikan dimana kita akan menampilkan data select nya, di sini saya memberi name select kota adalah kota_id
                                $('select[name="merk"]').append('<option value="' +
                                    value.id + '" berat_volume="' + value
                                    .berat_volume + '" >' + ' ' + value.name +
                                    '</option>');
                                // $("#bsat").val(value.berat_volume);
                                // console.log(value.berat_volume);
                            });
                        }
                    });
                } else {
                    $('select[name="merk"]').empty();
                }
            })
            $('select[name="merk"]').on('change', function() {
                var bsat = $("#merk option:selected").attr("berat_volume");
                $("#bsat").val(bsat);
            })

        })
    </script>
    <script>
        $(document).ready(function() {
            $('select[name="wadah"]').on('change', function() {
                var wadah = $("#wadah option:selected").attr("value");
                document.getElementById("harga").innerHTML = 'Harga setiap 1 ' + wadah;
                document.getElementById("berat").innerHTML = 'Berat/Isi/Volume setiap 1 ' + wadah;
                // $("#isi").text(wadah);
                // console.log(wadah);

            })

            $('select[name="wadahjual"]').on('change', function() {
                var wadahjual = $("#wadahjual option:selected").attr("value");
                document.getElementById("jumlahisijual").innerHTML = 'Jumlah Isi Satuan Per ' + wadahjual;
                document.getElementById("hargabeli").innerHTML = 'Harga Beli Satuan Per ' + wadahjual;
                document.getElementById("hargajual").innerHTML = 'Harga Jual Per ' + wadahjual;
                // $("#isi").text(wadah);
                console.log(wadahjual);

            })
        })
    </script>
@endsection
