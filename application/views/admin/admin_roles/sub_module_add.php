<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Add New Sub Module</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Add New Sub Module</a></li>
                </ol>
            </div>
        </div>
        <?php $parent_menu = $this->uri->segment(4); ?>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?= base_url('admin/admin_roles/sub_module/'.$parent_menu); ?>"><button class="btn btn-primary-rgba"> <i class="feather icon-plus mr-2"></i>Sub Module List</button></a>
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
                    <h5 class="card-title mb-0">Add New Sub Module</h5>
                </div>
                <div class="card-body">
                    <!-- For Messages -->
                      <?php $this->load->view('admin/includes/_messages.php') ?>

                      <?php echo form_open(base_url('admin/admin_roles/sub_module_add'), 'class="form-horizontal"');  ?>  
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="module_name">Name</label>
                              <input type="text" name="module_name" class="form-control" id="module_name" placeholder="<?= trans('module_name') ?>">
                              <small>Controller name must be same</small>
                          </div>
                          <div class="form-group col-md-6">
                              <label for="operation">Link</label>
                              <input type="text" name="operation" class="form-control" id="operation" placeholder="<?= trans('operation') ?>">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="sort_order">Sort Order</label>
                              <input type="number" name="sort_order" class="form-control" id="sort_order" placeholder="<?= trans('sort_order') ?>">
                          </div>
                      </div>
                      
                      <input type="hidden" name="parent_module" value="<?= $parent_menu ?>">
                      <input type="submit" name="submit" value="<?= trans('add_admin') ?>" class="btn btn-primary-rgba font-16">

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div> <!-- End row -->
</div>