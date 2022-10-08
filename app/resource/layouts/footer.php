</section>
</main>


    <script src="<?php echo asset_setup('vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo asset_setup('vendor/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script src="<?php echo asset_setup('vendor/popper/popper.js') ?>"></script>
    <script src="<?php echo asset_setup('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo asset_setup('vendor/select2/js/select2.full.min.js') ?>"></script>
    <script src="<?php echo asset_setup('vendor/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>
    <script src="<?php echo asset_setup('vendor/listjs/listjs.min.js') ?>"></script>
    <script src="<?php echo asset_setup('vendor/moment/moment.min.js') ?>"></script>
    <script src="<?php echo asset_setup('vendor/daterangepicker/daterangepicker.js') ?>"></script>
    <script src="<?php echo asset_setup('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
    <script src="<?php echo asset_setup('vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>
    <script src="<?php echo asset_setup('js/atmos.min.js') ?>"></script>
    <script src="<?php echo asset_setup('vendor/jquery.validate/jquery.validate.min.js') ?>"></script>
    <script src="<?php echo asset_setup('js/form-validate.js') ?>"></script>
    
    <!-- include own js -->
    <script src="<?php echo asset_setup('js/setup/main.js') ?>"></script>
    <script src="<?php echo asset_setup('js/setup/select-file.js') ?>"></script>
    <script src="<?php echo asset_setup('js/setup/notif-before-delete.js') ?>"></script>
    <script src="<?php echo asset_setup('js/setup/list-view.js') ?>"></script>
    <script src="<?php echo asset_setup('vendor/DataTables/datatables.min.js') ?>"></script>
    <script src="<?php echo asset_setup('vendor/summernote/summernote-bs4.min.js') ?>"></script>
    <script src="<?php echo asset_setup('js/datatable-data.js') ?>"></script>
    <script src="<?php echo asset_setup('js/summernote-data.js') ?>"></script>
    
    <script src="<?= asset('plugins/sweetalert2@11') ?>"></script>
    <script src="<?php echo asset_setup('js/datatble-select.js') ?>"></script>
    <!-- another php for js -->
    <?php include dir_project().'/app/resource/assets/js/setup/notification.php' ?>
    <?php include dir_project().'/app/resource/assets/js/setup/table.php' ?>
    <?php getContent("script") ?>

</body>

</html>