
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CMS App</title>

    <!-- Bootstrap -->
    
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <header>
          <nav class="navbar">
            <div class="container-edit">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="#">CMS</a>
                <span onclick="openNav()"><i class="fa fa-bars fa-2x"></i></span>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              
               
                <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="msg">35</span><i class="fa fa-envelope-open fa-lg"></i></a></li>
                  <li><a href="#"><span class="noti">15</span><i class="fa fa-flag fa-lg"></i></a></li>

                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="img-circle" alt="" src="images/millier.jpg"> 
                    <span>eslam</span>
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                     <li class="show-profile"> <img class="img-circle text-center" alt="" src="images/millier.jpg"> 
                        <p class="lead text-center">eslam</p>
                        <button class="btn btn-default">Profile</button>
                        <button class="btn btn-danger pull-right">Logout</button>
                      </li>
                    </ul>
                  </li>


                  <li><a href="#"><i class="fa fa-globe fa-lg"></i></a></li>

                </ul>
           
            </div><!-- /.container-fluid -->
          </nav>
    </header>

    <section class="sidebar">
     
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <button class="accordion">Section 1</button>
          <div class="panel1">
            <p>Lorem ipsum...</p>
          </div>

          <button class="accordion">Section 2</button>
          <div class="panel1">
            <p>Lorem ipsum...</p>
          </div>

          <button class="accordion">Section 3</button>
          <div class="panel1">
            <p>Lorem ipsum...</p>
          </div> 
      </div>

    </section>

    <!-- Start Section Content -->
    <div id="main">
      <section class="content">
        <div class="container">
          <?= $content ?>
        </div>
      </section>
    </div>
    <!-- End Section Contetnt -->
    <footer>
        <!-- Content Footer -->
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/form-validator/jquery.form-validator.min.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/<?= App::getInstance()->cur_page; ?>.js"></script>
    <script src="js/custom.js"></script> 
  </body>
</html>