<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><?= trans('edit_admin') ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#"><?= trans('edit_admin') ?></a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?= base_url('admin/admin'); ?>"><button class="btn btn-primary-rgba"> <i class="feather icon-plus mr-2"></i><?= trans('edit_admin') ?></button></a>
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
                    <h5 class="card-title mb-0"><?= trans('edit_admin') ?></h5>
                </div>
                <div class="card-body">
                    <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <?php echo form_open(base_url('admin/admin/edit/'.$admin['admin_id']), 'class="form-horizontal"' )?> 
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="username"><?= trans('username') ?></label>
                              <input type="text" name="username" value="<?= $admin['username']; ?>" class="form-control" id="username" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                              <label for="firstname"><?= trans('firstname') ?></label>
                              <input type="text" name="firstname" value="<?= $admin['firstname']; ?>" class="form-control" id="firstname" placeholder="">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="lastname"><?= trans('lastname') ?></label>
                              <input type="text" name="lastname" value="<?= $admin['lastname']; ?>" class="form-control" id="lastname" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                              <label for="email"><?= trans('email') ?></label>
                              <input type="email"name="email" value="<?= $admin['email']; ?>" class="form-control" id="email" placeholder="">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="mobile_no"><?= trans('mobile_no') ?></label>
                              <input type="text" name="mobile_no" value="<?= $admin['mobile_no']; ?>" class="form-control" id="mobile_no" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <select name="status" class="form-control">
                              <option value=""><?= trans('select_status') ?></option>
                              <option value="1" <?= ($admin['is_active'] == 1)?'selected': '' ?> ><?= trans('active') ?></option>
                              <option value="0" <?= ($admin['is_active'] == 0)?'selected': '' ?>><?= trans('inactive') ?></option>
                            </select>
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="password"><?= trans('password') ?></label>
                              <input type="password" name="password" class="form-control" id="password" placeholder="">
                          </div>

                          <div class="form-group col-md-6">
                              <label for="role"><?= trans('select_admin_role') ?>*</label>
                              <select name="role" class="form-control">
                                <option value=""><?= trans('select_role') ?></option>
                                <?php foreach($admin_roles as $role): ?>
                                  <?php if($role['admin_role_id'] == $admin['admin_role_id']): ?>
                                    <option value="<?= $role['admin_role_id']; ?>" selected><?= $role['admin_role_title']; ?></option>
                                    <?php else: ?>
                                      <option value="<?= $role['admin_role_id']; ?>"><?= $role['admin_role_title']; ?></option>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              </select>
                          </div>
                          
                      </div>
                      <input type="submit" name="submit" value="Update Admin" class="btn btn-primary-rgba font-16">

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div> <!-- End row -->
</div>