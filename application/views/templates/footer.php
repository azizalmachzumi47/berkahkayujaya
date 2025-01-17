<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <a href="https://pstechno.cyou/">
                    <img src="<?= base_url('assets/'); ?>logo/logopstechno_.png" alt="Logo PSTECHNO"
                        style="width: 150px; height: auto;" class="light-logo" />
                </a>
                PSTECHNO | ᮕᮥᮒᮁᮃ ᮞᮤᮜᮤᮝᮃᮍᮤ ᮒᮨᮎ᮪ᮂᮔᮧᮜᮧᮌ᮪ᮚ᮪ | <?= date('Y'); ?>.
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>
</div>
<!-- ============================================================== -->
<!-- end main wrapper -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('administrator/changeAccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('administrator/roleaccess/'); ?>" +
                    roleId;
            }
        });
    });
});
</script>
<!-- jquery 3.3.1 -->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="<?= base_url('assets/'); ?>vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="<?= base_url('assets/'); ?>libs/js/main-js.js"></script>
<!-- chart chartist js -->
<script src="<?= base_url('assets/'); ?>vendor/charts/chartist-bundle/chartist.min.js"></script>
<!-- sparkline js -->
<script src="<?= base_url('assets/'); ?>vendor/charts/sparkline/jquery.sparkline.js"></script>
<!-- morris js -->
<script src="<?= base_url('assets/'); ?>vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/charts/morris-bundle/morris.js"></script>
<!-- chart c3 js -->
<script src="<?= base_url('assets/'); ?>vendor/charts/c3charts/c3.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/charts/c3charts/d3-5.4.0.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/charts/c3charts/C3chartjs.js"></script>
<script src="<?= base_url('assets/'); ?>libs/js/dashboard-ecommerce.js"></script>

<script src="<?= base_url('assets/'); ?>vendor/multi-select/js/jquery.multi-select.js"></script>
<script src="<?= base_url('assets/'); ?>libs/js/main-js.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/js/data-table.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
</body>

</html>