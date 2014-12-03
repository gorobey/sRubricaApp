<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="<?=base_url('assets/favicon.ico');?>">
      <title>Signin to sRubricAPP</title>
      <!-- Bootstrap core CSS -->
      <link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="<?=base_url('assets/css/signin.css');?>" rel="stylesheet">
      <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
      <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script>
         $(document).ready(function(){
             $('.container').fadeIn('slow');
             
            $("#registerForm").submit(function(e){
            $.ajax({

                url: "<?= base_url('index.php/register'); ?>",
                type: "POST",
                data: $(this).serialize(),

                success: function(data)
                {
                    if(data == 1)
                    {
                        $("#registerForm").after('<div class="alert alert-success" role="alert"><i class="glyphicon glyphicon-ok"></i> Please login with the account just created.</div>');
                    }
                    else if(data == 2) 
                    {
                       $("#email").addClass("has-error");
                       
                       if($('#validationErrorEmail').length == 0) 
                       {
                            $('#registerIntro').after('<div class="alert alert-danger" role="alert" id="validationErrorEmail"><i class="glyphicon glyphicon-ban-circle" style="float:left;"></i> Email in use. Did you forget your password?</div>');
                       }
                    }
                    else if (data == 3)
                    {
                        $("#password").addClass("has-error");
                        $("#passwordRetype").addClass("has-error");
                        if($('#validationErrorPassword').length == 0)
                        {
                            $('#registerIntro').after('<div class="alert alert-danger" role="alert" id="validationErrorPassword"> <i class="glyphicon glyphicon-ban-circle" style="float:left;"></i> The passwords don\'t match. Please retype them.</div>');
                        }
                    }
                    else
                    {
                        $("#email").addClass("has-error");
                    }
                },
                
                error: function(data)
                {
                    alert('Something went wrong. Please retry later!');
                }
                });
                e.preventDefault();
            }); 
         });


     
         
      </script>
   </head>
   <body>
      <div class="container">
        <div class="form-signin">
            <?= form_open('verifylogin') ?>     
                <h1>Welcome to <strong>sRubricAAP</strong>!</h1>
                <img src="<?=base_url('assets/images/logo.png');?>" alt="sRubricAPP Logo" >
                <h2 class="form-signin-heading" id="signInMessage">Please sign in</h2>
                <?php if(isset($login_error)) echo $login_error; ?>
                <div class="right-inner-addon">
                   <i class="glyphicon glyphicon-user"></i>
                   <input type="email" name="email" class="form-control" placeholder="Email address" value="" required autofocus>
                </div>
                <div class="right-inner-addon">
                    <i class="glyphicon glyphicon glyphicon-cog"></i>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                </label>

                <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
            </form>
            <div class="btn-group btn-group-justified">
                <div class="btn-group" id="about-btn">
                   <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#aboutModal">
                   About
                   </button>
                </div>
                <div class="btn-group" id="register-btn">
                   <button class="btn btn-primary btn-lg " data-toggle="modal" data-target="#registerModal">
                   Register
                   </button>
                </div>
                
            </div>
         </div> <!-- /form-signin -->
      </div>  <!-- /container -->
      
        <div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      <h4 class="modal-title">About</h4>
                   </div>
                   <div class="modal-body">
                      <p>This web-app has been made for studying purpose. Many technologies has been used developing this site:</p>
                      <dl class="dl-horizontal">
                         <dt>CodeIgniter:</dt>
                         <dd>Backend, it's a framework MVC made in PHP. <a href="" title="">More</a></dd>
                      </dl>
                      <dl class="dl-horizontal">
                         <dt>Bootstrap:</dt>
                         <dd>Frontend, it's a framework to make beautiful webpages! <a href="" title="">More</a></dd>
                      </dl>
                      <dl class="dl-horizontal">
                         <dt>PostgreSQL:</dt>
                         <dd>Database, it's a great Open Source DBMS. <a href="" title="">More</a></dd>
                      </dl>
                      <dl class="dl-horizontal">
                         <dt>Koding:</dt>
                         <dd>Cloud IDE, it gives you a complete online IDE with a VM and online editor. <a href="" title="">More</a></dd>
                      </dl>
                   </div>
                   <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               <h4 class="modal-title">Register</h4>
            </div>
            <div class="form-signin">
               <div class="modal-body">
                  <p id="registerIntro">Once registered to sRubricApp, you'll be able to login and use your newly created contacts book.</p>
                  
                  <form id="registerForm" data-async method="post" action="<?= base_url('index.php/login_c/registerUser'); ?>" role ="form" accept-charset="utf-8">
                     <div class="right-inner-addon" id="email">
                        <i class="glyphicon glyphicon-user"></i>
                        <input type="email" name="email" class="form-control" placeholder="Email address" value="" required autofocus>
                     </div>
                     <div class="right-inner-addon" id="password">
                        <i class="glyphicon glyphicon glyphicon-cog"></i>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                     </div>
                     <div class="right-inner-addon" id="passwordRetype">
                        <i class="glyphicon glyphicon glyphicon-cog"></i>
                        <input type="password" name="passwordagain" class="form-control" placeholder="Retype Password" required>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Register" id="registerButton">
                     </div>
               </div>
               </form>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- Bootstrap core JavaScript
         ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
   </body>
</html>