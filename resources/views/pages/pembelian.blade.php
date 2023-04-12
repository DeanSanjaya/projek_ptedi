@extends('templates.default')

@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
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
                                        <option value="#">Texas</option>
                                        <option value="#">New York</option>
                                        <option value="#">Florida</option>
                                        <option value="#">Kansas</option>
                                        <option value="#">Hawaii</option>
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
        {{-- <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Input Mask</h6>
                        <p class="text-muted mb-3">Read the <a href="https://github.com/RobinHerbots/Inputmask"
                                target="_blank"> Official Inputmask Documentation </a>for a full list of instructions and
                            other options.</p>
                        <form class="forms-sample">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Date:</label>
                                    <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'"
                                        data-inputmask-inputformat="dd/mm/yyyy" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Time (12 hour):</label>
                                    <input class="form-control" data-inputmask="'alias': 'datetime'"
                                        data-inputmask-inputformat="hh:mm tt" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Date time:</label>
                                    <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'"
                                        data-inputmask-inputformat="dd/mm/yyyy HH:MM:ss" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Date with custom placeholder:</label>
                                    <input class="form-control" data-inputmask="'alias': 'datetime'"
                                        data-inputmask-placeholder="*" data-inputmask-inputformat="dd/mm/yyyy" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Phone:</label>
                                    <input class="form-control mb-4 mb-md-0" data-inputmask-alias="(+99) 9999-9999" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Credit card:</label>
                                    <input class="form-control" data-inputmask-alias="9999-9999-9999-9999" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Currency:</label>
                                    <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'currency'" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Serial key:</label>
                                    <input class="form-control" data-inputmask-alias="****-****-****-****" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Email:</label>
                                    <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'email'" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Ip address:</label>
                                    <input class="form-control" data-inputmask="'alias': 'ip'" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Select 2</h4>
                        <p class="text-muted mb-3">Read the <a href="https://select2.org/" target="_blank"> Official
                                Select2 Documentation </a>for a full list of instructions and other options.</p>
                        <div class="mb-3">
                            <label class="form-label">Single select box using select 2</label>
                            <select class="js-example-basic-single form-select" data-width="100%">
                                <option value="TX">Texas</option>
                                <option value="NY">New York</option>
                                <option value="FL">Florida</option>
                                <option value="KN">Kansas</option>
                                <option value="HW">Hawaii</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Multiple select using select 2</label>
                            <select class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                <option value="TX">Texas</option>
                                <option value="WY">Wyoming</option>
                                <option value="NY">New York</option>
                                <option value="FL">Florida</option>
                                <option value="KN">Kansas</option>
                                <option value="HW">Hawaii</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Typeahead</h4>
                        <p class="text-muted mb-3">Read the <a href="https://github.com/twitter/typeahead.js"
                                target="_blank"> Official Typeahead.js Documentation </a>for a full list of instructions
                            and other options.</p>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Basic</label>
                                <div id="the-basics">
                                    <input class="typeahead" autocomplete="off" type="text"
                                        placeholder="States of USA">
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">Bloodhound</label>
                                <div id="bloodhound">
                                    <input class="typeahead" type="text" placeholder="States of USA">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Tags input</h6>
                        <p class="text-muted mb-3">Read the <a href="https://www.npmjs.com/package/jquery-tags-input"
                                target="_blank"> Official jQuery-tags-input Documentation </a>for a full list of
                            instructions and other options.</p>
                        <p class="mb-2">Type something to add a new tag</p>
                        <div>
                            <input name="tags" id="tags" value="New York,Texas,Florida,New Mexico" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Bootstrap color picker</h6>
                        <p class="text-muted mb-3">Read the <a href="https://itsjavi.com/bootstrap-colorpicker/"
                                target="_blank"> Official Bootstrap-colorpicker Documentation </a>for a full list of
                            instructions and other options.</p>
                        <div id="cp1" class="input-group mb-2" title="Using input value">
                            <input type="text" class="form-control" value="#DD0F20FF" />
                            <span class="input-group-text colorpicker-input-addon"><i></i></span>
                        </div>
                        <div id="cp2" class="input-group mb-2" data-color="rgb(241, 138, 49)"
                            title="Using data-color attribute in the colorpicker element">
                            <input type="text" class="form-control" />
                            <span class="input-group-text colorpicker-input-addon"><i></i></span>
                        </div>
                        <div id="cp3" class="input-group" title="Using data-color attribute in the input">
                            <input type="text" class="form-control" data-color="hsl(56, 93%, 63%)" />
                            <span class="input-group-text colorpicker-input-addon"><i></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Date picker</h6>
                        <p class="text-muted mb-3">Read the <a
                                href="https://bootstrap-datepicker.readthedocs.io/en/latest/" target="_blank"> Official
                                Bootstrap-datepicker Documentation </a>for a full list of instructions and other options.
                        </p>
                        <div class="input-group date datepicker" id="datePickerExample">
                            <input type="text" class="form-control">
                            <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Time picker</h6>
                        <p class="text-muted mb-3">Read the <a href="https://tempusdominus.github.io/bootstrap-4/"
                                target="_blank"> Official Tempus Dominus Documentation </a>for a full list of instructions
                            and other options.</p>
                        <div class="input-group date timepicker" id="datetimepickerExample" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input"
                                data-target="#datetimepickerExample" />
                            <span class="input-group-text" data-target="#datetimepickerExample"
                                data-toggle="datetimepicker"><i data-feather="clock"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 stretch-card grid-margin grid-margin-md-0">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Dropzone</h6>
                        <p class="text-muted mb-3">Read the <a href="https://www.dropzonejs.com/" target="_blank">
                                Official Dropzone.js Documentation </a>for a full list of instructions and other options.
                        </p>
                        <form action="/file-upload" class="dropzone" id="exampleDropzone"></form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Dropify</h6>
                        <p class="text-muted mb-3">Read the <a href="https://github.com/JeremyFagis/dropify"
                                target="_blank"> Official Dropify Documentation </a>for a full list of instructions and
                            other options.</p>
                        <input type="file" id="myDropify" />
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
