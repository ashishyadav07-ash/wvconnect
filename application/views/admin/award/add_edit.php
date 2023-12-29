<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Award Add-Edit</h4>
            <div class="breadcrumb-list">
               
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?=base_url();?>admin/award"><button class="btn btn-primary-rgba"> <i class="feather icon-list mr-2"></i>Awards List</button></a>
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
                    Award View <?php } else {?> Award Add Edit <?php }?></h5>
                </div> 
                <div class="card-body">
                   <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <?php echo form_open_multipart(base_url('admin/award/add_edit'), 'class="form-horizontal"');  ?> 
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="eventCategory"><span class="text-danger">*</span>Event Category</label>
                                    <select name="eventCategory" class="form-control" id="eventCategory" placeholder="">
                                    <option value ="" selected disabled="disabled" >Select Event Category</option>
                                    <?php
                                    //echo'<pre>';print_r($datas);print_r($Fetch_data);die('sdf');
                                    foreach ($datas as $value => $display_text){
                                        ?>
                                    <option value="<?php echo $display_text['eventCategoryID']; ?>" <?php echo (isset($Fetch_data['eventCategory']) && $Fetch_data['eventCategory']!='' && ($display_text['eventCategoryID'] == $Fetch_data['eventCategory']))?"selected" : ''; ?>><?php echo $display_text['eventCategoryName']; ?></option>
                                        <?php }
                                    ?>     
                                    </select>
                            </div>
                           
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="awardHeading"><span class="text-danger">*</span> Award Heading</label>                        
                                <input type="text" autocomplete="off"  name="awardHeading" class="form-control" id="awardHeading" value="<?php echo isset($Fetch_data['awardHeading']) ? set_value("awardHeading", $Fetch_data['awardHeading']) : set_value("awardHeading"); ?>" placeholder="">
                                <input type="hidden" name="awardID" id="awardID" value="<?php echo isset($Fetch_data['awardID']) ? set_value("awardID", $Fetch_data['awardID']) : set_value("awardID"); ?>"> 
                            </div>
                        </div>
                        <!-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="blogAuthor"><span class="text-danger">*</span>Award Author</label>                        
                                <input type="text" autocomplete="off"  name="blogAuthor" class="form-control" id="blogAuthor" value="<?php echo isset($Fetch_data['blogAuthor']) ? set_value("blogAuthor", $Fetch_data['blogAuthor']) : set_value("blogAuthor"); ?>" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="blogDate"><span class="text-danger"></span> Award Date </label>
                                <input type="date" name="blogDate" class="form-control" id="blogDate" placeholder="" value="<?php echo isset($Fetch_data['blogDate']) ? set_value("blogDate", $Fetch_data['blogDate']) : set_value("blogDate"); ?>" >
                            </div>
                        </div> -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="awardImage"> Award  Image </label>
                                <input type="file" class="form-control" id="awardImage" name="awardImage" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['awardImage']) ? $Fetch_data['awardImage'] : ''; ?>" />
                                <input type="hidden" name="old_awardImage" id="old_awardImage" value="<?php echo isset($Fetch_data['awardImage']) ? $Fetch_data['awardImage'] : ''; ?>" />
                                <?php if (isset($Fetch_data['awardImage'])) {?>
                                    <img src="<?php echo base_url('uploads/award/' . $Fetch_data['awardImage']); ?>" width="100" height="100" class="img-responsive"/>
                                <?php }?>
                                <span class="text-danger"><?php echo form_error('awardImage'); ?></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="awardDescription"><span class="text-danger">*</span> Award Description </label>
                                <textarea type="text" class="form-control"  rows="4" name="awardDescription" id="awardDescription"><?php echo isset($Fetch_data['awardDescription']) ? set_value("awardDescription", $Fetch_data['awardDescription']) : set_value("awardDescription"); ?></textarea>
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
CKEDITOR.replace('awardDescription',{
        allowedContent : true,
        filebrowserUploadUrl: "<?php echo base_url() ?>upload.php",
        filebrowserUploadMethod : "form"
    });
 </script>