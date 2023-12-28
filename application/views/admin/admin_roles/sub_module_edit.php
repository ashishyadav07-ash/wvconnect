<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Edit Sub Module </h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Edit Sub Module </a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?= base_url('admin/admin_roles/sub_module/'.$module['parent']); ?>"><button class="btn btn-primary-rgba"> <i class="feather icon-plus mr-2"></i>Sub Module List</button></a>
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
                    <h5 class="card-title mb-0">Edit Sub Module </h5>
                </div>
                <div class="card-body">
                    <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>

                    <?php echo form_open(base_url('admin/admin_roles/sub_module_edit/'.$module['id']), 'class="form-horizontal"');  ?>  
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="module_name">Module Name</label>
                              <?php 
                                $menu = get_sidebar_menu();
                                $others = array('class' => 'form-control select2', 'id' => 'module_name');
                                $options =  array_column($menu, 'module_name','module_id');
                                echo form_dropdown('module_name',$options,$module['parent'],$others);
                              ?>
                          </div>
                          
                          <div class="form-group col-md-6">
                              <label for="module_name">Sub Module Name</label>
                              <input type="text" name="sub_module_name" class="form-control" id="sub_module_name" placeholder="<?= trans('sub_module_name') ?>" value="<?= $module['name']; ?>">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="operation">Link</label>
                              <input type="text" name="operation" value="<?= $module['link']; ?>" class="form-control" id="operation" placeholder="eg. about_us">
                          </div>
                          <div class="form-group col-md-6">
                              <label for="sort_order">Sort Order</label>
                              <input type="number" name="sort_order" value="<?= $module['sort_order']; ?>" class="form-control" id="sort_order" placeholder="">
                          </div>
                      </div>
                     
                      
                      <input type="submit" name="submit" value="Update Sub Module" class="btn btn-primary-rgba font-16">

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div> <!-- End row -->
</div>