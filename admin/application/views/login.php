<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User Authentication</title>
    
    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">
    
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets_log/img/metis-tile.png" />
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets_log/lib/bootstrap/css/bootstrap.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets_log/lib/font-awesome/css/font-awesome.css">
    
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets_log/css/main.css">
    
    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets_log/lib/metismenu/metisMenu.css">
    
    <!-- onoffcanvas stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets_log/lib/onoffcanvas/onoffcanvas.css">
    
    <!-- animate.css stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets_log/lib/animate.css/animate.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="login" style="padding-top:100px">

      <div class="form-signin">
    <div class="text-center">
        <img src="<?php echo base_url()?>image/logo.png" alt="Metis Logo" style="width:100px">
    </div>
    <br>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
        <form action="" method="post" accept-charset="utf-8">
	  <form accept-charset="UTF-8" role="form" class="form-signin">
                <p class="text-muted text-center">
                 <strong style="color:green">MTS MAHDALIYAH</strong> 
                </p>
                <input type="text" placeholder="Username" class="form-control top" name="username" id="username" required><?php echo form_error('username')?>
                <br>
                <input type="password" placeholder="Password" class="form-control bottom" name="password" id="password"><?php echo form_error('username')?>
                <div class="checkbox">
		  <label>
        
          </label>
          
		</div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            </form>
        </div>
        <div id="forgot" class="tab-pane">
            <form action="index.html">
                <p class="text-muted text-center">Enter your valid e-mail</p>
                <input type="email" placeholder="mail@domain.com" class="form-control">
                <br>
                <button class="btn btn-lg btn-danger btn-block" type="submit">Recover Password</button>
            </form>
        </div>
        <div id="signup" class="tab-pane">
            <form action="index.html">
                <input type="text" placeholder="username" class="form-control top">
                <input type="email" placeholder="mail@domain.com" class="form-control middle">
                <input type="password" placeholder="password" class="form-control middle">
                <input type="password" placeholder="re-password" class="form-control bottom">
                <button class="btn btn-lg btn-success btn-block" type="submit">Register</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="text-center">
       
            <a class="text-muted" href="#" data-toggle="tab">Copyright &copy<?=date('Y')?> All right Reserved</a>
            
    </div>
  </div>


    <!--jQuery -->
    <script src="<?php echo base_url()?>assets_log/lib/jquery/jquery.js"></script>

    <!--Bootstrap -->
    <script src="<?php echo base_url()?>assets_log/lib/bootstrap/js/bootstrap.js"></script>
    

    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                $('.list-inline li > a').click(function() {
                    var activeForm = $(this).attr('href') + ' > form';
                    //console.log(activeForm);
                    $(activeForm).addClass('animated fadeIn');
                    //set timer to 1 seconds, after that, unload the animate animation
                    setTimeout(function() {
                        $(activeForm).removeClass('animated fadeIn');
                    }, 1000);
                });
            });
        })(jQuery);
    </script>
</body>

</html>
