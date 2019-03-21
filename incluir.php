<?php
session_start();
header("Content-Type: text/html; charset=UTF-8",true) ;
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set("America/Sao_Paulo");
include("config.php");

$date = date('d/m/Y');
$sql=mysqli_query($mysqli,"SELECT codigo from tarefa order by codigo desc LIMIT 1");
$aux = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$cod= $aux['codigo'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Insert</title>
<meta name="Charset" content="UTF-8"/>
<meta name="Distribution" content="Global"/>
<meta name="Rating" content="General"/>
<meta name="Robots" content="INDEX,FOLLOW"/>
<meta name="Revisit-after" content="31 Days"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,300italic,400italic,600italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body class="normal-header">
<div id="masthead" class="navbar navbar-static-top swatch-white navbar-sticky" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand"> <img src="assets/images/tasks.png" alt="Tarefas"> </a> </div>
    <nav class='collapse navbar-collapse main-navbar' role='navigation'>
      <ul id='menu-one-page' class='nav navbar-nav navbar-center'><br />        
        <font size="5" align="center"><b>Tarefas Online</b></font>
      </ul>
    </nav>
  </div>
</div>
<div id="content">
  <article>
  <section id="two" class="section swatch-white">
  <div class="container" style="padding-bottom: 180px;">
    <div class="row">
      <div class="col-md-12">
        <header class="text-center element-small-top element-small-bottom not-condensed"><br />
          <h1 class="super hairline bordered bordered-normal"> Incluir Tarefas </h1>
        </header><br />
        <div class="row">
          <div class="col-md-12">
            <form id="form" name="form" method="POST" action="inc_tarefa.php">
              <div class="row" style="background-color: lightgray;"><br />

                <div class="col-md-6  col-sm-6 col-xs-12 text-left small-screen-center">
                  <div class="col-md-12">Data Abertura:
                    <div class="form-group form-icon-group">
                      <input hidden name="cod" size="50" type="text" value="<?php echo $cod; ?>"/>
                      <input class="form-control" name="dt" size="50" type="text" value="<?php echo $date; ?>" readonly/>
                      <br />
                    </div>
                  </div>
                </div>
                
                <div class="col-md-6  col-sm-6 col-xs-12 text-left small-screen-center">
                  <div class="col-md-12">Título:
                    <div class="form-group form-icon-group">
                      <input class="form-control" name="tit" id="text" type="tit" value=""/>
                      <br />
                    </div>
                  </div>
                </div>
                
                <div class="col-md-6  col-sm-6 col-xs-12 text-left small-screen-center">
                  <div class="col-md-12">Ocorrência:
                    <div class="form-group form-icon-group">
                      <input class="form-control" name="ocr" id="ocr" size="20" type="text" value=""/>
                      <br />
                    </div>
                  </div>
                </div>               
                  
                <div class="col-md-6  col-sm-6 col-xs-12 text-left small-screen-center">
                  <div class="col-md-6"><br>
                    <div class="form-group form-icon-group">
                      <input class="form-control" type="submit" value="Gravar" />
                      <br />
                    </div>
                  </div>
                  <div class="col-md-6"><br>
                    <a href="dashboard.php" type="submit" class="btn btn-primary col-md-12 element-normal-bottom"> Voltar </a>
                  </div>
                </div>

            </div>          
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</article>
</div>