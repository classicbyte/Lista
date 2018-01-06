<?php include('../controlador/encryp.php'); ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    
    <!-- Meta Tag -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO -->
    <meta name="description" content="150 words">
    <meta name="author" content="uipasta">
    <meta name="url" content="http://www.yourdomainname.com">
    <meta name="copyright" content="company name">
    <meta name="robots" content="index,follow">
    
    
    <title>.::ConLista::..</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" type="image/x-icon" href="images/favicon/apple-touch-icon.png">
    
    <!-- All CSS Plugins -->
    <link rel="stylesheet" type="text/css" href="css/plugin.css">
    
    <!-- Main CSS Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <!-- Google Web Fonts  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">
    
    
    <!-- HTML5 shiv and Respond.js support IE8 or Older for HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script language="JavaScript">
      function maximaLongitud(texto,maxlong)
      {
      var tecla, int_value, out_value;

      if (texto.value.length > maxlong)
      {
      /*con estas 3 sentencias se consigue que el texto se reduzca
      al tamaño maximo permitido, sustituyendo lo que se haya
      introducido, por los primeros caracteres hasta dicho limite*/
      in_value = texto.value;
      out_value = in_value.substring(0,maxlong);
      texto.value = out_value;
      alert("No puedes exceder los " + maxlong + " caractéres");
      return false;
      }
      return true;
      }
    </script>
    

 </head>

  <body>
    
    
	
	<!-- Preloader Start -->
    <div id="preloader">
	  <div class="loader"></div>
    </div>
    <!-- Preloader End -->

    
    
    <!-- HEADER Home & Menu -->
    <header id="home" class="home-section">
        
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                
                    <div class="col-sm-3">
                        <div class="logo">
                            <a href="index.php">..::Con Lista::..</a>
                        </div>
                    </div>
                    
                    <div class="col-sm-9">
                        <div class="navigation-menu">
                            <div class="navbar">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="active"><a class="smoth-scroll" href="#home">Inicio <div class="ripple-wrapper"></div></a>
                                        </li>
                                        <li><a class="smoth-scroll" href="#contact">Contacto</a>
                                        </li>
                                        <li><a class="smoth-scroll" href="../vista/login.php">Iniciar Sesión</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="home-section-background" data-stellar-background-ratio="0.6">
            <div class="display-table">
                <div class="display-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="header-text">
                                    <p></p>
                                    <h2><span class="typing"></span></h2>
                                    
                                    <div class="margin-top-60">
                          <a class="button button-style button-style-icon fa fa-long-arrow-right " href="#contact">Registrate Gratis</a>
                                  </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </header>
    <!-- Home & Menu Section End-->
         
    <!-- Contact Start -->
    <section id="contact" class="contact-us section-space-padding">
       <div class="container">
          <div class="row">
              <div class="col-sm-12">
                  <div class="section-title">
                    <h2>Contactanos</h2>
                    <br>
                  </div>
              </div>
          </div>
                        
         
          <div class="row">
            <div class="col-md-6">  
              <div class="row">
                <form method='post' action='../controlador/registrouser.php' enctype='application/x-www-form-urlencoded'>      
        					<div class="col-sm-6">
            				<div class="form-group">
            				  <input type="text" id="name" name="nombre" class="form-control" placeholder="Nombre..." required>
            			  </div>
                  </div>
        								
                  <div class="col-sm-6">
          					<div class="form-group">
          					 <input type="email" id="email" name="correo" class="form-control" placeholder="Correo..." required>
          					</div>
                  </div>
                                
                  <div class="col-sm-6">
            				<div class="form-group">
            				  <input type="text" id="website" name="whatsapp" class="form-control" placeholder="Whatsapp.." required>
            				</div>
                  </div>
                                  
                  <div class="col-sm-6">
            				<div class="form-group">
            				  <input type="text" id="address" name="facebook" class="form-control" placeholder="facebook.com/tu_facebook..." required>
            				</div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <input type="text" id="address" name="instagram" class="form-control" placeholder="instagram.com/tu_instagram..." required>
                    </div>
                  </div>

                  <div class="col-sm-12">
          					<div class="textarea-message form-group">
          					  <textarea onkeyup="return maximaLongitud(this,100)" id="message" name="mensaje" class="textarea-message form-control" placeholder="Deja tu mensaje... Maximo 100 caracteres." rows="5"></textarea>
          					</div>
                  </div>
                           
                           
                  <div class="text-center">      
        		        <button type="submit" class="button button-style button-style-dark button-style-icon fa fa-long-arrow-right text-center">Enviar</button>
        	        </div>        
                </form>
                <div class="container-fluid">
                  <?php
                  if(isset($_GET['err'])){
                    $resultado=decrypt($_GET['err'],"KEY");
                    if ($resultado==1) {
                      echo '<div class="alert alert-success" role="alert"><center><h4><strong>Gracias </strong>hemos recibido tu mensaje, nos contactaremos a la brevedad.</center></h4></div>';
                    }elseif ($resultado==2) {
                      echo '<div class="alert alert-danger" role="alert"><center><h4><strong>Error</strong> comprueba tu conexion a internet.</center></h4></div>';
                    }elseif ($resultado==3) {
                      echo '<div class="alert alert-danger" role="alert"><center><h4>El <strong>CORREO</strong> ya esta en uso!</center></h4></div>';;
                    }
                  }
                  ?>  
                </div>

    				  </div>
            </div>
              
              
            <div class="col-md-6">   
            <div id="my-address" class="map space-set">
            <p>Problemas de conexion</p>
            </div>
            </div>
          </div>
      </div>
       
      <div class="margin-top-80">
        <center><p>¡Visitanos!</p></center>
       <ul class="social-icon">
         <li><a href="#" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
         <li><a href="#" target="_blank" class="twitter"><i class="fa fa-whatsapp"></i></a></li>
         <li><a href="#" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a></li>
       </ul>
      </div>
       
     </section>
     <!-- Contact End -->
       
        
        
        
    <!-- Footer Start -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
               
      <div class="col-md-4 text-left">
       <p><span><a href="#about" class="smoth-scroll"></a></span>  <span><a href="#portfolio" class="smoth-scroll"></a></span></p>
          </div>
               
            <div class="col-md-4 text-center">
               <p>A poca luz</p>
               </div>
              
             <div class="col-md-4 uipasta-credit text-right">
                <p> <a href="http://www.uipasta.com" target="_blank" title="UiPasta"></a></p>
                </div>
                
             </div>
        </div>
    </footer>
    <!-- Footer End -->
    
    
    <!-- Back to Top Start -->
    <a href="#" class="scroll-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- Back to Top End -->
    
    
    <!-- All Javascript Plugins  -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/plugin.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyC0HAKwKinpoFKNGUwRBgkrKhF-sIqFUNA"></script>
    
    <!-- Main Javascript File  -->
    <script type="text/javascript" src="js/scripts.js"></script>
  
  
  </body>
 </html>