<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Nominee Add-Edit</h4>
            <div class="breadcrumb-list">
               
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?=base_url();?>admin/nominee"><button class="btn btn-primary-rgba"> <i class="feather icon-list mr-2"></i>Nominees List</button></a>
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
                    <!-- <h5 class="card-title mb-0">
                    < ?php if ($this->router->fetch_method() == 'blog_view') {?>
                    Nominee View < ?php } else {?> Nominee Add Edit < ?php }?></h5> -->
                </div> 
                <div class="card-body">
                   <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <?php echo form_open_multipart(base_url('admin/nominee/add_edit'), 'class="form-horizontal"');  ?> 
                    <h5 class="card-title mb-0" style="margin-bottom: 15px !important; font-weight:bold;color:black">Organisation Details </h5>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="organisation_name"><span class="text-danger">*</span>Organisation Name</label>
                                    <input type="text" autocomplete="off"  name="organisation_name" class="form-control" id="organisation_name" value="<?php echo isset($Fetch_data['organisation_name']) ? set_value("organisation_name", $Fetch_data['organisation_name']) : set_value("organisation_name"); ?>" placeholder="">
                                    
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name_spoc"><span class="text-danger">*</span>Name SPOC</label>                        
                                <input type="text" autocomplete="off"  name="name_spoc" class="form-control" id="name_spoc" value="<?php echo isset($Fetch_data['name_spoc']) ? set_value("name_spoc", $Fetch_data['name_spoc']) : set_value("name_spoc"); ?>" placeholder="">
                                <input type="hidden" name="nomineeID" id="nomineeID" value="<?php echo isset($Fetch_data['nomineeID']) ? set_value("nomineeID", $Fetch_data['nomineeID']) : set_value("nomineeID"); ?>"> 
                            </div>
                           
                    </div>

                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="number_spoc"><span class="text-danger">*</span>Number SPOC</label>
                                    <input type="text" autocomplete="off"  name="number_spoc" class="form-control" id="number_spoc" value="<?php echo isset($Fetch_data['number_spoc']) ? set_value("number_spoc", $Fetch_data['number_spoc']) : set_value("number_spoc"); ?>" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email_spoc"><span class="text-danger">*</span>Email SPOC</label>                        
                                <input type="text" autocomplete="off"  name="email_spoc" class="form-control" id="email_spoc" value="<?php echo isset($Fetch_data['email_spoc']) ? set_value("email_spoc", $Fetch_data['email_spoc']) : set_value("email_spoc"); ?>" placeholder="">
                                <input type="hidden" name="nomineeID" id="nomineeID" value="<?php echo isset($Fetch_data['nomineeID']) ? set_value("nomineeID", $Fetch_data['nomineeID']) : set_value("nomineeID"); ?>"> 
                            </div>
                           
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="company_address"><span class="text-danger">*</span>Company Address</label>
                                    <input type="text" autocomplete="off"  name="company_address" class="form-control" id="company_address" value="<?php echo isset($Fetch_data['company_address']) ? set_value("company_address", $Fetch_data['company_address']) : set_value("company_address"); ?>" placeholder="">
                            </div>       
                            <div class="form-group col-md-6">
                                    <label for="linkedin_profile">LinkedIn Profile</label>
                                    <input type="text" autocomplete="off"  name="linkedin_profile" class="form-control" id="linkedin_profile" value="<?php echo isset($Fetch_data['linkedin_profile']) ? set_value("linkedin_profile", $Fetch_data['linkedin_profile']) : set_value("linkedin_profile"); ?>" placeholder="">
                            </div>                           
                    </div>

                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="facebook_profile">Facebook Profile</label>
                                    <input type="text" autocomplete="off"  name="facebook_profile" class="form-control" id="facebook_profile" value="<?php echo isset($Fetch_data['facebook_profile']) ? set_value("facebook_profile", $Fetch_data['facebook_profile']) : set_value("facebook_profile"); ?>" placeholder="">
                            </div>       
                            <div class="form-group col-md-6">
                                    <label for="instagram_profile">Instagram Profile</label>
                                    <input type="text" autocomplete="off"  name="instagram_profile" class="form-control" id="instagram_profile" value="<?php echo isset($Fetch_data['instagram_profile']) ? set_value("instagram_profile", $Fetch_data['instagram_profile']) : set_value("instagram_profile"); ?>" placeholder="">     
                            </div>                           
                    </div>

                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="youtube_channel">Youtube</label>
                                    <input type="text" autocomplete="off"  name="youtube_channel" class="form-control" id="youtube_channel" value="<?php echo isset($Fetch_data['youtube_channel']) ? set_value("youtube_channel", $Fetch_data['youtube_channel']) : set_value("youtube_channel"); ?>" placeholder="">   
                            </div>       
                            <div class="form-group col-md-6">
                                    <label for="website_link">Website Link</label>
                                    <input type="text" autocomplete="off"  name="website_link" class="form-control" id="website_link" value="<?php echo isset($Fetch_data['website_link']) ? set_value("website_link", $Fetch_data['website_link']) : set_value("website_link"); ?>" placeholder="">
                            </div>                           
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="outside_india">Presence outside the Indian territories</label>
                                    <input type="text" autocomplete="off"  name="outside_india" class="form-control" id="outside_india" value="<?php echo isset($Fetch_data['outside_india']) ? set_value("outside_india", $Fetch_data['outside_india']) : set_value("outside_india"); ?>" placeholder="">   
                            </div>                            
                    </div>
                    <h5 class="card-title mb-0" style="margin-bottom: 15px !important; font-weight:bold;color:black">International SPOC Details</h5>

                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="international_spoc_name"><span class="text-danger">*</span>Name</label>
                                    <input type="text" autocomplete="off"  name="international_spoc_name" class="form-control" id="international_spoc_name" value="<?php echo isset($Fetch_data['international_spoc_name']) ? set_value("international_spoc_name", $Fetch_data['international_spoc_name']) : set_value("international_spoc_name"); ?>" placeholder="">   
                            </div>       
                            <div class="form-group col-md-6">
                                    <label for="international_spoc_number"><span class="text-danger">*</span>Number</label>
                                    <input type="text" autocomplete="off"  name="international_spoc_number" class="form-control" id="international_spoc_number" value="<?php echo isset($Fetch_data['international_spoc_number']) ? set_value("international_spoc_number", $Fetch_data['international_spoc_number']) : set_value("international_spoc_number"); ?>" placeholder="">
                            </div>                           
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="international_spoc_email"><span class="text-danger">*</span>Email</label>
                                    <input type="text" autocomplete="off"  name="international_spoc_email" class="form-control" id="international_spoc_email" value="<?php echo isset($Fetch_data['international_spoc_email']) ? set_value("international_spoc_email", $Fetch_data['international_spoc_email']) : set_value("international_spoc_email"); ?>" placeholder="">   
                            </div>                            
                    </div>

                    <h5 class="card-title mb-0" style="margin-bottom: 15px !important; font-weight:bold;color:black">Project Information</h5>

                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="category"><span class="text-danger">*</span>Category</label>
                                    <input type="text" autocomplete="off"  name="category" class="form-control" id="category" value="<?php echo isset($Fetch_data['category']) ? set_value("category", $Fetch_data['category']) : set_value("category"); ?>" placeholder="">   
                            </div>       
                            <div class="form-group col-md-6">
                                    <label for="project"><span class="text-danger">*</span>Project</label>
                                    <input type="text" autocomplete="off"  name="project" class="form-control" id="project" value="<?php echo isset($Fetch_data['project']) ? set_value("project", $Fetch_data['project']) : set_value("project"); ?>" placeholder="">
                            </div>                           
                    </div>

                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="project_start_date"><span class="text-danger">*</span>Project Start Date</label>
                                    <input type="text" autocomplete="off"  name="project_start_date" class="form-control" id="project_start_date" value="<?php echo isset($Fetch_data['project_start_date']) ? set_value("project_start_date", $Fetch_data['project_start_date']) : set_value("project_start_date"); ?>" placeholder="">   
                            </div>       
                            <div class="form-group col-md-6">
                                    <label for="project_end_date"><span class="text-danger">*</span>Project End Date</label>
                                    <input type="text" autocomplete="off"  name="project_end_date" class="form-control" id="project_end_date" value="<?php echo isset($Fetch_data['project_end_date']) ? set_value("project_end_date", $Fetch_data['project_end_date']) : set_value("project_end_date"); ?>" placeholder="">
                            </div>                           
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="location">Location</label>
                                    <input type="text" autocomplete="off"  name="location" class="form-control" id="location" value="<?php echo isset($Fetch_data['location']) ? set_value("location", $Fetch_data['location']) : set_value("location"); ?>" placeholder="">   
                            </div>                           
                    </div>

                    <h5 class="card-title mb-0" style="margin-bottom: 15px !important; font-weight:bold;color:black">Case Study</h5>


                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="objective"><span class="text-danger">*</span>Objective</label>
                                    <input type="text" autocomplete="off"  name="objective" class="form-control" id="objective" value="<?php echo isset($Fetch_data['objective']) ? set_value("objective", $Fetch_data['objective']) : set_value("objective"); ?>" placeholder="">   
                            </div>       
                            <div class="form-group col-md-6">
                                    <label for="concept_activity"><span class="text-danger">*</span>Concept & Activity</label>
                                    <input type="text" autocomplete="off"  name="concept_activity" class="form-control" id="concept_activity" value="<?php echo isset($Fetch_data['concept_activity']) ? set_value("concept_activity", $Fetch_data['concept_activity']) : set_value("concept_activity"); ?>" placeholder="">
                            </div>                           
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="amplification_scale"><span class="text-danger">*</span>Amplification & Scale</label>
                                    <input type="text" autocomplete="off"  name="amplification_scale" class="form-control" id="amplification_scale" value="<?php echo isset($Fetch_data['amplification_scale']) ? set_value("amplification_scale", $Fetch_data['amplification_scale']) : set_value("amplification_scale"); ?>" placeholder="">   
                            </div>       
                            <div class="form-group col-md-6">
                                    <label for="result"><span class="text-danger">*</span>Result</label>
                                    <input type="text" autocomplete="off"  name="result" class="form-control" id="result" value="<?php echo isset($Fetch_data['result']) ? set_value("result", $Fetch_data['result']) : set_value("result"); ?>" placeholder="">   
                            </div>                          
                    </div>

                    
                    <h5 class="card-title mb-0" style="margin-bottom: 15px !important; font-weight:bold;color:black">Client Approval Information</h5>

                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="client_name"><span class="text-danger">*</span>Client Name</label>
                                    <input type="text" autocomplete="off"  name="client_name" class="form-control" id="client_name" value="<?php echo isset($Fetch_data['client_name']) ? set_value("client_name", $Fetch_data['client_name']) : set_value("client_name"); ?>" placeholder="">   
                            </div>       
                            <div class="form-group col-md-6">
                                    <label for="client_email"><span class="text-danger">*</span>Client Email</label>
                                    <input type="text" autocomplete="off"  name="client_email" class="form-control" id="client_email" value="<?php echo isset($Fetch_data['client_email']) ? set_value("client_email", $Fetch_data['client_email']) : set_value("client_email"); ?>" placeholder="">   
                            </div>                          
                    </div>

                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="client_whatsapp_number"><span class="text-danger">*</span>Client WhatsApp Number</label>
                                    <input type="text" autocomplete="off"  name="client_whatsapp_number" class="form-control" id="client_whatsapp_number" value="<?php echo isset($Fetch_data['client_whatsapp_number']) ? set_value("client_whatsapp_number", $Fetch_data['client_whatsapp_number']) : set_value("client_whatsapp_number"); ?>" placeholder="">   
                            </div>       
                            <div class="form-group col-md-6">
                                    <label for="client_sms_number"><span class="text-danger">*</span>Client SMS Number</label>
                                    <input type="text" autocomplete="off"  name="client_sms_number" class="form-control" id="client_sms_number" value="<?php echo isset($Fetch_data['client_sms_number']) ? set_value("client_sms_number", $Fetch_data['client_sms_number']) : set_value("client_sms_number"); ?>" placeholder="">   
                            </div>                          
                    </div>


                    <h5 class="card-title mb-0" style="margin-bottom: 15px !important; font-weight:bold;color:black">Supporting Documents</h5>

                    <?php 
                        if(!empty($Fetch_data['other_file'])){
                            $file_info = pathinfo($Fetch_data['other_file']);
                            $file_extension = $file_info['extension']; 
                            // echo"<pre>";print_r($file_extension);
                        ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nomineeMobile"><span class="text-danger">*</span>Attachment</label><br>  
                                <input type="hidden" autocomplete="off"  name="file" class="form-control" id="" value="<?php echo $Fetch_data['other_file'] ?>" placeholder="">          
                               <?php if($file_extension == 'mp4'){ ?>
                                <video width="600" height="400" controls>
                                <source  src="<?php echo base_url('uploads/file/'.$Fetch_data['other_file']); ?>" type="video/mp4">
                                </video>
                                <?php  }else if($file_extension == 'jpeg' || $file_extension == 'jpg' ||$file_extension == 'png'){ ?>
                                        <img  width="600" height="400" src="<?php echo base_url('uploads/file/'.$Fetch_data['file']); ?>" alt="Image">
                                <?php  }else if($file_extension == 'pdf'){ ?>

                                    <iframe  src="<?php echo base_url('uploads/file/'.$Fetch_data['other_file']);?>" width="600" height="400"></iframe>
                                <?php  }else if($file_extension == 'mp3'){ ?>
                                    
                                    <audio controls>
                                        <source  src="<?php echo base_url('uploads/file/'.$Fetch_data['other_file']);?>" type="audio/mpeg">
                                    </audio>
                                <?php  } ?>
                            </div>
                            <?php if($this->session->userdata('admin_role_id') == '3'){?>
                            <div class="form-group col-md-6">
                                <label for="remark"><span class="text-danger">*</span>Evaluation</label>                        
                                <input type="text" autocomplete="off"  name="remark" class="form-control" id="remark" value="<?php echo isset($Fetch_data['remark']) ? set_value("remark", $Fetch_data['remark']) : set_value("remark"); ?>" placeholder="">
                            </div>
                            <?php }else{?>

                        
                            <div class="form-group col-md-6">
                            <label for="juryID"><span class="text-danger">*</span>Select Jury</label>
                            <?php $user_selected_corses=array_column($jury_assignID, 'juryID');?>
                            
                            <select name="juryID[]" id="juryID" multiple class="js-juryID-multiple">
                                <?php foreach($juryID as $value){?>
                                    <option value="<?php echo $value['admin_id']; ?>" <?php if(in_array($value['admin_id'],$user_selected_corses))echo "selected"; ?>><?php echo $value['username']; ?></option>
                              
                           <?php } ?>
                            </select>
                      
                           
                             </div>
                        </div>

                       <?php } }?> 














                        <!-- <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="awardCategory"><span class="text-danger">*</span>Award Category</label>
                                    <select name="awardCategory" class="form-control" id="awardCategory" placeholder="">
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
                                <label for="nomineeName"><span class="text-danger">*</span> Nominee Name</label>                        
                                <input type="text" autocomplete="off"  name="nomineeName" class="form-control" id="nomineeName" value="<?php echo isset($Fetch_data['nomineeName']) ? set_value("nomineeName", $Fetch_data['nomineeName']) : set_value("nomineeName"); ?>" placeholder="">
                                <input type="hidden" name="nomineeID" id="nomineeID" value="<?php echo isset($Fetch_data['nomineeID']) ? set_value("nomineeID", $Fetch_data['nomineeID']) : set_value("nomineeID"); ?>"> 
                            </div>
                           
                        </div> -->
                      
                        <!-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nomineeEmail"><span class="text-danger">*</span> Nominee Email</label>                        
                                <input type="text" autocomplete="off"  name="nomineeEmail" class="form-control" id="nomineeEmail" value="<?php echo isset($Fetch_data['nomineeEmail']) ? set_value("nomineeEmail", $Fetch_data['nomineeEmail']) : set_value("nomineeEmail"); ?>" placeholder="">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="nomineeMobile"><span class="text-danger">*</span> Nominee Mobile</label>                        
                                <input type="text" autocomplete="off"  name="nomineeMobile" class="form-control" id="nomineeMobile" value="<?php echo isset($Fetch_data['nomineeMobile']) ? set_value("nomineeMobile", $Fetch_data['nomineeMobile']) : set_value("nomineeMobile"); ?>" placeholder="">
                            </div>
                        </div>-->

                       

                     



                        <!-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="awardImage"> Nominee  Image </label>
                                <input type="file" class="form-control" id="awardImage" name="awardImage" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['awardImage']) ? $Fetch_data['awardImage'] : ''; ?>" />
                                <input type="hidden" name="old_awardImage" id="old_awardImage" value="<?php echo isset($Fetch_data['awardImage']) ? $Fetch_data['awardImage'] : ''; ?>" />
                                <?php if (isset($Fetch_data['awardImage'])) {?>
                                    <img src="<?php echo base_url('uploads/nominee/' . $Fetch_data['awardImage']); ?>" width="100" height="100" class="img-responsive"/>
                                <?php }?>
                                <span class="text-danger"><?php echo form_error('awardImage'); ?></span>
                            </div>
                        </div> -->
                        <!-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="awardDescription"><span class="text-danger">*</span> Nominee Description </label>
                                <textarea type="text" class="form-control"  rows="4" name="awardDescription" id="awardDescription"><?php echo isset($Fetch_data['awardDescription']) ? set_value("awardDescription", $Fetch_data['awardDescription']) : set_value("awardDescription"); ?></textarea>
                            </div>
                            
                        </div> -->
                        
                   
                     
                          
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