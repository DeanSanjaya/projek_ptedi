@extends('templates.default')

@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pembelian Stok</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pembelian Stok</h4>
                        <form class="cmxform" id="signupForm" method="get" action="#">
                            <fieldset>
                                <div class="mb-3">
                                    <label class="form-label">Pemasok</label>
                                    <select class="js-example-basic-single form-select" data-width="100%">
                                        <option value="">Pilih Pemasok</option>
                                        @foreach ($pemasok as $pemasok)
                                            <option value="{{ $pemasok->id }}">{{ $pemasok->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input id="name" class="form-control" name="name" type="text">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input id="alamat" class="form-control" name="alamat" type="text">
                                </div>
                                <div class="mb-3">
                                    <label for="No" class="form-label">Nomor Telepon</label>
                                    <input id="No" class="form-control" name="No" type="No">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" class="form-control" name="email" type="email">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="cmxform" id="signupForm" method="get" action="#">
                            <fieldset>
                                <div class="mb-3">
                                    <label for="barang" class="form-label">Barang</label>
                                    <input id="barang" class="form-control" name="barang" type="text">
                                </div>
                                <div class="mb-3">
                                    <label for="jenis-barang" class="form-label">Jenis barang</label>
                                    <input id="jenis-barang" class="form-control" name="jenis-barang" type="text">
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input id="jumlah" class="form-control" name="jumlah" type="text">
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input id="harga" class="form-control" name="harga" type="text">
                                </div>
                                <div class="mb-3">
                                    <label for="total" class="form-label">Total</label>
                                    <input id="total" class="form-control" name="total" type="text">
                                </div>
                                <input class="btn btn-primary" type="submit" value="Submit">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('select[name="province_id"]').on('change', function() {

            })
        })
        
    </script>
@endsection
