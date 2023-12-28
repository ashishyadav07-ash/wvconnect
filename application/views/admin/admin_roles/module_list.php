<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables_new/dataTables.bootstrap4.css"> 
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Module Setting</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Module Setting</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?= base_url('admin/admin_roles/module_add'); ?>"><button class="btn btn-primary-rgba"> <i class="feather icon-plus mr-2"></i><?= trans('add_new_module') ?></button></a>
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
                    <h5 class="card-title mb-0">Module Setting</h5>
                </div>
                <div class="card-body">
                	 <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>
                   <table id="example1" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th width="50"><?= trans('id') ?></th>
													<th><?= trans('module_name') ?></th>
													<th><?= trans('controller_name') ?></th>
													<th><?= trans('fa_icon') ?></th>
													<th><?= trans('operations') ?></th>
													<th><?= trans('sub_module') ?></th>
													<th><?= trans('action') ?></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($records as $record): ?>
													<tr>
														<td><?= $record['module_id']; ?></td>
														<td><?= ucfirst($record['module_name']); ?></td>
														<td><?= $record['controller_name']; ?></td>
														<td><?= $record['fa_icon']; ?></td>
														<td><?= $record['operation']; ?></td>
														<td>
															<a href="<?= base_url('admin/admin_roles/sub_module/'.$record['module_id']) ?>" class="btn btn-info btn-xs mr5">
																<i class="fa fa-sliders"></i>
															</a>
														</td>
														<td>
															<a href="<?php echo site_url("admin/admin_roles/module_edit/".$record['module_id']); ?>" class="btn btn-success-rgba" >
																	<i class="feather icon-edit-2"></i>
																</a>
															<a href="<?php echo site_url("admin/admin_roles/module_delete/".$record['module_id']); ?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
														</td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div> <!-- End row -->
</div>

<!-- DataTables -->

<script src="<?= base_url() ?>assets/plugins/datatables_new/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables_new/dataTables.bootstrap4.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
  })
</script>