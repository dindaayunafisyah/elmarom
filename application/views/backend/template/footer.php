 
        <footer class="footer footer-static footer-light">
          <p class="clearfix text-muted text-center px-2"><span>Copyright  &copy; 2018 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">PIXINVENT </a>, All rights reserved. </span></p>
        </footer>

      </div>
    </div>
    <?php $this->load->view('backend/modal_hapus') ?>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url('backend/app-assets/vendors/js/core/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?php echo base_url('backend/app-assets/vendors/js/core/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('backend/app-assets/vendors/js/core/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('backend/app-assets/vendors/js/perfect-scrollbar.jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('backend/app-assets/vendors/js/prism.min.js') ?>"></script>
    <script src="<?php echo base_url('backend/app-assets/vendors/js/jquery.matchHeight-min.js') ?>"></script>
    <script src="<?php echo base_url('backend/app-assets/vendors/js/screenfull.min.js') ?>"></script>
    <script src="<?php echo base_url('backend/app-assets/vendors/js/pace/pace.min.js') ?>"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo base_url('backend/app-assets/vendors/js/chartist.min.js') ?>"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CONVEX JS-->
    <script src="<?php echo base_url('backend/app-assets/js/app-sidebar.js') ?>"></script>
    <script src="<?php echo base_url('backend/app-assets/js/notification-sidebar.js') ?>"></script>
    <!-- END CONVEX JS-->
    <script src="<?php echo base_url('backend/ckeditor/ckeditor.js')?>"></script>
    <script src="<?php echo base_url('backend/sweetalert/sweetalert2.all.min.js')?>"></script>
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo base_url('backend/app-assets/js/dashboard-ecommerce.js') ?>"></script>
    <!-- END PAGE LEVEL JS-->
    <script src="<?php echo base_url('backend/datatables/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('backend/datatables/js/dataTables.responsive.min.js') ?>"></script>
  </body>
  <?php if ($this->uri->segment(3) == 'page_tambah' || $this->uri->segment(3) == 'page_edit' || $this->uri->segment(3) == 'proses_tambah') : ?>
  <script type="text/javascript">
    $(function() {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace( 'editor1' );
    });
  </script>
  <?php endif; ?>
  <script>
   $(document).ready(function() {
      var table = $('#example').DataTable( {
          responsive: true
      } );
    });

     $('.custom-file-input').on('change', function(){  //jquery ganti nama pada form control upload image
       let fileName = $(this).val().split('\\').pop();
       $(this).next('.custom-file-label').addClass("selected").html(fileName);
     });
  </script>
  <?php $this->load->view('backend/sweetalert/sweetalert'); ?>
</html>