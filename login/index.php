<?php session_start();
require_once ("connection/connection.php");

if (@$_GET["get"]=="delete"):
session_destroy();
endif;
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Rüstəmov Tamerlan">
    <title>ShiftLab | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="font/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section class="fxt-template-animation fxt-template-layout9" data-bg-image="img/figure/bg9-l.jpg">      
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-3">
                    <div class="fxt-header">
                        <a href="login-9.html" class="fxt-logo"><img src="img/icon.png" alt="Logo"></a>
                    </div>                
                </div>                
                <div class="col-lg-6">
                    <div class="fxt-content"> 
                        <h2>Hesabınıza daxil olun</h2>
                        <div class="fxt-form">
                 <!-- Form Start ***************************** -->
                            <form action="manager/authentication.php" method="POST">
                                <div class="form-group"> 
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">                                              
                                        <input type="email" id="email" class="form-control" name="poct" placeholder="Email" required="required">
                                    </div>
                                </div>
                                <div class="form-group">  
                                    <div class="fxt-transformY-50 fxt-transition-delay-2">                                              
                                        <input id="password" type="password" class="form-control" name="sifre" placeholder="********" required="required">
                                        <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-3">  
                                        <div class="fxt-checkbox-area">
                                            <div class="checkbox">
                                                <input id="checkbox1" type="checkbox" name="checkbox" value="checked">
                                                <label for="checkbox1">Hesabımı açıq tut</label>
                                            </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-4">  
                                        <button type="submit" class="fxt-btn-fill" name="btn">Daxil ol</button>
                                    </div>
                                </div>
                            </form>
                 <!-- Form Start ***************************** -->
                          </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>    
    <!-- jquery-->
    <script src="js/jquery-3.5.0.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <!-- Validator js -->
    <script src="js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>

</body>


<!-- Mirrored from affixtheme.com/html/xmee/demo/login-9.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jul 2020 10:02:46 GMT -->
</html>