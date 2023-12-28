<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Blog Add-Edit</h4>
            <div class="breadcrumb-list">
                <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="< ?php echo base_url('admin/dashboard'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Blog Add-Edit</a></li>
                </ol> -->
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?=base_url();?>admin/blog"><button class="btn btn-primary-rgba"> <i class="feather icon-list mr-2"></i>Blog List</button></a>
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
                    <?php if ($this->router->fetch_method() == 'blog_view') {?>
                    Blog View <?php } else {?> Blog Add Edit <?php }?></h5>
                </div> 
                <div class="card-body">
                   <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <?php echo form_open_multipart(base_url('admin/blog/add_edit'), 'class="form-horizontal"');  ?> 
                        <div class="form-row">
                          
                          <div class="form-group col-md-6">
                                <label for="blogHeading"><span class="text-danger">*</span> Blog Heading</label>                        
                                <input type="text" autocomplete="off"  name="blogHeading" class="form-control" id="blogHeading" value="<?php echo isset($Fetch_data['blogHeading']) ? set_value("blogHeading", $Fetch_data['blogHeading']) : set_value("blogHeading"); ?>" placeholder="">
                                <input type="hidden" name="blogID" id="blogID" value="<?php echo isset($Fetch_data['blogID']) ? set_value("blogID", $Fetch_data['blogID']) : set_value("blogID"); ?>"> 
                            </div>
                         </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="blogAuthor"><span class="text-danger">*</span>Blog Author</label>                        
                                <input type="text" autocomplete="off"  name="blogAuthor" class="form-control" id="blogAuthor" value="<?php echo isset($Fetch_data['blogAuthor']) ? set_value("blogAuthor", $Fetch_data['blogAuthor']) : set_value("blogAuthor"); ?>" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="blogDate"><span class="text-danger"></span> Blog Date </label>
                                <input type="date" name="blogDate" class="form-control" id="blogDate" placeholder="" value="<?php echo isset($Fetch_data['blogDate']) ? set_value("blogDate", $Fetch_data['blogDate']) : set_value("blogDate"); ?>" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="blogThumbImage"><span class="text-danger">*</span> Blog Thumb Image </label>
                                <input type="file" class="form-control" id="blogThumbImage" name="blogThumbImage" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['blogThumbImage']) ? $Fetch_data['blogThumbImage'] : ''; ?>" />
                                <input type="hidden" name="old_blogThumbImage" id="old_blogThumbImage" value="<?php echo isset($Fetch_data['blogThumbImage']) ? $Fetch_data['blogThumbImage'] : ''; ?>" />
                                <?php if (isset($Fetch_data['blogThumbImage'])) {?>
                                    <img src="<?php echo base_url('uploads/blog/' . $Fetch_data['blogThumbImage']); ?>" width="100" height="100" class="img-responsive"/>
                                <?php }?>
                                <span class="text-danger"><?php echo form_error('blogThumbImage'); ?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="blogDetailImage"><span class="text-danger">*</span> Blog Detail Image </label>
                                <input type="file" class="form-control" id="blogDetailImage" name="blogDetailImage" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['blogDetailImage']) ? $Fetch_data['blogDetailImage'] : ''; ?>" />
                                <input type="hidden" name="old_blogDetailImage" id="old_blogDetailImage" value="<?php echo isset($Fetch_data['blogDetailImage']) ? $Fetch_data['blogDetailImage'] : ''; ?>" />
                                <?php if (isset($Fetch_data['blogDetailImage'])) {?>
                                    <img src="<?php echo base_url('uploads/blog/' . $Fetch_data['blogDetailImage']); ?>" width="100" height="100" class="img-responsive"/>
                                <?php }?>
                                <span class="text-danger"><?php echo form_error('blogDetailImage'); ?></span>
                            </div>
                        </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="blogShortDescription"><span class="text-danger">*</span> Blog Short Description </label>
                                <textarea type="text" class="form-control"  rows="4" name="blogShortDescription" id="blogShortDescription"><?php echo isset($Fetch_data['blogShortDescription']) ? set_value("blogShortDescription", $Fetch_data['blogShortDescription']) : set_value("blogShortDescription"); ?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="blogLongDescription"><span class="text-danger">*</span> Blog Long Description </label>
                                <textarea name="blogLongDescription" id="blogLongDescription"><?php echo isset($Fetch_data['blogLongDescription']) ? set_value("blogLongDescription", $Fetch_data['blogLongDescription']) : set_value("blogLongDescription"); ?></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="metaTitle">Meta Title</label>
                              <input type="text" autocomplete="off"  name="metaTitle" class="form-control" id="metaTitle" value="<?php echo isset($Fetch_data['metaTitle']) ? set_value("metaTitle", $Fetch_data['metaTitle']) : set_value("metaTitle"); ?>" placeholder="">

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="metaKeyword">Meta Keyword</label>
                              <input type="text" autocomplete="off"  name="metaKeyword" class="form-control" id="metaKeyword" value="<?php echo isset($Fetch_data['metaKeyword']) ? set_value("metaKeyword", $Fetch_data['metaKeyword']) : set_value("metaKeyword"); ?>" placeholder="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="metaDescription">Meta Description </label>
                                <textarea name="metaDescription"class="form-control" rows ="6" id="metaDescription"><?php echo isset($Fetch_data['metaDescription']) ? set_value("metaDescription", $Fetch_data['metaDescription']) : set_value("metaDescription"); ?></textarea>
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

<script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script> 
CKEDITOR.replace('blogLongDescription',{
        allowedContent : true,
        filebrowserUploadUrl: "<?php echo base_url() ?>upload.php",
        filebrowserUploadMethod : "form"
    });
CKEDITOR.replace('blogShortDescription',{allowedContent:true,});
 </script>