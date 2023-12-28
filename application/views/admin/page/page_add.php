<div class="breadcrumbbar">

    <div class="row align-items-center">

        <div class="col-md-8 col-lg-8">

            <h4 class="page-title">Add Page</h4>

            <div class="breadcrumb-list">

                <!-- <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="< ?php echo base_url('admin/dashboard') ?>">Dashboard</a></li>

                    <li class="breadcrumb-item"><a href="#">Add New</a></li>

                </ol> -->

            </div>

        </div>

        <div class="col-md-4 col-lg-4">

            <div class="widgetbar">

                <a href="<?= base_url('admin/page'); ?>"><button class="btn btn-primary-rgba"> <i class="feather icon-list mr-2"></i>Page List</button></a>

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

                <!-- <div class="card-header">                                

                    <h5 class="card-title mb-0">Add</h5>

                </div> -->

                <div class="card-body">

                   <!-- For Messages -->

                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <?php echo form_open(base_url('admin/page/add'), 'class="form-horizontal" autocomplete="off" ');  ?> 
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label><span class="text-danger">*</span>Page Name</label>
                              <input type="text" name="pageTitle"   class="form-control" id="pageTitle" value="<?php echo set_value("pageTitle");?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="pageHeading">Heading</label>
                              <input type="text" name="pageHeading" class="form-control" id="pageHeading" placeholder="">
                           </div>
                        </div>
                    
                      <div class="form-row">
                          
                          <div class="form-group col-md-6">
                              <label for="pageDescription">Description</label>
                              <textarea rows ="6" type="pageDescription" name="pageDescription" class="form-control" id="pageDescription" placeholder=""></textarea>
                          </div>
                      </div>
                      <input type="submit" name="submit" value="Add" class="btn btn-primary-rgba font-16">
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div> <!-- End row -->
</div>
<script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script> 
CKEDITOR.replace('pageDescription',{
        allowedContent : true,
        filebrowserUploadUrl: "<?php echo base_url() ?>upload.php",
        filebrowserUploadMethod : "form"
    });
// CKEDITOR.replace('mobilityAssistanceShortDescription',{allowedContent:true,});
 </script>
