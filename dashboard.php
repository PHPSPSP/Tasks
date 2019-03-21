<?php
header("Content-Type: text/html; charset=UTF-8",true) ;
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set("America/Sao_Paulo");
include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tarefas | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">        
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">    
    <section class="content">      
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">              
              <li class="pull-left header"><i class="fa fa-inbox"></i> Tarefas | Status: ABERTAS</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Tables -->
			  <div class="row">
              <div class="col-md-12 small-screen-center">
                <form method="POST" action="" name="form_dash" id="form_dash">
                <table id="example" class="table table-bordered table-striped" style="width: 100%; text-align: center; text-transform:uppercase; text-align: center;" align="center" role="grid">
                  <thead>
                  <tr role="row" style="background-color: bisque; text-align: center;">              
				    <th>Nº Tarefa</th>
				    <th>Título</th>
				    <th>Dt. Abertura</th>
				    <th>Status</th>
				  </tr>
				  </thead>
				<body>
				<?php
					$sql=mysqli_query($mysqli,"SELECT * from tarefa where status='ABERTA' order by dt_ini desc LIMIT 10");
                    while($aux = mysqli_fetch_array($sql)){
                      echo "
                      <tr role='row' style='background-color: bisque;'>
						<td>".$aux['codigo']."</td>
						<td>".$aux['titulo']."</td>
						<td>".$aux['dt_ini']."</td>
						<td>".$aux['status']."</td>
					  </tr>";}
				?>
				  </body>
				</table>
			  </div>
			  </div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->          
          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">To Do List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js  -->
              <ul class="todo-list">                  
			  <?php
				$sql2=mysqli_query($mysqli,"SELECT * from tarefa where status='ANDAMENTO' order by dt_ini desc LIMIT 10");
				while($aux = mysqli_fetch_array($sql2)){                      
				   echo "<li>
					<!-- drag handle -->
					<span class='handle'>
						<i class='fa fa-ellipsis-v'></i>
						<i class='fa fa-ellipsis-v'></i>
					</span>
					<!-- todo text -->
					<span class='text'>".
						$aux['codigo']." - ".$aux['titulo']." - ".$aux['status']."</span>";
					echo "<!-- General tools such as edit or delete-->
						<div class='tools'>
						  <a href='editar.php?id=".$aux['id']."'><i class='fa fa-edit'></i></a>						  
						  <a href='excluir.php?id=".$aux['id']."'><i class='fa fa-trash-o'></i></a>
						</div>
					</li>";							
				}
			  ?>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right" name="9" id="9"><i class="fa fa-plus"></i><a href="incluir.php"> Nova Tarefa</a></button>
            </div>
          </div>
          <!-- /.box -->

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-file-powerpoint-o"></i>

              <h3 class="box-title">Relatório </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove" name="8" id="8">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="" method="POST" name="formulario" id="formulario">                
                <div class="col-md-12">
                <div class="col-md-4 col-sm-2 col-xs-1"></div>
                  <div class="col-md-4 col-sm-8 col-xs-10 text-center small-screen-left ">
				    <a type="button" class="btn btn-default pull-right" name="btn1" href="relatorio.php">Relatório
				    <i class="fa"></i></a>					
                    <div class="col-md-2"></div>                    
                  </div>
                </div>
              </form>
            </div>            
          </div>

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
        </section>        
      </div>      
    </section>
  <div class="control-sidebar-bg"></div>
</div>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<script type="text/javascript">
$("form[name=formulario]").on("click", "a.submit-on-click", function() {
    var form = $(this).closest('form')[0];	
    form.action = "relatorio.php";
    form.submit();
});
</script>
</body>
</html>