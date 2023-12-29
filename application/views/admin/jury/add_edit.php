<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Jury Add-Edit</h4>
            <div class="breadcrumb-list">
               
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?=base_url();?>admin/jury"><button class="btn btn-primary-rgba"> <i class="feather icon-list mr-2"></i>Jury List</button></a>
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
                    Nominee View <?php } else {?> Nominee Add Edit <?php }?></h5>
                </div> 
                <div class="card-body">
                   <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <?php echo form_open_multipart(base_url('admin/jury/add_edit'), 'class="form-horizontal"');  ?> 
                    <input type="hidden" name="nomineeID" id="nomineeID" value="<?php echo isset($Fetch_data['nomineeID']) ? set_value("nomineeID", $Fetch_data['nomineeID']) : set_value("nomineeID"); ?>"> 
                    <input type="hidden" name="jury_assignID" id="jury_assignID" value="<?php echo isset($Fetch_data['jury_assignID']) ? set_value("jury_assignID", $Fetch_data['jury_assignID']) : set_value("jury_assignID"); ?>"> 
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="awardCategory"><span class="text-danger">*</span>Award Category</label>
                                    <select name="awardCategory" readonly disabled class="form-control" id="awardCategory" placeholder="">
                                    <option value ="">Select Award Category</option>
                                    <?php
                                    //echo'<pre>';print_r($datas);print_r($Fetch_data);die('sdf');
                                    foreach ($datas as $value => $display_text){
                                        ?>
                                    <option value="<?php echo $display_text['awardID']; ?>" <?php echo (isset($Fetch_data['awardCategory']) && $Fetch_data['awardCategory']!='' && ($display_text['awardID'] == $Fetch_data['awardCategory']))?"selected" : ''; ?>><?php echo $display_text['awardHeading']; ?></option>
                                        <?php }
                                    ?>     
                                    </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="remark"><span class="text-danger">*</span>Remark</label>                        
                                <input type="text" autocomplete="off"  name="remark" class="form-control" id="remark" value="<?php echo isset($Fetch_data['remark']) ? set_value("remark", $Fetch_data['remark']) : set_value("remark"); ?>" placeholder="">
                            </div>
                            <!-- <div class="form-group col-md-6">
                                <label for="nomineeName"><span class="text-danger">*</span> Nominee Name</label>                        
                                <input type="text" autocomplete="off"  name="nomineeName" class="form-control" id="nomineeName" value="<?php echo isset($Fetch_data['nomineeName']) ? set_value("nomineeName", $Fetch_data['nomineeName']) : set_value("nomineeName"); ?>" placeholder="">
                               
                            </div> -->
                           
                        </div>
                      
                        <!-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nomineeEmail"><span class="text-danger">*</span> Nominee Email</label>                        
                                <input type="text" autocomplete="off"  name="nomineeEmail" class="form-control" id="nomineeEmail" value="<?php echo isset($Fetch_data['nomineeEmail']) ? set_value("nomineeEmail", $Fetch_data['nomineeEmail']) : set_value("nomineeEmail"); ?>" placeholder="">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="nomineeMobile"><span class="text-danger">*</span> Nominee Mobile</label>                        
                                <input type="text" autocomplete="off"  name="nomineeMobile" class="form-control" id="nomineeMobile" value="<?php echo isset($Fetch_data['nomineeMobile']) ? set_value("nomineeMobile", $Fetch_data['nomineeMobile']) : set_value("nomineeMobile"); ?>" placeholder="">
                            </div>
                        </div> -->

                        <?php 
                        if(!empty($Fetch_data['file'])){
                            $file_info = pathinfo($Fetch_data['file']);
                            $file_extension = $file_info['extension']; 
                            // echo"<pre>";print_r($file_extension);
                        ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nomineeMobile"><span class="text-danger">*</span> Nominee Attachment</label><br>  
                                <input type="hidden" autocomplete="off"  name="file" class="form-control" id="" value="<?php echo $Fetch_data['file'] ?>" placeholder="">          
                               <?php if($file_extension == 'mp4'){ ?>
                                <video width="600" height="400" controls>
                                <source  src="<?php echo base_url('uploads/file/'.$Fetch_data['file']); ?>" type="video/mp4">
                                </video>
                                <?php  }else if($file_extension == 'jpeg' || $file_extension == 'jpg' ||$file_extension == 'png'){ ?>
                                        <img  width="600" height="400" src="<?php echo base_url('uploads/file/'.$Fetch_data['file']); ?>" alt="Image">
                                <?php  }else if($file_extension == 'pdf'){ ?>

                                    <iframe  src="<?php echo base_url('uploads/file/'.$Fetch_data['file']);?>" width="600" height="400"></iframe>
                                <?php  }else if($file_extension == 'mp3'){ ?>
                                    
                                    <audio controls>
                                        <source  src="<?php echo base_url('uploads/file/'.$Fetch_data['file']);?>" type="audio/mpeg">
                                    </audio>
                                <?php  } ?>
                            </div>
                        
                           
                         
                        </div>

                       <?php }?>

                  
                   
                     
                          
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
    $(document).ready(function() {
        $('.js-juryID-multiple').select2();
    });
</script>




<script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script> 
CKEDITOR.replace('awardDescription',{
        allowedContent : true,
        filebrowserUploadUrl: "<?php echo base_url() ?>upload.php",
        filebrowserUploadMethod : "form"
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