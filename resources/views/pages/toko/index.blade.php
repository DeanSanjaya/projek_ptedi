@extends('templates.default')

@section('content')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Toko</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="profile-pic-div">
                                <img id="photo" class="my-4 rounded-circle" style="height: 150px;"
                                    src="{{ asset('assets/onepage/img/profile.jpg ') }}" class="img-fluid" alt="profile">
                                <input style="display: none" type="file" id="file">
                                <br>
                                <label style="cursor : pointer; border: 1px solid grey;" id="uploadBtn" class="p-1"
                                    for="file">Ganti Logo Toko</label>
                            </div>
                        </div>
                        <form class="forms-sample">
                            <div class="mb-3">
                                <label for="exampleInputName1" class="form-label">Nama Toko</label>
                                <input type="text" class="form-control" id="exampleInputName1" autocomplete="off"
                                    placeholder="Nama Toko" value="Toko Makmur">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputTelp1" class="form-label">Domisili Toko</label>
                                <input type="text" class="form-control" id="exampleInputTelp1" placeholder="Domisili Toko"
                                    value="Sidoarjo">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputAlamat1" class="form-label">No Telepon</label>
                                <input type="number" class="form-control" id="exampleInputAlamat1" autocomplete="off"
                                    placeholder="No Telepon" value="089767545">
                            </div>
                            <div class="d-flex justify-content-around button">
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection