<?php if ($this->router->fetch_method() == 'faq_view') { ?> 
    
    <script type="text/javascript">
        $(document).ready(function(e) {
            $('input[type="password"]').each(function(index, element) {
                $(this).parents('.form-group').hide();
            });
            $('input[type="file"]').each(function(index, element) {
                var main=$(this).remove();
            });
            $('textarea').each(function(index, element) {
                var main=$(this).parents('.form-group');
                var value=$(this).val();
                $(this).before(value);
                $(this).remove();
            });
            $('input[type="text"]').each(function(index, element) {
                var main=$(this).parents('.form-group');
                var value=$(this).val();
                $(this).before(value);
                $(this).remove();

            });
            $('input[type="submit"]').each(function(index, element) {
                $(this).remove();
            });
            $('form').attr('id','');
            $('select').each(function(index, element) {
                var selVal=$('option:selected',this).text();
                $(this).before(selVal);
                $(this).parents('.form-group').remove();
            });
        });
    </script>
    <style type="text/css">
        .form-control{
           outline: none !important;
            border:none !important;
            -webkit-appearance:none !important;
        }
        .form-control:focus{
            outline: none !important;



            border:none !important;



            -webkit-appearance:none !important;



        }



    </style>



<?php }?>



<div class="breadcrumbbar">



    <div class="row align-items-center">



        <div class="col-md-8 col-lg-8">



            <h4 class="page-title">Add-Edit </h4>



            <div class="breadcrumb-list">



                <!-- <ol class="breadcrumb">



                    <li class="breadcrumb-item"><a href="< ?php echo base_url('admin/dashboard'); ?>">Dashboard</a></li>



                    <li class="breadcrumb-item"><a href="#"> Add-Edit</a></li>



                </ol> -->



            </div>



        </div>



        <div class="col-md-4 col-lg-4">



            <div class="widgetbar">
                <a href="<?=base_url();?>admin/faq"><button class="btn btn-primary-rgba"> <i class="feather icon-list mr-2"></i> List</button></a>
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
                    <?php if ($this->router->fetch_method() == 'faq_view') {?>
                    Event View <?php } else {?>  Add Edit <?php }?></h5>
                </div> 
                <div class="card-body">
                   <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>

                    <?php echo form_open_multipart(base_url('admin/faq/add_edit'), 'class="form-horizontal"');  ?> 

                        <div class="form-row">

                            <div class="form-group col-md-6">

                                <label for="faqHeading"><span class="text-danger">*</span> Faq Question </label>  
                                 <textarea type="text" autocomplete="off"  name="faqHeading" class="form-control" id="faqHeading" value="" placeholder=""><?php echo isset($Fetch_data['faqHeading']) ? set_value("faqHeading ", $Fetch_data['faqHeading']) : set_value("faqHeading"); ?></textarea>

                                <!--<input type="text"autocomplete="off"  name="faqHeading" class="form-control" id="faqHeading" value="<?php echo isset($Fetch_data['faqHeading']) ? set_value("faqHeading ", $Fetch_data['faqHeading']) : set_value("faqHeading"); ?>" placeholder="">-->

                                <input type="hidden" name="faqId" id="faqId" value="<?php echo isset($Fetch_data['faqId']) ? set_value("   faqId", $Fetch_data['faqId']) : set_value("faqId"); ?>"> 

                            </div>
                             <div class="form-group col-md-6">
                                <label for="faqDescription"><span class="text-danger">*</span> Faq Answer </label>                        

                                <textarea type="text" autocomplete="off"  name="faqDescription" class="form-control" id="faqDescription" value="" placeholder=""><?php echo isset($Fetch_data['faqDescription']) ? set_value("faqDescription ", $Fetch_data['faqDescription']) : set_value("faqDescription"); ?></textarea>

                                <input type="hidden" name="faqId" id="faqId" value="<?php echo isset($Fetch_data['faqId']) ? set_value("   faqId", $Fetch_data['faqId']) : set_value("faqId"); ?>"> 

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



<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

<!-- Updated stylesheet url -->
<link rel="stylesheet" href="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.css">


<script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script src="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>

<script>CKEDITOR.replace('faqDescription');</script>
<script>CKEDITOR.replace('faqHeading');</script>
