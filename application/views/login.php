<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SiLab Undiksha </title>

    <!-- Bootstrap core CSS -->

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/icheck/flat/green.css" rel="stylesheet">


    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    </head>

<body style="background:#F7F7F7;">
    
      <div class="">

        <div id="wrapper">
            <div id="login" class="animate form">


            <section class="login_content">
            <img src="<?=base_url();?>assets/images/undiksha.png" width="250px" height="250px" style="display: block; margin: auto"/>
                    <form action="<?=site_url('Login/aksi_login')?>" method="post">
                    <h1>SiLab</h1>
                    <h1><tyle="font-size: 26px;></i>Sistem Inventaris Laboratorium</h1>
                        
                        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="nama">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
								<?php
                                                                    $info = $this->session->flashdata('info');
                                                                    if(!empty($info))
                                                                    {
                                                                        echo $info;
                                                                    }
                                                                ?>						
                        <div>
                            <button type="submit" class="btn btn-default submit">Log in</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />
                            <div>
                            <p>Selamat Datang di Login Admin. Silahkan masukan Username dan Password Anda</p>  

                               
                            </div>
                        </div>
                       
                    <?php echo form_close(); ?>
                    <!-- form -->
                </section>
            </div>

        </div>
    </div>
  </body>

</html>
