<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Activity Add-Edit</h4>
            <div class="breadcrumb-list">

            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?= base_url(); ?>admin/csractivity"><button class="btn btn-primary-rgba"> <i class="feather icon-list mr-2"></i>Activity List</button></a>
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
                    <h5 class="card-title mb-0">
                        <?php if ($this->router->fetch_method() == 'activity_view') { ?>
                            Activity View <?php } else { ?> Activity Add Edit <?php } ?></h5>
                </div>
                <div class="card-body">
                    <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <?php echo form_open_multipart(base_url('admin/csractivity/add_edit'), 'class="form-horizontal"');  ?>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="activityHeading"><span class="text-danger">*</span> Activity Heading</label>
                            <input type="text" autocomplete="off" name="activityHeading" class="form-control" id="activityHeading" value="<?php echo isset($Fetch_data['activityHeading']) ? set_value("activityHeading", $Fetch_data['activityHeading']) : set_value("activityHeading"); ?>" placeholder="">
                            <input type="hidden" name="activityID" id="activityID" value="<?php echo isset($Fetch_data['activityID']) ? set_value("activityID", $Fetch_data['activityID']) : set_value("activityID"); ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="activityDate"><span class="text-danger"></span> Activity Date </label>
                            <input type="date" name="activityDate" class="form-control" id="activityDate" placeholder="" value="<?php echo isset($Fetch_data['activityDate']) ? set_value("activityDate", $Fetch_data['activityDate']) : set_value("activityDate"); ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="activityThumbImage"><span class="text-danger">*</span> Activity Thumb Image </label>
                            <input type="file" class="form-control" id="activityThumbImage" name="activityThumbImage" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['activityThumbImage']) ? $Fetch_data['activityThumbImage'] : ''; ?>" />
                            <input type="hidden" name="old_activityThumbImage" id="old_activityThumbImage" value="<?php echo isset($Fetch_data['activityThumbImage']) ? $Fetch_data['activityThumbImage'] : ''; ?>" />
                            <?php if (isset($Fetch_data['activityThumbImage'])) { ?>
                                <img src="<?php echo base_url('uploads/csractivity/' . $Fetch_data['activityThumbImage']); ?>" width="100" height="100" class="img-responsive" />
                            <?php } ?>
                            <span class="text-danger"><?php echo form_error('activityThumbImage'); ?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="activityDetailImage"><span class="text-danger">*</span> Activity Detail Image </label>
                            <input type="file" class="form-control" id="activityDetailImage" name="activityDetailImage" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['activityDetailImage']) ? $Fetch_data['activityDetailImage'] : ''; ?>" />
                            <input type="hidden" name="old_activityDetailImage" id="old_activityDetailImage" value="<?php echo isset($Fetch_data['activityDetailImage']) ? $Fetch_data['activityDetailImage'] : ''; ?>" />
                            <?php if (isset($Fetch_data['activityDetailImage'])) { ?>
                                <img src="<?php echo base_url('uploads/csractivity/' . $Fetch_data['activityDetailImage']); ?>" width="100" height="100" class="img-responsive" />
                            <?php } ?>
                            <span class="text-danger"><?php echo form_error('activityDetailImage'); ?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="activityShortDescription"><span class="text-danger">*</span> Activity Short Description </label>
                            <textarea type="text" class="form-control" rows="4" name="activityShortDescription" id="activityShortDescription"><?php echo isset($Fetch_data['activityShortDescription']) ? set_value("activityShortDescription", $Fetch_data['activityShortDescription']) : set_value("activityShortDescription"); ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="activityLongDescription"><span class="text-danger">*</span> Activity Long Description </label>
                            <textarea name="activityLongDescription" id="activityLongDescription"><?php echo isset($Fetch_data['activityLongDescription']) ? set_value("activityLongDescription", $Fetch_data['activityLongDescription']) : set_value("activityLongDescription"); ?></textarea>
                        </div>
                    </div>


                    <!-- </div> -->
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

<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('activityLongDescription', {
        allowedContent: true,
        filebrowserUploadUrl: "<?php echo base_url() ?>upload.php",
        filebrowserUploadMethod: "form"
    });
    CKEDITOR.replace('activityShortDescription', {
        allowedContent: true,
    });
</script>