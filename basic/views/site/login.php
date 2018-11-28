<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0">
        <title>Sistema de Gestion de Aulas</title>

    <style>

        .cuerpo{
            display: block;
            margin: auto;
        }        
    </style>

    <link type="image/png" href="../image/favicon_unaj.png" rel="icon">
<link href="/assets/d9f50e15/css/bootstrap.css" rel="stylesheet">
<link href="/css/inicio.css" rel="stylesheet">
<link href="/css/site.css" rel="stylesheet">
<link href="/css/index.css" rel="stylesheet">    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
</head>

<body class="iniciocs" >


<div class="wrap">

    <nav id="w0" class="navbar navbar-default" style="height:52px;"><div class="container-fluid"><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse"><span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span></button><a class="navbar-brand" href="/"><img src="../image/logo3.png"; class="img-responsive"></a></div><div id="w0-collapse" class="collapse navbar-collapse"><ul id="w1" class="navbar-nav navbar-right nav"><li><a href="#"><a class="btn btn-add-al" href="/site/index" style="top: -32px; font-weight: bold;"><i class="glyphicon glyphicon-home"></i> INICIO</a></a></li>
<li><a href="#"><button type="button" id="modalLogin" class="btn btn-add-al" value="/site/loginbox" style="position:relative; top:-8px; font-weight: bold; background-color: Transparent;"><i class="glyphicon glyphicon-log-in"></i> INGRESAR</button></a></li></ul></div></div></nav>

    <!-- SLIDER -->
    <div class="cuerpo">
                        

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="../image/banner_site1.png" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="../image/banner_site2.png" alt="Chicago">
    </div>

    <div class="item">
      <img src="../image/banner_site3.png" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>





 
 

    </div>
</div>
<!-- footer comentado -->
<!-- <div class="footer">
  <p>Proyecto de Software - Universidad Nacional Arturo Jauretche</p>
</div> -->



<div id="modal" class="fade modal" role="dialog" tabindex="-1">
<div class="modal-dialog modal-md">
<div class="modal-content">
<div id="modalHeader" class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

</div>
<div class="modal-body">
<div id='modalContent'></div>
</div>

</div>
</div>
</div>
    
<div id="modalRestri" class="fade modal" role="dialog" tabindex="-1">
<div class="modal-dialog modal-md">
<div class="modal-content">
<div id="modalRestriHeader" class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

</div>
<div class="modal-body">
<div id='modalRestriContent'></div>
</div>

</div>
</div>
</div>    
     <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Informacion del evento</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idevento" name="idevento" value="">
            Comision:
            <div class="well well-sm">
                <p id="showcomision"></p>
            </div>
            Inicio:
            <div class="well well-sm">
                <p id="showini"></p>
            </div>
            Fin:
            <div class="well well-sm">
                <p id="showfin"></p>
            </div>
            Ultimo usuario que modifico:
            <div class="well well-sm">
                <p id="showusermodifico"></p>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default"  data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-danger" id="btnBorrarEvento">Borrar</button>
        </div>
      </div>
      
    </div>
  </div>



<script src="/assets/b10b5961/jquery.js"></script>
<script src="/assets/9e060d6/yii.js"></script>
<script src="/js/main.js"></script>
<script src="/assets/d9f50e15/js/bootstrap.js"></script>
<script>jQuery(function ($) {
jQuery('#modal').modal({"show":false,"backdrop":true,"keyboard":true});
jQuery('#modalRestri').modal({"show":false,"backdrop":true,"keyboard":true});
});</script>


</body>



</html>

