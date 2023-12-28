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
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?= base_url('admin/admin'); ?>"><button class="btn btn-primary-rgba"> <i class="feather icon-plus mr-2"></i><?= trans('admin_list') ?></button></a>
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
                    <?php echo form_open(base_url('admin/admin/add'), 'class="form-horizontal",id="writeUs"');  ?> 
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" /> 

                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="username"><?= trans('username') ?></label>
                              <input type="text" name="username" class="form-control" id="username" placeholder="<?= trans('username') ?>">
                          </div>
                          <div class="form-group col-md-6">
                              <label for="firstname"><?= trans('firstname') ?></label>
                              <input type="text" name="firstname" class="form-control" id="firstname" placeholder="<?= trans('firstname') ?>">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="lastname"><?= trans('lastname') ?></label>
                              <input type="text" name="lastname" class="form-control" id="lastname" placeholder="<?= trans('lastname') ?>">
                          </div>
                          <div class="form-group col-md-6">
                              <label for="email"><?= trans('email') ?></label>
                              <input type="email" name="email" class="form-control" id="email" placeholder="<?= trans('email') ?>">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="mobile_no"><?= trans('mobile_no') ?></label>
                              <input type="text" name="mobile_no" class="form-control" id="mobile_no" placeholder="<?= trans('mobile_no') ?>">
                          </div>
                          <div class="form-group col-md-6">
                              <label for="password"><?= trans('password') ?></label>
                              <input type="password" name="password" class="form-control" id="password" placeholder="<?= trans('password') ?>">
                          </div>
                          
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="employee_id">Employee Id</label>
                              <input type="text" name="employee_id" class="form-control" id="employee_id" placeholder="Employee Id">
                          </div>
                          
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="role"><?= trans('select_admin_role') ?>*</label>
                              <select name="role" class="form-control">
                                <option value=""><?= trans('select_role') ?></option>
                                <?php foreach($admin_roles as $role): ?>
                                  <option value="<?= $role['admin_role_id']; ?>"><?= $role['admin_role_title']; ?></option>
                                <?php endforeach; ?>
                              </select>
                          </div>
                          
                      </div>
                      <input type="submit" name="submit" value="<?= trans('add_admin') ?>" class="btn btn-primary-rgba font-16">

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div> <!-- End row -->
</div>
<script>
    $(function() 
    {
        var registrationflag=1;
        $("#formClick").on('click', function(){

            //$(".error").hide();
            //var registrationflag = 1;
            
            var username = $('#username').val();
            var firstname = $('#firstname').val();
            var lastname = $('#lastname')
            var email = $('#email').val();
             var mobile_no = $('#mobile_no')
            var employee_id = $('#employee_id').val();
            // var Category_of_Work = $('#Category_of_Work').val();
            //var Project_Details = $('#Project_Details').val();
           // var meeting_Time = $('#meeting_Time').val();
            var num_regx = /^[0-9-+]+$/;
            var regx = /^[a-zA-Z-' ]*$/;
            var num_regx= /^\d*(?:\.\d{1,2})?$/;
            var regx_email = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
           
            
            if(username =='')
            {
                $('#username').html("enter the name");
                registrationflag = 1;
            }
            else if(regx.test(username) == false)
            {
                
                $('#username').html("name feild accept only character");
                registrationflag = 1;

            }
            else
            {
                $('#username').html("");
                registrationflag = 0;
            }
//===========================================================================
            if(firstname =='')
            {
                $('#firstname').html("enter the name");
                registrationflag = 1;
            }
            else if(regx.test(firstname) == false)
            {
                
                $('#firstname').html("name feild accept only character");
                registrationflag = 1;

            }
            else
            {
                $('#firstname').html("");
                registrationflag = 0;
            } 
//===========================================================================
            if(lastname =='')
            {
                $('#lastname').html("enter the name");
                registrationflag = 1;
            }
            else if(regx.test(lastname) == false)
            {
                
                $('#lastname').html("name feild accept only character");
                registrationflag = 1;

            }
            else
            {
                $('#lastname').html("");
                registrationflag = 0;
            } 
            //============================================================================
            if(email == '')
            {
                $('#email').html("please enter the email**");
                registrationflag = 1;
            }
            else if(regx_email.test(email) == false) 
            {
                $('#email').html("please enter the valid email**");
                registrationflag = 1;
            }
            else 
            {
                $('#email').html("");
                registrationflag = 0;

            }
            // else if(!email.test(email)) 
            // {
            //     $("#email_validate").html('Enter a valid email address.');
            //     registrationflag = 1;
            // }
            // if(registrationflag == 1)
            // { 
            //     return 0;
            // }
//============================================================================== 

            if(mobile_No == '')
            {
                $('#mobile_no').html("enter the mobile_No");
                registrationflag = 1;
            }
              else if(num_regx.test(mobile_no) == false)
            {
                
                $('#mobile_no').html("mobile no  feild accept only numbers");
                registrationflag = 1;

            }
            else if(( mobile_no.length == 10) == false)
            {
                $('#mobile_no').html("enter only 10 numbers");
                registrationflag = 1;    
            }
            else
            {
                $('#mobile_no').html("");
                registrationflag = 0;

            }
            // else if (num_regx.test('mobile_No' ) && mobile_No.length == 10) 
            // {
               
            //     $('#mobile_No_validate').html("please enter only numbers and number length have only 10 ");
            //      registrationflag = 1;
            // //alert("InValid Mobile Number");
            // }
            // else 
            // {
            //     registrationflag = 0 ;
            // //alert("Invalid Mobile Number");
            // }

//=============================================================================
            if(employee_id == '')
            {
                $('#employee_id').html("enter the mobile_No");
                registrationflag = 1;
            }
              else if(num_regx.test(employee_id) == false)
            {
                
                $('#employee_id').html("mobile no  feild accept only numbers");
                registrationflag = 1;

            }
            // else if(( employee_id.length == 10) == false)
            // {
            //     $('#employee_id').html("enter only 10 numbers");
            //     registrationflag = 1;    
            // }
            else
            {
                $('#employee_id').html("");
                registrationflag = 0;

            }
//======================================================================================
            if(registrationflag == 0)
            {
                if((username !='' && regx.test(username)) &&(firstname !='' && regx.test(firstname))&&(lastname !='' && regx.test(lastname)) && (email !='' && regx_email.test(email)) && (num_regx.test(mobile_No) && mobile_No.length <= 10) == true && (num_regx.test(employee_id) ))
                {        
                    var form = $('#writeUs')[0];
                    var formData = new FormData(form);
                    $.ajax({
                        url:base_url+'/add',
                        type: 'POST',
                        data: formData,
                        dataType : 'json',
                        processData: false, // Important!.
                        contentType: false,
                        cache: false,
                        success: function(response){
                       console.log(response);
                        }
                    });
                }
            }
        });
    });
</script>

