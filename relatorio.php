<?php
header("Content-Type: text/html; charset=UTF-8",true) ;
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set("America/Sao_Paulo");

include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Tasks</title>
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
        <font size="5" align"center"><b>Tarefas Online</b></font>
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
        <header class="text-center element-small-top element-medium-bottom not-condensed ">
          <h1 class="super hairline bordered bordered-normal"> Relatorio </h1>
        </header>
        <div class="row">
          <div class="col-md-12">
            <div class="row">              
                <form method="POST" id="form_index" name="form_index" action="relatorio.php">
				<div class="col-md-2"></div>
                <div class="col-md-4">
                  <div class="form-group form-icon-group">Data Ini: <br />
                    <input type="date" class="form-control" name="data1" id="data1" >
                  </div>
                </div>                  
                <div class="col-md-4">Data Fim:<br />
                  <input type="date" class="form-control" name="data2" id="data2" >
                </div>
				<div class="form-group has-feedback">
                <div class="col-md-12">
                <div class="col-md-4 col-sm-2 col-xs-1"></div>
                  <div class="col-md-4 col-sm-8 col-xs-10 text-center small-screen-left ">
				  <input type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12" value="Consultar">				
                    <div class="col-md-2"></div>                    
                  </div>
                </div>
				</div>                  
                </form><br /><br />				                        
          </div>
        </div>
      </div>
	  <div class="row">
        <div class="col-md-12">
		  <table id='example' class='table table-bordered table-striped' style='width: 100%; text-align: center; text-transform:uppercase; text-align: center;' align='center'>
            <thead>
            <tr role='row' style='background-color: bisque;'>
              <th class='text-center' style='padding: 5px;'>Nº Tarefa</th>
              <th class='text-center' style='padding: 5px;'>Título</th>
              <th class='text-center' style='padding: 5px;'>Data Tarefa</th>
              <th class='text-center' style='padding: 5px;'>Ocorrência</th>
              <th class='text-center' style='padding: 5px;'>Status</th>                      
            </tr>
            </thead>
            <tbody>
        <?php
			@$dt1 = $_POST['data1'];
			@$dt2 = $_POST['data2'];

			$sql=mysqli_query($mysqli,"SELECT * from tarefa where dt_ini between '$dt1' and '$dt2'");
			$aux = mysqli_fetch_array($sql, MYSQLI_ASSOC);
            while($aux = mysqli_fetch_array($sql)){
			echo "
			  <tr role='row' style='background-color: bisque;'>
				<td>".$aux['codigo']."</td>
				<td>".$aux['titulo']."</td>
				<td>".$aux['dt_ini']."</td>
				<td>".$aux['ocorrencia']."</td>
				<td>".$aux['status']."</td>
			  </tr>";}
        ?>
		</tbody>
		</table>
    </div>
  </div>
</section>
</article>
</div>
<script src="./assets/js/packages.min.js"></script> 
<script src="./assets/js/theme.min.js"></script>
</body>
</html>