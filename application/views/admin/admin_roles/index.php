<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables_new/dataTables.bootstrap4.css"> 
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
                <a href="<?= base_url('admin/admin_roles/add'); ?>"><button class="btn btn-primary-rgba"> <i class="feather icon-plus mr-2"></i><?= trans('add_new_role') ?></button></a>
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
                   	<table id="example2" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="50"><?= trans('id') ?></th>
								<th><?= trans('admin_role') ?></th>
								<th><?= trans('status') ?></th>
								<th><?= trans('permission') ?></th>
								<th width="200"><?= trans('action') ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($records as $record): ?>
								<tr>
									<td><?php echo $record['admin_role_id']; ?></td>
									<td><?php echo $record['admin_role_title']; ?></td>
									<td>
	                                    <div class="custom-control custom-switch">
	                                        <input class='tgl_checkbox custom-control-input' data-id="<?=$record['admin_role_id']?>" id='cb_<?=$record['admin_role_id']?>' type='checkbox' <?php echo ($record['admin_role_status'] == 1)? "checked" : ""; ?> />
	                                        <label class='custom-control-label' for='cb_<?=$record['admin_role_id']?>'></label>
	                                    </div>
	                                </td>

									<td>
										<a href="<?php echo site_url("admin/admin_roles/access/".$record['admin_role_id']); ?>" class="btn btn-info btn-xs mr5" >
											<i class="fa fa-sliders"></i>
										</a>
									</td>
									<td>
										<?php if(!in_array($record['admin_role_id'],array(1))): ?>
											<a href="<?php echo site_url("admin/admin_roles/edit/".$record['admin_role_id']); ?>" class="btn btn-success-rgba" >
												<i class="feather icon-edit-2"></i>
											</a>
											<a href="<?php echo site_url("admin/admin_roles/delete/".$record['admin_role_id']); ?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
										<?php endif;?>
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

<script>
	
	$("body").on("change",".tgl_checkbox",function(){
		$.post('<?=base_url("admin/admin_roles/change_status")?>',
		{
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',	
			id : $(this).data('id'),
			status : $(this).is(':checked') == true ? 1:0,
		},
		function(){
			new PNotify( {
		            title: 'Success notice', text: 'Status Changed Successfully', type: 'success'
		        });
		});

	});

</script>