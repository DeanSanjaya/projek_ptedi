<!-- core:js -->
<script src="{{ asset('assets/dashboard/vendors/core/core.js') }}"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{ asset('assets/dashboard/vendors/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/jquery.flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
{{-- <script src="{{ asset('assets/dashboard/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script> --}}
<script src="{{ asset('assets/dashboard/vendors/select2/select2.min.js') }}"></script>
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('assets/dashboard/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/template.js') }}"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{ asset('assets/dashboard/js/dashboard-light.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/datepicker.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/data-table.js') }}"></script>
{{-- <script src="{{ asset('assets/dashboard/js/typeahead.js') }}"></script> --}}
<script src="{{ asset('assets/dashboard/js/select2.js') }}"></script>
<!-- End custom js for this page -->
<script>
    $(document).ready(function() {
        $('table.display').DataTable();
    });
</script>