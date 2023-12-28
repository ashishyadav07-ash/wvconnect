<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Change Password</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Change Password</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?= base_url('admin/profile/change_pwd'); ?>"><button class="btn btn-primary-rgba"> <i class="feather icon-plus mr-2"></i><?= trans('change_password') ?></button></a>
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
                    <h5 class="card-title mb-0">Change Password</h5>
                </div>
                <div class="card-body">
                   <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>
                   
                    <?php echo form_open(base_url('admin/profile/change_pwd'), 'class="form-horizontal"');  ?> 
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="password"><?= trans('new_password') ?></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="<?= trans('new_password') ?>">
                          </div>
                          <div class="form-group col-md-6">
                              <label for="confirm_pwd"><?= trans('confirm_password') ?></label>
                              <input type="password" class="form-control" name="confirm_pwd" id="confirm_pwd" placeholder="<?= trans('confirm_password') ?>">
                          </div>
                      </div>
                      <input type="submit" name="submit" value="<?= trans('change_password') ?>" class="btn btn-primary-rgba font-16">

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div> <!-- End row -->
</div>