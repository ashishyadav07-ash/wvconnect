<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><?= $title ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="#" onclick="window.history.go(-1); return false;"><button class="btn btn-primary-rgba"> <i class="feather icon-plus mr-2"></i><?= trans('back') ?></button></a>
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
                    <h5 class="card-title mb-0"><?= $title ?></h5>
                </div>
                <div class="card-body">
                    <!-- For Messages -->
                      <?php $this->load->view('admin/includes/_messages.php') ?>

                      <?php echo form_open(base_url('admin/admin_roles/edit'), 'id="frmvalidate"');  ?> 
                      <input type="hidden" name="admin_role_id" value="<?=$record['admin_role_id']?>"  />
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="exampleInputEmail1"><?= trans('admin_role') ?></label>
                              <input class="form-control" type="text" required="required" name="admin_role_title" value="<?=isset($record['admin_role_title'])?$record['admin_role_title']:''?>">
                          </div>
                          
                            <div class="form-group col-md-6">
                                <label for="admin_role_status"><?= trans('admin_role') ?> <?= trans('status') ?></label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="admin_role_status"  value="1" <?php if(isset($record['admin_role_status']) && $record['admin_role_status']==1 ){echo 'checked';}?> checked="checked">
                                    Active
                                    </label>
                                    &nbsp;&nbsp;
                                    <label>
                                        <input type="radio" name="admin_role_status"  value="0" <?php if(isset($record['admin_role_status']) && $record['admin_role_status']==0 ){echo 'checked';}?>>
                                    Inactive
                                    </label>
                                </div>
                            </div>

                      </div>
                        <input type="hidden" name="submit" value="submit"  />
                      
                      <input type="submit" name="submit" value="<?= trans('submit') ?>" class="btn btn-primary-rgba font-16">

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div> <!-- End row -->
</div>