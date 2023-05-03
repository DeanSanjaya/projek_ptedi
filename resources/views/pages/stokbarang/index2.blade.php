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
                        <div class="mb-3">
                            <label class="form-label">Single select box using select 2</label>
                            <select class="js-example-basic-single form-control-sm"
                                onmousedown="if(this.options.length>3){this.size=3;}" onchange='this.size=0;'
                                data-width="100%">
                                <option value="TX">Texas</option>
                                <option value="NY">New York</option>
                                <option value="FL">Florida</option>
                                <option value="KN">Kansas</option>
                                <option value="HW">Hawaii</option>
                                <option value="TX">Texas</option>
                                <option value="NY">New York</option>
                                <option value="FL">Florida</option>
                                <option value="KN">Kansas</option>
                                <option value="HW">Hawaii</option>
                            </select>
                        </div>
                        <h6 class="card-title">Data Pemasok</h6>
                        <button type="button" title="TAMBAH KATEGORI" class="btn btn-primary mb-2"
                            data-bs-target="#modalkat" data-bs-toggle="modal"><i data-feather="plus"></i>Kategori </button>
                        <button type="button" title="TAMBAH MERK BARANG" class="btn btn-primary mb-2"
                            data-bs-target="#modalmerk" data-bs-toggle="modal"><i data-feather="plus"></i>Merk Barang
                        </button>

                        <button type="button" title="EDIT KATEGORI" class="btn btn-warning mb-2"
                            data-bs-target="#modaledtkat" data-bs-toggle="modal"><i data-feather="edit"></i> Kategori
                        </button>
                        <button type="button" title="EDIT MERK BARANG" class="btn btn-warning mb-2"
                            data-bs-target="#modaledtmerk" data-bs-toggle="modal"> <i data-feather="edit"></i> Merk Barang
                        </button>

                        <button type="button" title="HAPUS KATEGORI" class="btn btn-danger mb-2"
                            data-bs-target="#modalhpskat" data-bs-toggle="modal"><i data-feather="trash"></i> Kategori
                        </button>
                        <button type="button" title="HAPUS MERK BARANG" class="btn btn-danger mb-2"
                            data-bs-target="#modalhpsmerk" data-bs-toggle="modal"> <i data-feather="trash"></i> Merk Barang
                        </button>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kategori</th>
                                        <th>Nama/Merk</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemasok as $pemasok)
                                        <tr>
                                            <td>{{ $pemasok->name }}</td>
                                            <td>{{ $pemasok->phone }}</td>
                                            <td>{{ $pemasok->address }}</td>
                                            <td>{{ $pemasok->email }}</td>

                                            <td>
                                                <button
                                                    onclick="window.location='{{ route('pemasok.edit', $pemasok->id) }}'"
                                                    type="button" class="btn btn-primary btn-icon">
                                                    <i data-feather="edit-2"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-icon"
                                                    data-bs-target="#modal{{ $pemasok->id }}" data-bs-toggle="modal">
                                                    <i data-feather="trash-2"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="modal{{ $pemasok->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel-2">Delete Pemasok</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="btn-Close">
                                                            {{-- <span aria-hidden="true">&times;</span> --}}
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class=""
                                                            action="{{ route('pemasok.destroy', $pemasok->id) }}"
                                                            method="post">
                                                            @csrf
                                                            {{-- @method('PUT') --}}
                                                            @method('delete')
                                                            <p>Delete <strong>{{ $pemasok->name }}</strong> </p>

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

                        <div class="modal fade" id="modalkat" tabindex="-1" aria-labelledby="exampleModalLabel-2"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel-2">Tambah Kategori
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="btn-Close">
                                            {{-- <span aria-hidden="true">&times;</span> --}}
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('kategori_store') }}" method="post">
                                            @csrf
                                            {{-- @method('PUT') --}}
                                            {{-- @method('delete')
                                                            <p>Delete <strong>{{ $pemasok->name }}</strong> </p> --}}
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama Kategori :</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ old('name') }}" required autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>
                                                            @error('name')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </strong>
                                                    @enderror
                                                </span>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary text-white">Submit</button>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modalmerk" tabindex="-1" aria-labelledby="exampleModalLabel-2"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel-2">Tambah merk barang
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="btn-Close">
                                            {{-- <span aria-hidden="true">&times;</span> --}}
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('merkbarang_store') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="kategori" class="form-label">Kategori :</label>
                                                {{-- <input type="text" class="form-control" id="kategori" name="kategori"> --}}
                                                <select for="kategori"
                                                    onmousedown="if(this.options.length>3){this.size=3;}"
                                                    onchange='this.size=0;' name="id_kat" id="id_kat"
                                                    class="form-select">
                                                    <option value="">PILIH KATEGORI</option>
                                                    @foreach ($kategoris as $kategori)
                                                        <option value="{{ $kategori->id }}"> {{ $kategori->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="mb-3">
                                                <label for="Merk Barang" class="form-label">Merk Barang :</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="volume" class="form-label">Volume :</label>
                                                <input type="text" class="form-control" id="volume" name="volume"
                                                    required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan lainnya :</label>
                                                <input type="text" class="form-control" id="keterangan"
                                                    name="keterangan">
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary text-white">Submit</button>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modaledtkat" tabindex="-1" aria-labelledby="exampleModalLabel-2"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel-2">Edit Kategori
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="btn-Close">
                                            {{-- <span aria-hidden="true">&times;</span> --}}
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('kategori_edit') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label list="kategori" class="form-label">Kategori :</label>
                                                {{-- <input type="text" class="form-control" id="kategori" name="kategori"> --}}
                                                <select for="kategori"
                                                    onmousedown="if(this.options.length>3){this.size=3;}"
                                                    onchange='this.size=0;' name="edit_kat" id="edit_kat"
                                                    class="form-select">
                                                    <option value="">PILIH KATEGORI</option>
                                                    @foreach ($kategoris as $kategorii)
                                                        <option value="{{ $kategorii->id }}"
                                                            idkat="{{ $kategorii->id }}"
                                                            namekat="{{ $kategorii->name }}"> {{ $kategorii->name }}
                                                        </option>
                                                    @endforeach
                                                    <input type="hidden" name="idkat" id="idkat">
                                                    <input type="hidden" name="namekat" id="namekat">
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Newname" class="form-label">Ubah Menjadi :</label>
                                                <input type="text" class="form-control" id="newname" name="newname"
                                                    required>
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary text-white">Submit</button>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modaledtmerk" tabindex="-1" aria-labelledby="exampleModalLabel-2"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel-2">Edit merk barang
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="btn-Close">
                                            {{-- <span aria-hidden="true">&times;</span> --}}
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label list="kategori" class="form-label">Merk Barang :</label>
                                                <select for="kategori" name="edit_merkbarang" id="edit_merkbarang"
                                                    class="form-select js-example-basic-single">
                                                    <option value="">Pilih Merk Barang</option>
                                                    @foreach ($barangs as $barang)
                                                        <option value="{{ $barang->id }}" idbar="{{ $barang->id }}"
                                                            namebar="{{ $barang->name }}"
                                                            volumebar="{{ $barang->volume }}"
                                                            keteranganbar="{{ $barang->keterangan }}"
                                                            idkatbar="{{ $barang->id_kat }}">
                                                            {{ $barang->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="mb-3">
                                                <label list="kategori" class="form-label">Ubah kategori :</label>
                                                {{-- <input type="text" class="form-control" id="kategori" name="kategori"> --}}
                                                <select for="kategori"
                                                    onmousedown="if(this.options.length>3){this.size=3;}"
                                                    onchange='this.size=0;' class="form-select" name="select_kat"
                                                    id="select_kat">
                                                    <option value="">PILIH KATEGORI</option>
                                                    @foreach ($kategoris as $kategorii)
                                                        <option value="{{ $kategorii->id }}"
                                                            idkat="{{ $kategorii->id }}"
                                                            namekat="{{ $kategorii->name }}"> {{ $kategorii->name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                                <input type="text" name="select_kats" id="select_kats">
                                            </div>
                                            <div class="mb-3">
                                                {{-- <input type="text" name="idbar" id="idbar"> --}}
                                                <label for="Merk Barang" class="form-label">Merk Barang :</label>
                                                <input type="text" class="form-control" id="namebar" name="namebar"
                                                    required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="volume" class="form-label">Volume :</label>
                                                <input type="text" class="form-control" id="volumebar"
                                                    name="volumebar" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan lainnya :</label>
                                                <input type="text" class="form-control" id="keteranganbar"
                                                    name="keteranganbar">
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary text-white">Submit</button>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                    </form>
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
            $('select[name="edit_kat"]').on('change', function() {
                var idkat = $("#edit_kat option:selected").attr("idkat");
                $("#idkat").val(idkat);
                var namekat = $("#edit_kat option:selected").attr("namekat");
                $("#namekat").val(namekat);
            })

            // $('select[name="edit_merkbarang"]').on('change', function() {
            //     var idbar = $("#edit_merkbarang option:selected").attr("idbar");
            //     $("#idbar").val(idbar);
            //     var namebar = $("#edit_merkbarang option:selected").attr("namebar");
            //     $("#namebar").val(namebar);
            //     var volumebar = $("#edit_merkbarang option:selected").attr("volumebar");
            //     $("#volumebar").val(volumebar);
            //     var keteranganbar = $("#edit_merkbarang option:selected").attr("keteranganbar");
            //     $("#keteranganbar").val(keteranganbar);
            //     var select_kat = $("#edit_merkbarang option:selected").attr("idkatbar");
            //     $("#select_kats").val(select_kat);

            //     // $('select[name="select_kat"] option:selected').attr("selected",null);
            //     // // $("#select_kat option[value=select_tkat]").prop('selected',true);
            //     // html += '<option value="' +var select_kat +'" "'+option:selected +'"'+var select_kat+'</option>';

            //     // html +=
            // })

        })
        $(document).ready(function() {
            $('.select2').each(function() {
                $(this).select2({
                    theme: 'bootstrap-5',
                    dropdownParent: $(this).parent(),
                });
            });

        });
    </script>
@endsection
