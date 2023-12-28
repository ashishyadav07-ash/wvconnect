<div class="breadcrumbbar">

    <div class="row align-items-center">

        <div class="col-md-8 col-lg-8">

            <h4 class="page-title">Add Registration</h4>

            <div class="breadcrumb-list">

                <!-- <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="< ?php echo base_url('admin/dashboard') ?>">Dashboard</a></li>

                    <li class="breadcrumb-item"><a href="#">Add New</a></li>

                </ol> -->

            </div>

        </div>

        <div class="col-md-4 col-lg-4">

            <div class="widgetbar">

                <a href="<?= base_url('admin/register'); ?>"><button class="btn btn-primary-rgba"> <i class="feather icon-list mr-2"></i>Register List</button></a>

            </div>

        </div>

    </div>

</div>

<div class="contentbar">

    <!-- Start row -->

    <div class="row">

        <!-- Start col -->

        <div class="col-lg-12">

            <div class="card m-b-30">

                <div class="card-header">

                    <h5 class="card-title mb-0">Add Registration</h5>

                </div>

                <div class="card-body">

                    <!-- For Messages -->

                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <?php echo form_open(base_url('admin/register/add'), 'class="form-horizontal" autocomplete="off" ');  ?>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span>Name</label>
                            <input type="text" name="regName" class="form-control" id="regName" value="<?php echo set_value("regName"); ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="regEmail"><span class="text-danger">*</span>E-mail</label>
                            <input type="text" name="regEmail" class="form-control" id="regEmail" placeholder="">
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="regMobile"><span class="text-danger">*</span>Mobile Number</label>
                            <input type="text" name="regMobile" class="form-control" id="regMobile" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="regPassword"><span class="text-danger">*</span>Password</label>
                            <input type="text" name="regPassword" class="form-control" id="regPassword" placeholder="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="regArea"><span class="text-danger">*</span>Area</label>
                            <input type="text" name="regArea" class="form-control" id="regArea" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="regCity"><span class="text-danger">*</span>City</label>
                            <input type="text" name="regCity" class="form-control" id="regCity" placeholder="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="regPincode"><span class="text-danger">*</span>Pincode</label>
                            <input type="text" name="regPincode" class="form-control" id="regPincode" placeholder="">
                        </div>

                    </div>
                    <input type="submit" name="submit" value="Add" class="btn btn-primary-rgba font-16">
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div> <!-- End row -->
</div>
<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('pageDescription', {
        allowedContent: true,
        filebrowserUploadUrl: "<?php echo base_url() ?>upload.php",
        filebrowserUploadMethod: "form"
    });
    // CKEDITOR.replace('mobilityAssistanceShortDescription',{allowedContent:true,});
</script>