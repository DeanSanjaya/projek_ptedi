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
                        <h4 class="card-title">Form Produksi Stock</h4>

                        <form action="{{ route('produksi.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6"> <label for="merk" class="form-label">BARANG</label>
                                            <select class="merk form-select js-example-basic-single" name="merk"
                                                id="merk" data-width="100%">
                                                <option value="">PILIH BARANG</option>
                                                @foreach ($barangs as $barang)
                                                    <option value="{{ $barang->id }}" id_kat="{{ $barang->id }}"
                                                        beratsatuan="{{ $barang->volume }}"> {{ $barang->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6"><label for="beratsatuan" class="form-label"
                                                id="berat">Berat/Volume Satuan Barang</label>
                                            <input type="text" class="form-control" readonly name="beratsatuan"
                                                id="beratsatuan">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="mb-3">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="stok" class="form-label">Jumlah Produksi Barang</label>
                                            <input type="text" class="form-control" id="stok" name="stok">
                                        </div>
                                        <div class="col-4">
                                            <label for="stok_deskripsi" class="form-label">Deskripsi</label>
                                            <select class="form-select" name="stok_deskripsi" id="stok_deskripsi">
                                                <option value="">DESKRIPSI</option>
                                                <option value="toples">toples</option>
                                                <option value="kardus">kardus</option>
                                                <option value="karung">karung</option>
                                                <option value="pcs">pcs</option>
                                                <option value="botol">botol</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label for="hargajual" class="form-label">Harga Jual</label>
                                            <input type="text" class="form-control" id="hargajual" name="hargajual">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3" id="formbahan" class="formbahan">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="bahan" class="form-label">PILIH BAHAN</label>
                                            <select class="merk form-select" name="bahan[]" id="bahan[]"
                                                data-width="100%">
                                                <option value="">PILIH BAHAN</option>
                                                @foreach ($bahans as $bahan)
                                                    <option value="{{ $bahan->name }}" id_kat="{{ $bahan->id }}"
                                                        stok="{{ $bahan->stok }}" name="{{ $bahan->name }}"
                                                        stok_deskripsi="{{ $bahan->stok_deskripsi }}"
                                                        jumlah_besar="{{ $bahan->jumlah_besar }}"
                                                        jumlah_besar_deskripsi="{{ $bahan->jumlah_besar_deskripsi }}"
                                                        jumlah_kecil="{{ $bahan->jumlah_kecil }}"
                                                        jumlah_kecil_deskripsi="{{ $bahan->jumlah_kecil_deskripsi }}">
                                                        {{ $bahan->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label for="stokgudang" class="form-label">Stok tersedia</label>
                                            <input type="text" name="stokgudang[]" id="stokgudang[]"
                                                class="form-control">
                                        </div>
                                        <div class="col-4">
                                            <label for="jumlah" class="form-label">Jumlah Yang
                                                Dibutuhkan</label>
                                            <input type="text" class="form-control" name="jumlah[]" id="jumlah[]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="formbahan2"></div>
                            {{-- <button onclick="myFunction()">Copy</button> --}}
                            {{-- <p>Click "Copy" to copy the "demo" element, including all its attributes and child elements, and
                                append it to the document.</p> --}}
                            {{-- <button type="button" class="" id="tambahbahan">+</button> --}}
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary" onclick="duplicate(this)"
                                    type="button">Duplicate</button>
                                <button class="btn btn-primary" onclick="remove(this)" type="button">Remove</button>
                                <input class="btn btn-primary" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ! Swett Alert CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    {{-- ! Swett Alert CDN --}}

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('select[name="merk"]').on('change', function() {
                // console.log(nama_pemasok);
                var beratsatuan = $("#merk option:selected").attr("beratsatuan");
                $("#beratsatuan").val(beratsatuan);
            })
            $('select[id="bahan[]"]').on('change', function() { //coba en an      
                var jumlah_besar = $("#bahan option:selected").attr("jumlah_besar");
                var jumlah_kecil = $("#bahan option:selected").attr("jumlah_kecil");
                // $("#stokgudang").val(jumlah_besar)*val(jumlah_kecil);
                // document.getElementById("stokgudang").value = jumlah_besar * jumlah_kecil;
                console.log(jumlah_besar);
            })

        })
    </script>
    <script>
        let counter = 1;

        // $(document).ready(function() {
        //     $("#tambahbahan").click(function() {
        //         const node = document.getElementById("formbahan").lastChild;
        //         const clone = node.cloneNode(true);
        //         document.getElementById("formbahan").appendChild(clone);
        //     });
        // })

        function duplicate(button) {
            counter += 1;
            if (counter >= 1) {
                const node = document.getElementById("formbahan");
                const clone = node.cloneNode(true);
                document.getElementById("formbahan2").appendChild(clone);

            }
        }

        function remove(button) {
            counter -= 1;
            if (counter >= 1) {
                const node = document.getElementById("formbahan");
                node.parentNode.removeChild(node);
                // document.getElementById("formbahan")
            } else {
                counter += 1;
                Swal.fire({
                    title: 'Error!',
                    text: 'Tidak bisa menghapus lagi',
                    icon: 'error',
                    confirmButtonText: 'Confirm'
                })
            }
        }
    </script>
@endsection
