<!-- Footer -->
<footer class="sticky-footer bg-white mt-12">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; SevenKos 2022</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Peringatan!!</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "keluar" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger" href="<?php echo base_url() ?>Login/logout">Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('asset_login/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('asset_login/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('asset_login/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('asset_login/'); ?>js/sb-admin-2.min.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>


<script src="<?php echo base_url('asset_login/'); ?>js/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url('asset_login/'); ?>js/sweetalert.js"></script>

<!-- Custom Js -->
<script src="<?php echo base_url() ?>assets/js/admin.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/js/pages/tables/jquery-datatable.js"></script> -->
<!-- Demo Js -->
<script src="<?php echo base_url() ?>assets/js/demo.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" crossorigin="anonymous"></script>

<script>
    $('input[type=number].maks_huni_num').on('change', function() {
        num = $('input[type=number].maks_huni_num').val();
        val = 'Kamar maksimal dihuni oleh ' + num + ' orang';
        $('input[type=checkbox].maks_huni').val(val);
    });

    $('input[type=checkbox].bawa-anak').on('change', function() {
        $('input[type=checkbox].bawa-anak').not(this).prop('checked', false);
    });
    $('input[type=checkbox].pasutri').on('change', function() {
        $('input[type=checkbox].pasutri').not(this).prop('checked', false);
    });
</script>

<script>
    $('input[type=checkbox].listrik').on('change', function() {
        $('input[type=checkbox].listrik').not(this).prop('checked', false);
    });

    // Image Preview
    function imagePreview(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function(event) {
                $('#preview').attr('src', event.target.result);
            };
            fileReader.readAsDataURL(fileInput.files[0]);
        }
    }

    $("#foto").change(function() {
        imagePreview(this);
    });
</script>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    // $(document).ready(function() {
    //     $('#dtable').DataTable();
    // });
    $(function() {
        $('#dtable').DataTable({
            "lengthMenu": [10, 25, 50, 100, 150, 200],
            // dom: 'Bfrtip',
            // "buttons": [
            //     'copy', 'csv', 'excel', 'pdf', 'print'
            // ],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "Cari Data"
            }
        });
    });
</script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    $('.select-kota').select2({
        theme: 'bootstrap4',
    });
    $(document).on("select2:open", () => {
        document.querySelector(".select2-container--open .select2-search__field").focus()
    })
</script>

<?= ($this->session->flashdata('notif')) ? $this->session->flashdata('notif') : ''; ?>

</body>

</html>