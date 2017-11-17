<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet">
    <style>
        #content{
            position: relative;
            top:100px;
        }

        #login-box{
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }

        #login-body{
            margin: 0px 8px 20px 8px;
        }
    </style>
</head>

<body id="content">
    <div class="container-fluid">
        <div class="col-md-4"></div>
        <div class="col-md-4 col-xs-12" id="login-box">
            <div id="login-body">
                <div class="text-center">
                    <h2>Login</h2>
                </div>
                <?php echo validation_errors(); ?>
                <?php if(isset($error_msg)) echo '<p style="color:red">'.$error_msg.'</p>'?>
                <?php echo form_open('login'); ?>
                  <div class="form-group">
                    <label for="usernameField">Username</label>
                    <input type="text" class="form-control" id="usernameField" placeholder="Username" name="username">
                  </div>
                  <div class="form-group">
                    <label for="passwordField">Password</label>
                    <input type="password" class="form-control" id="passwordField" placeholder="Password" name="password">
                  </div>
                  <input type="submit" class="btn btn-default" value="Log In" name="login"/>
                  <a href="<?php echo site_url('/')?>" class="btn btn-danger" role="button">Back</a>

                  <!--
                    <span style="margin-left:4px; font-size:12px; position:relative; top:4px;">
                        <a href="<?php echo base_url('recover') ?>">Lupa password?</a>
                        <br>Belum punya akun? Silahkan <a href="<?php echo base_url('daftar') ?>">daftar di sini</a>.
                    </span>
                  -->
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</body>
</html>
