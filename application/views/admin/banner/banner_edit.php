<div class="breadcrumbbar">

    <div class="row align-items-center">

        <div class="col-md-8 col-lg-8">

            <h4 class="page-title">Edit Section </h4>

            <div class="breadcrumb-list">

               

            </div>

        </div>

        <div class="col-md-4 col-lg-4">

            <div class="widgetbar">

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
                    <h5 class="card-title mb-0">Edit Section </h5>
                </div> -->
                <div class="card-body">
                    <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <?php echo form_open_multipart(base_url('admin/banner/edit/' . $section['sectionID']), 'class="form-horizontal" autocomplete="off" ') ?>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="sectionHeading"><span class="text-danger">*</span>Heading</label>
                            <input type="text" name="sectionHeading" class="form-control  textalpha" id="sectionHeading" value="<?= $section['sectionHeading']; ?>">
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="sectionDescription"><span class="text-danger">*</span>Description</label>
                            <textarea type="text" class="form-control" name="sectionDescription" id="sectionDescription" value=""><?= $section['sectionDescription']; ?></textarea>
                        </div>


                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="sectionImage"><span class="text-danger">*</span>Image <span class="text-danger"></span></label>
                            <input type="file" name="sectionImage" class="form-control" id="sectionImage" value="<?= $section['sectionImage']; ?>">
                            <input type="hidden" name="old_sectionImage" id="old_sectionImage" value="<?php echo  $section['sectionImage']; ?>">
                            <img src="<?php echo base_url(); ?>uploads/banner/<?php echo $section['sectionImage']; ?>" style="width: 170px; height: 115px;">
                        </div>
                    </div>

                    <input type="submit" name="submit" value="Update " class="btn btn-primary-rgba font-16">

                    <?php echo form_close(); ?>

                </div>

            </div>

        </div>

        <!-- End col -->

    </div> <!-- End row -->

</div>

<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>

<script>
    CKEDITOR.replace('sectionDescription');
</script>