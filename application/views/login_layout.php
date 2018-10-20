
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>SP3J</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
    <link href="assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="assets/vendors/animate.css/animate.min.css" rel="stylesheet" />
    <link href="assets/vendors/toastr/toastr.min.css" rel="stylesheet" />
    <link href="assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <!-- THEME STYLES-->
      <link href="<?php echo base_url() ?>assets/vendors/bootstrap-sweetalert/dist/sweetalert.css" rel="stylesheet" />
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <style>
        body {
            background-color: #f2f3fa;
        }

        .login-content {
            max-width: 400px;
            margin: 100px auto 50px;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
        }

        .auth-head-icon {
            position: relative;
            height: 60px;
            width: 60px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            background-color: #fff;
            color: #5c6bc0;
            box-shadow: 0 5px 20px #d6dee4;
            border-radius: 50%;
            transform: translateY(-50%);
            z-index: 2;
        }
    </style>
</head>

<body>
        
    <div class="row login-content">
        <div class="col-12 bg-white">
            <div class="text-center">
                <span class="auth-head-icon"><i class="la la-user"></i></span>
            </div>
            <div class="ibox m-0" style="box-shadow: none;">
                <form class="ibox-body" id="login-form" action="<?php echo base_url().'Login/doLogin' ?>" method="POST">
                    <h4 class="font-strong text-center mb-5">LOG IN</h4>
                    <div class="form-group mb-4">
                        <input class="form-control form-control-air" type="text" name="username" placeholder="Username">
                    </div>
                    <div class="form-group mb-4">
                        <input class="form-control form-control-air" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-fix btn-block btn-air" >LOGIN</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
        
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- CORE PLUGINS-->

    <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/vendors/jquery-idletimer/dist/idle-timer.min.js"></script>
    <script src="assets/vendors/toastr/toastr.min.js"></script>
    <script src="assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-sweetalert/dist/sweetalert.min.js"></script>

    <!-- PAGE LEVEL SCRIPTS-->
    
    <script>
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
        <?php if ($this->session->flashdata('result_submit')){ ?>
                    swal({
                        title: "Konfirmasi",
                        text: "<?php echo $result_submit['msg'] ?>",
                        timer: 1500,
                        showConfirmButton: false,
                        type: 'warning'
                    });
            <?php } ?>
    </script>
</body>
                    
</html>