<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables_new/dataTables.bootstrap4.css">

<!-- Start Breadcrumbbar -->

<div class="breadcrumbbar">

    <div class="row align-items-center">

        <div class="col-md-8 col-lg-8">

            <h4 class="page-title">Register List</h4>
            <?php echo form_open(base_url('admin/register/export_Contact'), 'id="frmvalidate"'); ?>

            <div class="col-md-12">

                <div class="row">

                    <div class="col-md-5">

                        <label for="fromDate" class="control-label "><span class="text-danger">*</span>From Date</label>

                        <input type="text" name="fromDate" autocomplete="off" value="<?php echo $this->input->post('fromDate'); ?>" class="form-control" id="fromDate" />
                        <span class="text-danger"><?php echo form_error('fromDate'); ?></span>

                    </div>

                    <div class="col-md-5">

                        <label for="toDate" class="control-label "><span class="text-danger">*</span>To Date</label>

                        <input type="text" name="toDate" autocomplete="off" value="<?php echo $this->input->post('toDate'); ?>" class="form-control" id="toDate" />

                        <span class="text-danger"><?php echo form_error('toDate'); ?></span>

                    </div>
                    <div class="col-md-2">

                        <button type="submit" class="mt-2 btn-md btn btn-primary" style="margin-top:29px !important ;">Export To Excel</button>

                    </div>
                </div>
            </div>

            <?php echo form_close(); ?>





        </div>

        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?= base_url('admin/register/add'); ?>"><button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add Register User </button></a>
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


                </div>

                <div class="card-body">
                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <div class="table-responsive">
                        <table id="na_datatable" class="table table-bordered table-striped" width="100%">

                            <thead>

                                <tr>

                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <!-- <th>Area</th>
                                    <th>City</th>
                                    <th>Pincode</th> -->
                                    <th>Date</th>
                                    <!-- <th>Action</th> -->


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
<link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables_new/jquery.dataTables.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables_new/dataTables.bootstrap4.js"></script>



<script>
    //---------------------------------------------------

    $(document).ready(function() {

        $('#na_datatable').DataTable({


            "processing": true,

            "serverSide": false,

            "ajax": "<?= base_url('admin/register/register_json') ?>",

            "order": [
                [0, 'desc']
            ],

            "columnDefs": [

                {
                    "targets": 0,
                    "name": "regID",
                    'searchable': true,
                    'orderable': true,
                    'width': '50px'
                },

                {
                    "targets": 1,
                    "name": "regName",
                    'searchable': true,
                    'orderable': true,
                    'width': '150px'
                },
                {
                    "targets": 2,
                    "name": "companyName",
                    'searchable': true,
                    'orderable': true,
                    'width': '150px'
                },

                {
                    "targets": 3,
                    "name": "regEmail",
                    'searchable': true,
                    'orderable': true,
                    'width': '100px'
                },

                {
                    "targets": 4,
                    "name": "regMobile",
                    'searchable': true,
                    'orderable': true,
                    'width': '100px'
                },

                // {
                //     "targets": 4,
                //     "name": "regArea",
                //     'searchable': true,
                //     'orderable': true,
                //     'width': '100px'
                // },

                // {
                //     "targets": 5,
                //     "name": "regCity",
                //     'searchable': true,
                //     'orderable': true,
                //     'width': '100px'
                // },

                // {
                //     "targets": 6,
                //     "name": "regPincode",
                //     'searchable': true,
                //     'orderable': true,
                //     'width': '100px'
                // },

                {
                    "targets": 5,
                    "name": "dateAdded",
                    'searchable': true,
                    'orderable': true,
                    'width': '100px'
                },

                // {
                //     "targets": 8,
                //     "name": "Action",
                //     'searchable': false,
                //     'orderable': false,
                //     'width': '100px'
                // }


            ]

        });
    });
</script>