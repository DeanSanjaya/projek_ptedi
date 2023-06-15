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
                        <h6 class="card-title">Data Barang</h6>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link " id="kategori-tab" data-bs-toggle="tab" href="#kategori" role="tab"
                                    aria-controls="kategori" aria-selected="true">Kategori</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="barang-tab" data-bs-toggle="tab" href="#barang" role="tab"
                                    aria-controls="barang" aria-selected="true">Barang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="stock-tab" data-bs-toggle="tab" href="#stock" role="tab"
                                    aria-controls="stock" aria-selected="true">Stock Gudang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="stockjual-tab" data-bs-toggle="tab" href="#stockjual" role="tab"
                                    aria-controls="stockjual" aria-selected="true">Stock Penjualan</a>
                            </li>

                        </ul>


                        <div class="tab-content border border-top-0 p-3" id="myTabContent">

                            {{-- SECTION KATEGORI --}}
                            <div class="tab-pane fade " id="kategori" role="tabpanel" aria-labelledby="kategori-tab">
                                <button type="button" title="TAMBAH KATEGORI" class="btn btn-primary mb-2"
                                    data-bs-target="#modalkat" data-bs-toggle="modal"><i data-feather="plus"></i>Kategori
                                </button>
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
                                                        <input type="hidden" name="created_by" id="created" value="{{Auth::user()->name}}">
                                                        <label for="name" class="form-label">Nama Kategori :</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ old('name') }}" required autofocus>
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
                                <div class="table-responsive">
                                    <table id="dataTablekat" class="display table">
                                        <thead>
                                            <tr>
                                                <th>Nomer</th>
                                                <th>Kategoris</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($no = 1)
                                            @foreach ($kategoris as $kategori)
                                                <tr>
                                                    <th>{{ $no }}</th>
                                                    <td>{{ $kategori->name }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-icon"
                                                            data-bs-target="#modalkategoriedit{{ $kategori->id }}"
                                                            data-bs-toggle="modal">
                                                            <i data-feather="edit-2"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-icon"
                                                            data-bs-target="#modalkategorihapus{{ $kategori->id }}"
                                                            data-bs-toggle="modal">
                                                            <i data-feather="trash-2"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @php($no++)

                                                {{-- TAMPILAN POP UP HAPUS --}}
                                                <div class="modal fade" id="modalkategorihapus{{ $kategori->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel-2"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel-2">Delete
                                                                    kategori</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="btn-Close">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class=""
                                                                    action="{{ route('kategori.destroy', $kategori->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <p>Delete <strong>{{ $kategori->name }}</strong> </p>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary text-white">Submit</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- TAMPILAN POP UP EDIT --}}
                                                <div class="modal fade" id="modalkategoriedit{{ $kategori->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel-2"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel-2">Edit
                                                                    kategori</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="btn-Close">
                                                                    {{-- <span aria-hidden="true">&times;</span> --}}
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class=""
                                                                    action="{{ route('kategori.edit') }}" method="post">
                                                                    @csrf

                                                                    {{-- @method('PUT') --}}
                                                                    {{-- @method('delete') --}}
                                                                    <p>Ubah <strong>{{ $kategori->name }}</strong> Menjadi
                                                                    </p>
                                                                    <input type="hidden" name="id" id="id"
                                                                        value="{{ $kategori->id }}">
                                                                    {{-- <input type="text" name="new" id="new" value="{{ $kategori->name }}"> --}}
                                                                    <input type="text" class="form-control"
                                                                        name="name" id="name" value="">

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary text-white">Submit</button>
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

                            {{-- SECTION MERK BARANG --}}
                            <div class="tab-pane fade" id="barang" role="tabpanel" aria-labelledby="barang-tab">
                                <button type="button" title="TAMBAH MERK" class="btn btn-primary mb-2"
                                    data-bs-target="#modalmerk" data-bs-toggle="modal"><i data-feather="plus"></i>Merk
                                    Barang
                                </button>
                                <div class="modal fade" id="modalmerk" tabindex="-1"
                                    aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel-2">Tambah Merk Barang
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
                                                                <option value="{{ $kategori->id }}">
                                                                    {{ $kategori->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="Merk Barang" class="form-label">Merk Barang :</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="volume" class="form-label">Volume :</label>
                                                        <input type="text" class="form-control" id="volume"
                                                            name="volume" required>
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
                                <div class="table-responsive">
                                    <table id="dataTablemerk" class="display table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kategori</th>
                                                <th>Merk</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($no = 1)
                                            @foreach ($barangs as $barang)
                                                <tr>
                                                    <th>{{ $no }}</th>
                                                    <td>{{ $barang->kategoriname }}</td>
                                                    <td>{{ $barang->barangname }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-icon"
                                                            data-bs-target="#modalbarangedit{{ $barang->id }}"
                                                            data-bs-toggle="modal">
                                                            <i data-feather="edit-2"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-icon"
                                                            data-bs-target="#modalbaranghapus{{ $barang->id }}"
                                                            data-bs-toggle="modal">
                                                            <i data-feather="trash-2"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @php($no++)

                                                {{-- TAMPILAN POP UP HAPUS --}}
                                                <div class="modal fade" id="modalbaranghapus{{ $barang->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel-2"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel-2">Delete
                                                                    Barang</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="btn-Close">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class=""
                                                                    action="{{ route('merkbarang.destroy', $barang->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <p>Delete <strong>{{ $barang->barangname }}</strong>
                                                                    </p>
                                                                    
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

                                                {{-- TAMPILAN POP UP EDIT --}}
                                                <div class="modal fade" id="modalbarangedit{{ $barang->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel-2"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel-2">Edit
                                                                    Barang</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="btn-Close">
                                                                    {{-- <span aria-hidden="true">&times;</span> --}}
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class=""
                                                                    action="{{ route('merkbarang.edit') }}"
                                                                    method="post">
                                                                    @csrf

                                                                    {{-- @method('PUT') --}}
                                                                    {{-- @method('delete') --}}
                                                                    <p>Ubah <strong>{{ $barang->barangname }}</strong>
                                                                        Menjadi
                                                                    </p>
                                                                    <input type="hidden" name="id" id="id"
                                                                        value="{{ $barang->id }}">
                                                                    {{-- <input type="text" name="new" id="new" value="{{ $kategori->name }}">             --}}
                                                                    <label for="" class="form-label mt-1">Nama
                                                                        :</label>
                                                                    <input type="text" class="form-control"
                                                                        name="name" id="name"
                                                                        value="{{ $barang->barangname }}">

                                                                    <label for="" class="form-label mt-1">Kategori
                                                                        :</label>
                                                                    <input type="text" disabled class="form-control"
                                                                        name="" id=""
                                                                        value="{{ $barang->kategoriname }}">
                                                                    <input type="hidden" class="form-control"
                                                                        name="kategoriold" id="kategoriold"
                                                                        value="{{ $barang->id_kat }}">
                                                                    <select for="kategori"
                                                                        onmousedown="if(this.options.length>3){this.size=3;}"
                                                                        onchange='this.size=0;' name="id_kat"
                                                                        id="id_kat" class="form-select">
                                                                        <option value="">PILIH KATEGORI BARU</option>
                                                                        @foreach ($kategoris as $kategori)
                                                                            <option value="{{ $kategori->id }}">
                                                                                {{ $kategori->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>

                                                                    <label for="" class="form-label mt-1">Volume
                                                                        :</label>
                                                                    <input type="text" class="form-control"
                                                                        name="volume" id="volume"
                                                                        value="{{ $barang->volume }}">

                                                                    {{-- <label for=""
                                                                        class="form-label mt-1">Keterangan
                                                                        :</label>
                                                                    <input type="text" class="form-control"
                                                                        name="keterangan" id="keterangan"
                                                                        value="{{ $barang->keterangan }}"> --}}


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary text-white">Submit</button>
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

                            {{-- SECTION STOK GUDANG --}}
                            <div class="tab-pane fade show active" id="stock" role="tabpanel"
                                aria-labelledby="stock-tab">
                                <div class="table-responsive">
                                    <table id="dataTablemerk" class="display table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                {{-- <th>Pemasok</th> --}}
                                                <th>Kategori</th>
                                                <th>Nama/Merk</th>
                                                <th>Jumlah</th>
                                                <th>Berat/isi/volume Satuan</th>
                                                <th>Total Berat/isi/volume</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($no = 1)
                                            @foreach ($gudangs as $gudang)
                                                <tr>
                                                    <th>{{ $no }}</th>
                                                    {{-- <td>{{ $gudang->pemasokname }}</td> --}}
                                                    <td>{{ $gudang->kategoriname }}</td>
                                                    <td>{{ $gudang->barangname }}</td>
                                                    <td>{{ $gudang->jumlah_besar }} {{ $gudang->jumlah_besar_deskripsi }}</td>
                                                    <td>{{ $gudang->jumlah_kecil }} {{ $gudang->jumlah_kecil_deskripsi }}</td>
                                                    <td>{{ $gudang->jumlah_besar * $gudang->jumlah_kecil }}
                                                        {{ $gudang->jumlah_kecil_deskripsi }}</td>
                                                </tr>
                                                @php($no++)
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- SECTION PENJUALAN --}}
                            <div class="tab-pane fade" id="stockjual" role="tabpanel" aria-labelledby="stockjual-tab">
                                <button onclick="window.location='{{ route('barang.create') }}'" type="button"
                                    class="btn btn-primary mb-2">
                                    <i data-feather="plus"></i>Jual Barang
                                </button>
                                <div class="table-responsive">
                                    <table id="dataTablemerk" class="display table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama/Merk</th>
                                                <th>Stock</th>
                                                <th>Berat</th>
                                                <th>Harga Jual</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($no = 1)
                                            @foreach ($stocks as $stock)
                                                <tr>
                                                    <th>{{ $no }}</th>
                                                    <td>{{ $stock->name }}</td>
                                                    <td>{{ $stock->stok }} {{ $stock->stok_deskripsi }}</td>
                                                    <td>{{ $stock->berat_volume }}</td>
                                                    <td> Rp. {{ number_format($stock->harga_jual, 0, ',', '.') }}</td>
                                                </tr>
                                                @php($no++)
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



    {{-- <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script> --}}
@endsection
