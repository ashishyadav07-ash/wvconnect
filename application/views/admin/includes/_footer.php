<?php if(!isset($footer)): ?>

    <div class="footerbar">
            <footer class="footer">
                <p class="mb-0"><?= $this->general_settings['copyright']; ?></p>
            </footer>
        </div>
        <!-- End Footerbar -->
    </div>

  <?php endif; ?>  


  
</div>
<!-- ./wrapper -->

  <!-- Start js -->      
  <script src="<?= base_url() ?>assets/plugins/select2/select2.min.js"></script> 
  <script src="<?= base_url() ?>assets/js/popper.min.js"></script>
  <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/js/modernizr.min.js"></script>
  <script src="<?= base_url() ?>assets/js/detect.js"></script>
  <script src="<?= base_url() ?>assets/js/jquery.slimscroll.js"></script>
  <script src="<?= base_url() ?>assets/js/vertical-menu.js"></script>
  <script src="<?= base_url() ?>assets/js/common.inc.js"></script>
  <!-- Switchery js -->
    <script src="<?= base_url() ?>assets/plugins/switchery/switchery.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/pnotify/js/pnotify.custom.min.js"></script>
   <!-- Datatable js -->
    <!--<script src="< ?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="< ?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="< ?= base_url() ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="< ?= base_url() ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="< ?= base_url() ?>assets/plugins/datatables/jszip.min.js"></script>
    <script src="< ?= base_url() ?>assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="< ?= base_url() ?>assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="< ?= base_url() ?>assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="< ?= base_url() ?>assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="< ?= base_url() ?>assets/plugins/datatables/buttons.colVis.min.js"></script>
    <script src="< ?= base_url() ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="< ?= base_url() ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script> -->
    <!-- <script src="< ?= base_url() ?>assets/js/custom/custom-table-datatable.js"></script> -->
  <!-- Core js -->
  <script src="<?= base_url() ?>assets/js/core.js"></script>
  <!-- End js -->

<script>

var csfr_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';

var csfr_token_value = '<?php echo $this->security->get_csrf_hash(); ?>';

$(function(){
//-------------------------------------------------------------------
// Country State & City Change

$(document).on('change','.country',function()
{

  if(this.value == '')
  {
    $('.state').html('<option value="">Select Option</option>');

    $('.city').html('<option value="">Select Option</option>');

    return false;
  }


  var data =  {

    country : this.value,

  }

  data[csfr_token_name] = csfr_token_value;

  $.ajax({

    type: "POST",

    url: "<?= base_url('admin/auth/get_country_states') ?>",

    data: data,

    dataType: "json",

    success: function(obj) {
      $('.state').html(obj.msg);
   },

  });
});

$(document).on('change','.state',function()
{

  var data =  {

    state : this.value,

  }

  data[csfr_token_name] = csfr_token_value;

  $.ajax({

    type: "POST",

    url: "<?= base_url('admin/auth/get_state_cities') ?>",

    data: data,

    dataType: "json",

    success: function(obj) {

      $('.city').html(obj.msg);

   },

  });
    });

  
   



  });
</script>

</body>
</html>
