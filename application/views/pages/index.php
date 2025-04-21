<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>MedMatrix e-Health Solutions, Inc.</title>
        <link rel="icon" href="<?=base_url('design/images/medmatrix-logo.png');?>" type="image/x-icon">
        <link rel="stylesheet" href="<?=base_url('design/css/login.css');?>">
    </head>
    <body>
    <div class="form-container">
        <h2>Renal Dialysis Unit</h2>
        <h3>Login Portal</h3>  
        <?=form_open(base_url('authenticate'));?>      
        <div class="input-box">
            <input type="text" placeholder=" ">
            <span>Username</span>
        </div>
        <div class="input-box">
            <input type="password" placeholder=" ">
            <span>Password</span>
        </div>
        <button type="submit" class="submit-btn">Login</button>
        <?=form_close();?>
    </div>
    </body>
</html>