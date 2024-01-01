<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Export Records</h4>
            <div class="breadcrumb-list">

            </div>
        </div>
        <!-- <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="< ?=base_url();?>admin/nominee"><button class="btn btn-primary-rgba"> <i class="feather icon-list mr-2"></i>Nominees List</button></a>
            </div>                        
        </div> -->
    </div>
</div>
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <?php if ($this->router->fetch_method() == 'blog_view') { ?>
                            Export
                        <?php } else { ?> Export Records
                        <?php } ?>
                    </h5>
                </div>
                <div class="card-body">
                    <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <?php echo form_open_multipart(base_url('admin/export/exportRecords'), 'class="form-horizontal"'); ?>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="juryID"><span class="text-danger">*</span>Jury Name</label>
                            <select name="juryID" class="form-control" id="juryID" placeholder="">
                                <option value="">Select Jury</option>
                                <?php
                                //echo'<pre>';print_r($datas);print_r($Fetch_data);die('sdf');
                                foreach ($jury as $value => $display_text) {
                                    ?>
                                    <option value="<?php echo $display_text['admin_id']; ?>">
                                        <?php echo $display_text['username']; ?>
                                    </option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary-rgba font-16">
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div> <!-- End row -->
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Include Select2 CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('.js-juryID-multiple').select2();
    });
</script>




<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('awardDescription', {
        allowedContent: true,
        filebrowserUploadUrl: "<?php echo base_url() ?>upload.php",
        filebrowserUploadMethod: "form"
    });
</script>

<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: mediumblue;
        border: 1px solid #010101;
        border-radius: 4px;
        cursor: default;
        float: left;
        margin-right: 5px;
        margin-top: 5px;
        padding: 0 5px;
    }
</style>