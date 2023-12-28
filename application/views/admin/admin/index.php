<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables_new/dataTables.bootstrap4.css"> 
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><?= trans('admin_list') ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#"><?= trans('admin_list') ?></a></li>
                </ol>
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
                    <h5 class="card-title mb-0"><?= trans('admin_list') ?></h5>
                </div>
                <div class="card-body">

                    <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <?php echo form_open("/",'class="filterdata"') ?>   
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="type" class="form-control" onchange="filter_data()">
                                    <?php foreach($admin_roles as $admin_role):?>
                                        <option value="<?=$admin_role['admin_role_id']?>"><?=$admin_role['admin_role_title']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>  
                        </div>  
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="status" class="form-control" onchange="filter_data()" >
                                    <option value=""><?= trans('all_status') ?></option>
                                    <option value="1"><?= trans('active') ?></option>
                                    <option value="0"><?= trans('inactive') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="keyword" class="form-control"  placeholder="<?= trans('search_from_here') ?>..." onkeyup="filter_data()" />
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?> 
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <?php echo form_open(base_url('admin/admin/trash'), 'id="frmvalidate"');  ?> 
                    <?php if( $this->uri->segment(3) == 'trash' ) { ?>
                    <button name="multiple_delete_all" id="multiple_delete_all" title="" data-toggle="tooltip" data-placement="Right" data-original-title="Trash" class="btn btn-danger-rgba" ><i class="feather icon-trash" ></i></button>
                    <button name="multiple_restore" id="multiple_restore" title="" data-toggle="tooltip" data-placement="Right" data-original-title="Restore" class="btn btn-success-rgba" ><i class="feather icon-refresh-ccw"></i></button>
                    <a href="<?= base_url('admin/admin'); ?>">Admin List</a>
                    <?php }else{ ?>

                    <button name="multiple_delete" id="multiple_delete" title="" data-toggle="tooltip" data-placement="Right" data-original-title="Trash" class="btn btn-danger-rgba" ><i class="feather icon-trash" ></i></button>
                    <a href="<?= base_url('admin/admin/trash'); ?>"><button class="btn btn-danger-rgba"> <i class="feather icon-trash-2"></i>Trash</button></a>
                    <?php } ?>
                    <!-- Load Admin list (json request)-->
                    <!-- <div class="data_container"></div> -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th data-orderable="false" style="width:18px"><input type="checkbox" name="mult_change" id="mult_change" value="delete" /></th>
                                <th width="50"><?= trans('id') ?></th>
                                <th><?= trans('user') ?></th>
                                <th><?= trans('username') ?></th>
                                <th><?= trans('email') ?></th>
                                <th><?= trans('role') ?></th>
                                <th width="100"><?= trans('status') ?></th>
                                <th width="120"><?= trans('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($info as $row): ?>
                            <tr>
                                <td style="width:18px"><input type="checkbox" class="checkbox_del" name="checkbox_del[]" id="checkbox_del[]" value="<?php echo $row['admin_id']; ?>"/></td>
                                <td>
                                    <?=$row['admin_id']?>
                                </td>
                                <td>
                                    <h4 class="m0 mb5"><?=$row['firstname']?> <?=$row['lastname']?></h4>
                                    <small class="text-muted"><?=$row['admin_role_title']?></small>
                                </td>
                                <td>
                                    <?=$row['username']?>
                                </td> 
                                <td>
                                    <?=$row['email']?>
                                </td>
                                <td>
                                    <button class="btn btn-xs btn-success"><?=$row['admin_role_title']?></button>
                                </td> 
                                <td>
                                    <div class="custom-control custom-switch">
                                        <input class='tgl_checkbox custom-control-input' data-id="<?=$row['admin_id']?>" id='cb_<?=$row['admin_id']?>' type='checkbox' <?php echo ($row['is_active'] == 1)? "checked" : ""; ?> />
                                        <label class='custom-control-label' for='cb_<?=$row['admin_id']?>'></label>
                                    </div>
                                </td>
                                <td>
                                    <a href="<?= base_url("admin/admin/edit/".$row['admin_id']); ?>" class="btn btn-success-rgba" >
                                    <i class="feather icon-edit-2"></i>
                                    </a>
                                    <a href="<?= base_url("admin/admin/delete/".$row['admin_id']); ?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>

                    <?php echo form_close(); ?>
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
  });

</script> 

<SCRIPT language="javascript">

    $("#mult_change").click(function () {
          $('.checkbox_del').attr('checked', this.checked);
    });

    $(".checkbox_del").click(function(){

        if($(".checkbox_del").length == $(".checkbox_del:checked").length) {
            $("#mult_change").attr("checked", "checked");
        } else {
            $("#mult_change").removeAttr("checked");
        }

    });
</SCRIPT>

<script>
//------------------------------------------------------------------
function filter_data()
{
$('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');
$.post('<?=base_url('admin/admin/filterdata')?>',$('.filterdata').serialize(),function(){
    $('.data_container').load('<?=base_url('admin/admin/list_data')?>');
});
}
//------------------------------------------------------------------
// function load_records()
// {
// $('.data_container').html('<div class="text-center"><img src="< ?=base_url('assets/dist/img')?>/loading.png"/></div>');
// $('.data_container').load('< ?=base_url('admin/admin/list_data')?>');
// }
// load_records();

//---------------------------------------------------------------------
$("body").on("change",".tgl_checkbox",function(){
$.post('<?=base_url("admin/admin/change_status")?>',
{
    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
    id : $(this).data('id'),
    status : $(this).is(':checked')==true?1:0
},
function(data){
    new PNotify( {
                    title: 'Success notice', text: 'Status Changed Successfully', type: 'success'
                });
});
});
</script>
