<div class="breadcrumbbar">

    <div class="row align-items-center">

        <div class="col-md-8 col-lg-8">

            <h4 class="page-title">Edit Page</h4>

            <div class="breadcrumb-list">

                <!-- <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="< ?php echo base_url('admin/dashboard') ?>">Dashboard</a></li>

                    <li class="breadcrumb-item"><a href="#">Edit </a></li>

                </ol> -->

            </div>

        </div>

        <div class="col-md-4 col-lg-4">

            <div class="widgetbar">

                 <a href="<?= base_url('admin/page'); ?>"><button class="btn btn-primary-rgba"> <i class="feather icon-list mr-2"></i>Page List</button></a>
                <a href="<?= base_url('admin/page/add'); ?>"><button class="btn btn-primary-rgba"> <i class="feather icon-plus mr-2"></i>Add New Page</button></a>

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
                    <h5 class="card-title mb-0">Edit </h5>
                </div> -->
                <div class="card-body">
                   <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <?php echo form_open(base_url('admin/page/edit/'.$page['id']), 'class="form-horizontal" autocomplete="off" ' )?>  
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="pageTitle"><span class="text-danger">*</span>Page Name</label>
                              <input type="text" name="pageTitle" class="form-control" value="<?= $page['pageTitle']; ?>" id="pageTitle" placeholder="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="pageHeading">Heading</label>
                              <input type="text" name="pageHeading" class="form-control" value="<?= $page['pageHeading']; ?>" id="pageHeading" placeholder="">
                            </div>
                        </div>
                    
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="pageDescription"> Description</label>
                              <textarea type="pageDescription" name="pageDescription" class="form-control" rows ="6" id="pageDescription" placeholder=""><?php echo $page['pageDescription']; ?></textarea>
                            </div>
                        </div>
                      <input type="submit" name="submit" value="Update " class="btn btn-primary-rgba font-16">
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