<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables_new/dataTables.bootstrap4.css">

<!-- Start Breadcrumbbar -->                    

<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Event Category List</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                   

                </ol>

            </div>

        </div>

        <div class="col-md-4 col-lg-4">

            <div class="widgetbar">

               <a href="<?= base_url('admin/eventCategory/add_edit'); ?>"><button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add Event Category</button></a>

            </div>                        

        </div>

        

    </div>          

</div>

<!-- End Breadcrumbbar -->

<!-- Start Contentbar -->    

<div class="contentbar">                

    <!-- Start row -->

    <div class="row">

        <!-- Start col -->

        <div class="col-lg-12">

            <div class="card m-b-30">

                <div class="card-header">

                    <h5 class="card-title">Event Category List</h5>

                </div>

                <div class="card-body">
                    <?php $this->load->view('admin/includes/_messages.php') ?>

                    <div class="table-responsive">

                        <table id="na_datatable" class="table table-bordered table-striped" width="100%">

                            <thead>

                            <tr>

                                <th>Id</th>

                                <th>Event Category</th>

                                <!-- <th>Event Date</th> -->

                                <th>Status</th>

                                <th width="100">Action</th>

                            </tr>

                            </thead>

                            <tbody>

                            

                            

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        <!-- End col -->

    </div>

    <!-- End row -->

</div>





<!-- DataTables -->

<script src="<?= base_url() ?>assets/plugins/datatables_new/jquery.dataTables.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables_new/dataTables.bootstrap4.js"></script>



<script>

  //---------------------------------------------------

  var table = $('#na_datatable').DataTable( {

    "processing": true,

    "serverSide": false,

    "ajax": "<?=base_url('admin/eventCategory/datatable_json')?>",

    "order": [[0,'desc']],

    "columnDefs": [

    { "targets": 0, "name": "eventCategoryID", 'searchable':true, 'orderable':true,'width':'50px'},

    { "targets": 1, "name": "eventCategoryName", 'searchable':true, 'orderable':true,'width':'100px'},

    // { "targets": 2, "name": "dateAdded", 'searchable':false, 'orderable':false,'width':'100px'},

    { "targets": 2, "name": "isActive", 'searchable':true, 'orderable':true,'width':'100px'},

    { "targets": 3, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px' }

    ]

  });

</script>



<script type="text/javascript">

  $("body").on("change",".tgl_checkbox",function(){

    $.post('<?=base_url("admin/eventCategory/change_status")?>',

    {

      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',

      id : $(this).data('id'),

      status : $(this).is(':checked') == true?1:0

    },

    function(data){

      new PNotify( {

                    title: 'Success notice', text: 'Status Changed Successfully', type: 'success'

                });

    });

  });

</script>

<script type="text/javascript">

  $("body").on("change",".delete",function(){

    $.post('<?=base_url("admin/eventCategory/delete")?>',

    {

      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',

      id : $(this).data('id'),

      status : $(this).is(':checked') == true?1:0

    },

    function(data){

      new PNotify( {

                    title: 'Success notice', text: 'Status Changed Successfully', type: 'success'

                });

    });

  });

</script>

