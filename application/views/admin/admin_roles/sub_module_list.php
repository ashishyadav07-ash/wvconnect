<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Sub Module Setting</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sub Module Setting</a></li>
                </ol>
            </div>
        </div>
        <?php $parent_module = $this->uri->segment(4); ?>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?= base_url('admin/admin_roles/sub_module_add/'.$parent_module); ?>"><button class="btn btn-primary-rgba"> <i class="feather icon-plus mr-2"></i>Add New</button></a>
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
                    <h5 class="card-title mb-0">Sub Module Setting</h5>
                </div>
                <div class="card-body">
                   <table id="example1" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th width="50">ID</th>
													<th>Name</th>
													<th>Operations</th>
													<th width="100">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($records as $record): ?>
													<tr>
														<td><?= $record['id']; ?></td>
														<td><?= ucfirst(str_replace( '_',' ',$record['name'] )) ?></td>
														<td><?= $record['link']; ?></td>
														<td>
															<a href="<?php echo site_url("admin/admin_roles/sub_module_edit/".$record['id']); ?>" class="btn btn-success-rgba" >
																	<i class="feather icon-edit-2"></i>
																</a>
															<a href="<?php echo site_url("admin/admin_roles/sub_module_delete/".$record['id'].'/'.$record['parent']); ?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
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