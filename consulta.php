<?php
header("Content-Type: text/html; charset=UTF-8",true) ;
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set("America/Sao_Paulo");

include("../topo.php")?>

<div id="content">
  <section id="two" class="section swatch-white">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <header class="text-center element-small-top element-medium-bottom not-condensed ">
          <h1 class="super hairline bordered bordered-normal"> Consulta Contatos </h1>
        </header>
        <div class="row">
          <div class="col-md-12">
            <div class="row">              
              <form action="" method="POST" name="fumulario" id="fumulario">
            <?php
              $curl = curl_init();
              curl_setopt_array($curl, array(
                CURLOPT_URL => "https://svapp.smark.com.br:446/v1/AuthenticationMobile/SignIn",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS =>"{ \"subDominio\": \"spsp\", \"login\": \"integracao\", \"senha\": \"spspmaster2019\" }",
                CURLOPT_HTTPHEADER => array(
                  "Content-Type: application/json"),
              ));

              $response = curl_exec($curl);
              $err = curl_error($curl);
              curl_close($curl);

              for ($i = 10; $i < 102; $i++) {
                @$Token .= $response[$i];}

              if ($err) {
                echo "cURL Error #:" . $err;
              } else {
                echo "<input hidden name='Token' value='$Token' />";}
          ?>
                <div class="col-md-2"></div>
                <div class="col-md-4">
                  <div class="form-group form-icon-group">Data Ini: <br />
                    <input type="date" class="form-control" name="data1" id="data1" >
                  </div>
                </div>                  
                <div class="col-md-4">Data Fim:<br />
                  <input type="date" class="form-control" name="data2" id="data2" >
                </div>				  
                <div class="col-md-12">
                <div class="col-md-4 col-sm-2 col-xs-1"></div>
                  <div class="col-md-4 col-sm-8 col-xs-10 text-center small-screen-left ">
                    <input type="submit" value="Consultar" class="btn btn-primary col-md-4 element-short-top element-normal-bottom" id="submit" onclick="enviar();">
                    <div class="col-md-2"></div>
                    <a href="../logado.php" type="submit" class="btn btn-primary col-md-4 element-short-top element-normal-bottom" name="idx"> Voltar </a>
                  </div>
                </div>
              </form>
            </div>
          <div class="col-md-4 col-sm-2 col-xs-1"></div>            
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">       
  function enviar() {
    document.fumulario.action = "relatorio.php";
    document.fumulario.target = "";}
</script>