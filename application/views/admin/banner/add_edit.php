<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Add-Edit Banner</h4>
            <div class="breadcrumb-list">
                <!--<ol class="breadcrumb">-->
                <!--    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a></li>-->
                <!--    <li class="breadcrumb-item"><a href="#">Banner Add-Edit</a></li>-->
                <!--</ol>-->
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?=base_url();?>admin/banner"><button class="btn btn-primary-rgba"> <i class="feather icon-list mr-2"></i>Banner List</button></a>
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
                    <?php if ($this->router->fetch_method() == 'banner_view') {?>
                    banner View <?php } else {?> Banner Add Edit <?php }?></h5>
                </div> 
                <div class="card-body">
                   <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <?php echo form_open_multipart(base_url('admin/banner/add_edit'), 'class="form-horizontal"');  ?> 
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="bannerTitle"><span class="text-danger">*</span> Title</label>                        
                                <input type="text" autocomplete="off"  name="bannerTitle" class="form-control" id="bannerTitle" value="<?php echo isset($Fetch_data['bannerTitle']) ? set_value("bannerTitle", $Fetch_data['bannerTitle']) : set_value("bannerTitle"); ?>" placeholder="">
                                <input type="hidden" name="bannerID" id="bannerID" value="<?php echo isset($Fetch_data['bannerID']) ? set_value("bannerID", $Fetch_data['bannerID']) : set_value("bannerID"); ?>"> 
                            </div>
                        </div>
                         
                        
                        <div class="form-row">
                            
                            <div class="form-group col-md-6">
                                <label for="bannerImage"><span class="text-danger">*</span> Image</label>
                                <input type="file" name="bannerImage" id="bannerImage" class="form-control"  value="<?php echo !empty($Fetch_data['bannerImage']) ? $Fetch_data['bannerImage'] : ''; ?>">
                                <input type="hidden" name="old_image" id="old_image" value="<?php echo isset($Fetch_data['bannerImage']) ? $Fetch_data['bannerImage'] : ''; ?>" />
                                    <p class="text-danger" id="bannerImage_validate"></p>
                                    <?php if (isset($Fetch_data['bannerImage'])) {?>
                                        <img src="<?php echo base_url('uploads/banner/' . $Fetch_data['bannerImage']); ?>" width="100" height="100" class="img-responsive"/>
                                    <?php }?>
                                <span class="text-danger"><?php echo form_error('bannerImage'); ?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bannerImageMobile"><span class="text-danger">*</span> Mobile Image </label>
                                <input type="file" class="form-control" id="bannerImageMobile" name="bannerImageMobile" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['bannerImageMobile']) ? $Fetch_data['bannerImageMobile'] : ''; ?>" />
                                <input type="hidden" name="old_bannerImageMobile" id="old_bannerImageMobile" value="<?php echo isset($Fetch_data['bannerImageMobile']) ? $Fetch_data['bannerImageMobile'] : ''; ?>" />
                                <?php if (isset($Fetch_data['bannerImageMobile'])) {?>
                                    <img src="<?php echo base_url('uploads/banner/' . $Fetch_data['bannerImageMobile']); ?>" width="100" height="100" class="img-responsive"/>
                                <?php }?>
                                <span class="text-danger"><?php echo form_error('bannerImageMobile'); ?></span>
                            </div>
                        </div> 
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="OrderBy"><span class="text-danger"></span>Sort Order</label>                        
                                <input type="text" autocomplete="off"  name="OrderBy" class="form-control" id="OrderBy" value="<?php echo isset($Fetch_data['OrderBy']) ? set_value("OrderBy", $Fetch_data['OrderBy']) : set_value("OrderBy"); ?>" placeholder="">
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
<script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script> 
    CKEDITOR.replace('bannerDescription',{allowedContent:true,});
 </script>
