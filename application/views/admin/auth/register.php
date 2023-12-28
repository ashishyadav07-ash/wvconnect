<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Orbiter is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Orbiter - Bootstrap Minimal & Clean Admin Template</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="<?= base_url()?>assets/images/favicon.ico">
    <!-- Start css -->
    <link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url()?>assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet" type="text/css">
    <script src="<?= base_url()?>assets/js/jquery.min.js"></script>
    <!-- End css -->
</head>
<body class="vertical-layout">
    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container">
            <div class="auth-box register-box">
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-6 col-lg-5">
                        <!-- Start Auth Box -->
                        <div class="auth-box-right">
                            <div class="card">
                                <div class="card-body">
                                    <?php $this->load->view('admin/includes/_messages.php') ?>

                                    <?php echo form_open(base_url('admin/auth/register'), 'class="login-form" '); ?>
                                        <div class="form-head">
                                            <a href="index.html" class="logo"><img src="<?= base_url()?>assets/images/logo.svg" class="img-fluid" alt="logo"></a>
                                        </div> 
                                        <h4 class="text-primary my-4">Sign Up !</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="username" id="name" value="<?= old("username"); ?>" placeholder="<?= trans('username') ?> ">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="firstname" id="firstname" value="<?= old("firstname"); ?>" placeholder="<?= trans('firstname') ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="lastname" id="lastname" value="<?= old("lastname"); ?>" placeholder="<?= trans('lastname') ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email" id="email" value="<?= old("email"); ?>" placeholder="<?= trans('email') ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="<?= trans('password') ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="<?= trans('confirm') ?>">
                                        </div>
                                        <!-- <div class="form-row mb-3">
                                            <div class="col-sm-12">
                                                <div class="custom-control custom-checkbox text-left">
                                                    <input type="checkbox" class="custom-control-input" id="terms">
                                                    <label class="custom-control-label font-14" for="terms">I Agree to Terms & Conditions of Orbiter</label>
                                                </div>                                
                                            </div>
                                        </div>  -->                         
                                      <!-- <button type="submit" name="submit" id="submit" class="btn btn-success btn-lg btn-block font-18">Register</button> -->
                                      <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="<?= trans('register') ?>">
                                    <!-- </form> -->
                                    <?php echo form_close(); ?>
                                    <p class="mb-0 mt-3">Already have an account? <a href="<?= base_url('admin/auth/login'); ?>">Log in</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Auth Box -->
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- End Containerbar -->
    <!-- Start js -->        
    
    <script src="<?= base_url()?>assets/js/popper.min.js"></script>
    <script src="<?= base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>assets/js/modernizr.min.js"></script>
    <script src="<?= base_url()?>assets/js/detect.js"></script>
    <script src="<?= base_url()?>assets/js/jquery.slimscroll.js"></script>
    <!-- End js -->
</body>
</html>