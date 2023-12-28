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
                <a href="<?= base_url('admin/admin_roles/module'); ?>"><button class="btn btn-primary-rgba"> <i class="feather icon-plus mr-2"></i><?= trans('module_list') ?></button></a>
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

                      <?php echo form_open(base_url('admin/admin_roles/module_add'), 'class="form-horizontal"');  ?>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="module_name"><?= trans('module_name') ?></label>
                              <input type="text" name="module_name" class="form-control" id="module_name" placeholder="">
                              <small><?= trans('lang_index_message') ?></small>
                          </div>
                          <div class="form-group col-md-6">
                              <label for="controller_name"><?= trans('controller_name') ?></label>
                              <input type="text" name="controller_name" class="form-control" id="controller_name" placeholder="">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="fa_icon"><?= trans('fa_icon') ?></label>
                              <input type="text" name="fa_icon" class="form-control" id="fa_icon" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                              <label for="operation"><?= trans('operations') ?></label>
                              <input type="text"  name="operation" class="form-control" id="operation" placeholder="eg. add|edit|delete">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="sort_order"><?= trans('sort_order') ?></label>
                              <input type="number" name="sort_order" class="form-control" id="sort_order" placeholder="<?= trans('sort_order') ?>">
                          </div>
                      </div>
                      
                      <input type="submit" name="submit" value="<?= trans('add_module') ?>" class="btn btn-primary-rgba font-16">

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div> <!-- End row -->
</div>