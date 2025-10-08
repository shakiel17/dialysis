<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Maruti Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?=base_url('design/css/bootstrap.min.css');?>" />
		<link rel="stylesheet" href="<?=base_url('design/css/bootstrap-responsive.min.css');?>" />
        <link rel="stylesheet" href="<?=base_url('design/css/maruti-login.css');?>" />
        <link rel="icon" type="image/x-icon" href="<?=base_url('design/img/dialysislogo.png');?>">	
		<link rel="stylesheet" href="<?=base_url('design/css/maruti-media.css');?>" class="skin-color" />	
    </head>
    <body style="background:url(<?=base_url('design/img/dialysisbackground.jpg');?>) no-repeat; background-size: cover;">
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="<?=base_url('authenticate');?>" method="POST" id="basic_validate">
				 <div class="control-group normal_text"> <h3><img src="<?=base_url('design/img/dialysislogo.png');?>" alt="Logo" width="30" /> Hemodialysis Portal</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-user"></i></span><input type="text" name="username" placeholder="Username" required autocomplete="off"/>                             
                        </div>                       
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password" required />
                        </div>
                    </div>
                </div>
                <?php
                if($this->session->flashdata('remarks')){?>                
                <div class="alert alert-danger alert-block">
                    <?=$this->session->flashdata('remarks');?>
                </div>                            
                <?php
                }
                ?>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Login" /></span>
                </div>                
            </form>            
            <form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-info" value="Recover" /></span>
                </div>
            </form>
        </div>
        
        <script src="<?=base_url('design/js/jquery.min.js');?>"></script>  
        <script src="<?=base_url('design/js/maruti.login.js');?>"></script> 
    </body>

</html>
