<?php if ($this->router->fetch_method() == 'view') {

    ?>

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

            <h4 class="page-title">Event Category Add Edit</h4>

            <div class="breadcrumb-list">

                <ol class="breadcrumb">

                   

                </ol>

            </div>

        </div>

        <div class="col-md-4 col-lg-4">

            <div class="widgetbar">

                <a href="<?=base_url();?>admin/eventCategory/"><button class="btn btn-primary-rgba"> <i></i>Event Category List</button></a>

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
                    <?php if ($this->router->fetch_method() == 'view') {?>

                    Event Category View <?php } else {?>Event Category Add Edit <?php }?></h5>

                </div> 

                <div class="card-body">

                   <!-- For Messages -->

                    <?php $this->load->view('admin/includes/_messages.php') ?>



                    <?php echo form_open_multipart(base_url('admin/eventCategory/add_edit'), 'class="form-horizontal"');  ?>

                   
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="eventCategoryName"><span class="text-danger">*</span>Event Category</label>

                                <input type="text" autocomplete="off"  name="eventCategoryName" class="form-control" id="eventCategoryName" value="<?php echo isset($Fetch_data['eventCategoryName']) ? set_value("eventCategoryName", $Fetch_data['eventCategoryName']) : set_value("eventCategoryName"); ?>" placeholder="">
                                
                                <input type="hidden" name="eventCategoryID" id="eventCategoryID" value="<?php echo isset($Fetch_data['eventCategoryID']) ? set_value("eventCategoryID", $Fetch_data['eventCategoryID']) : set_value("eventCategoryID"); ?>">
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