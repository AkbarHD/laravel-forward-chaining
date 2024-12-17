{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
{{-- datepicker --}}
<script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
{{-- sweetalert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.js"></script>
{{-- toast --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
{{-- datatables --}}
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
{{-- <script src="{{ asset('/btech/jquery.min.js') }}"></script> --}}
{{-- ckeditor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
{{-- fancybox --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
{{-- select to --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Summernote JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
<script type="text/javascript" src="{{ asset('/btech/btech.js') }}"></script>
<script type="text/javascript" src="{{ asset('/btech/notifikasi.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

<script>
    @if (Session::has('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ Session::get('success') }}",
            showConfirmButton: true,
            timer: 1500
        });
    @endif

    @if (Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ Session::get('error') }}",
            showConfirmButton: true,
            timer: 1500
        });
    @endif
</script>
