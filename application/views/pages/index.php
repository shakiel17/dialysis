<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>MedMatrix e-Health Solutions, Inc.</title>
    <link rel="icon" href="<?=base_url('design/assets/images/medmatrix-logo.png');?>" type="image/x-icon"> <!-- Favicon-->
    <!-- project css file  -->
    <link rel="stylesheet" href="<?=base_url('design/assets/css/my-task.style.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('design/assets/css/loader.css');?>">
    <style type="text/css">
		#loader{
			display: none;
		}		
	</style>
</head>

<body style="background: url(<?=base_url('design/assets/images/medmatrix-logo.png');?>) no-repeat; background-size:cover;">

<div id="mytask-layout" class="theme-indigo">

    <!-- main body area -->
    <div class="main p-2 py-3 p-xl-5 ">
        
        <!-- Body: Body -->
        <div class="body d-flex p-0 p-xl-5">
            <div class="container-xxl">

                <div class="row g-0">                    
                    <div class="col-lg-12 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                        <div class="w-100 p-3 p-md-5 card border-0 bg-dark text-light" style="max-width: 32rem;">
                            <!-- Form -->                                                            
                                <div class="col-12 text-center mb-1 mb-lg-5">
                                    <h1>Renal Dialysis Unit</h1>
                                    <span>Login Portal</span>
                                </div>                                                                
                                <div class="box" id="loader" align="center">
                                    <div class="loader"></div>
                                </div>
                                <form action="<?=base_url('authenticate');?>" class="row g-1 p-3 p-md-4" id="login" method="POST">
                                <input type="hidden" name="dept" value="RDU">
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control form-control-lg" placeholder="" name="username">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <div class="form-label">
                                            <span class="d-flex justify-content-between align-items-center">
                                                Password
                                                <!-- <a class="text-secondary" href="auth-password-reset.html">Forgot Password?</a> -->
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg" placeholder="" name="password">
                                    </div>
                                </div>
                                
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase" atl="signin">SIGN IN</a>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <span class="text-muted">Don't have an account yet? <a href="#" class="text-secondary">Sign up here</a></span>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                </div> <!-- End Row -->
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="<?=base_url('design/assets/bundles/libscripts.bundle.js');?>"></script>
<script>
	$(document).ready(function(){
		$('#login').submit(function(){
			document.getElementById('loader').style.display = "block";
			document.getElementById('login').style.display = "none";
		 });
	});
</script>
</body>
</html>