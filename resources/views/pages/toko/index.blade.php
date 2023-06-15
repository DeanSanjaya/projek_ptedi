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
                        @if ($id_toko == null)
                            <form class="forms-sample" action="{{ route('toko.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="text-center">
                                    <div class="profile-pic-div">
                                        <img id="photoold1" class="my-4 rounded-circle" style="height: 150px;"
                                            src="{{ asset('assets/onepage/img/profile.jpg ') }}" class="img-fluid"
                                            alt="profile">

                                        <input style="display: none" type="file" id="image" name="image">
                                        <br>
                                        <label style="cursor : pointer; border: 1px solid grey;" id="uploadBtn"
                                            class="p-1" for="image">Upload Logo Toko</label>
                                    </div>
                                </div>
                                {{-- <input type="hidden" name="id_toko" id="id_toko" value="{{ $toko->id_toko }}"> --}}
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama Toko</label>
                                    <input type="text" class="form-control" id="" name="name"
                                        autocomplete="off" placeholder="Nama Toko" required value="">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Domisili Toko</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Domisili Toko" required value="">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">No Telepon</label>
                                    <input type="number" class="form-control" id="phone" name="phone"
                                        autocomplete="off" placeholder="No Telepon" required value="">
                                </div>
                                <div class="d-flex justify-content-around button">
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <button class="btn btn-secondary">Cancel</button>
                                </div>
                            </form>
                        @else
                            <form class="forms-sample" action="{{ route('toko.update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @foreach ($toko as $toko)
                                <div class="text-center">
                                    <div class="profile-pic-div">
                                        {{-- @if ($toko->photo == null)
                                            <img id="photoold" class="my-4 rounded-circle" style="height: 150px;"
                                                src="{{ asset('assets/onepage/img/profile.jpg ') }}" class="img-fluid"
                                                alt="profile">
                                        @else --}}
                                            <img id="photoold2" class="my-4 rounded-circle" style="height: 150px;"
                                                src=" {{ asset('storage/' . $toko->photo) }}" class="img-fluid"
                                                alt="profile">
                                            <input type="hidden" name="imageold" id="imageold"
                                                value="{{ $toko->photo }}">
                                        {{-- @endif --}}
                                        <input style="display: none" type="file" id="image" name="image">
                                        <br>
                                        <label style="cursor : pointer; border: 1px solid grey;" id="uploadBtn"
                                            class="p-1" for="image">Ganti Logo Toko</label>
                                    </div>
                                </div>
                                <input type="hidden" name="id_toko" id="id_toko" value="{{ $toko->id_toko }}">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama Toko</label>
                                    <input type="text" class="form-control" id="" name="name"
                                        autocomplete="off" placeholder="Nama Toko" required value="{{ $toko->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Domisili Toko</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Domisili Toko" required value="{{ $toko->address }}">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">No Telepon</label>
                                    <input type="number" class="form-control" id="phone" name="phone"
                                        autocomplete="off" placeholder="No Telepon" required
                                        value="{{ $toko->phone }}">
                                </div>
                                <div class="d-flex justify-content-around button">
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <a href="{{route('main')}}" class="btn btn-secondary">Cancel</a>
                                </div>
                                @endforeach 
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#photoold1').attr('src', e.target.result);
                    $('#photoold2').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function() {
            readURL(this);
        });
    </script>
@endsection
