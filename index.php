<?php 
  $url_atual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<style type="text/css">
  img {
    max-width: 100%;
  }
  .marginTopo{
    margin-top: 80px;
  }
</style>
<script type="text/javascript">


  function showResult(str, datapesquisa) {
    /*if (str.length==0) {
      document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").style.border="0px";
      return;
    }*/
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {  // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.open("GET", "exibir.php?q="+str+"&data="+datapesquisa,true);

    //xmlhttp.open("POST", "exibir.php?q="+str,true);
    xmlhttp.send();

    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {

        document.getElementById("livesearch").innerHTML=this.responseText;
        //document.getElementById("date").innerHTML=this.value;
      }
      
    }
  }

</script>

<!DOCTYPE html>
<html>
  <style>
    #livesearch{
      text-align: center;
    }
    img{
      width: 150px;
      height: 150px;
    }
  </style>
  <head>
    <head>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <script src="jquery-3.2.1.min.js"></script>
      <script src="masked.js"></script>
      <title>RSS</title>
    </head>
  </head>
  <body>
    <div class="container">
      <div class="col-md-12">
        <form class="form-group">
            <div class="marginTopo">
              <label class="col-md-12 col-md-offset-3" for="url">URL da Noticia</label>
              <div class="col-md-12 col-md-offset-3">
                <div class="col-md-5">
                  <input type="text" class="form-control" size="30" id="url"></br>
                </div>
              </div>
              <div class="col-md-12 col-md-offset-3">
                <div class="col-md-3">
                  <label>Periodo</label>
                  <input type="date" id="data" class="form-control"></br>
                  <button type="button"  class="btn btn-primary" onclick="teste();">Enviar</button>
                </div>
              </div></br>
        </form>
        <div id="livesearch">
        </div>
      </div>
    </div>
  </body>
</html>
<script type="text/javascript">
function teste(){

  var data  = $("#data").val();
  var url = $("#url").val();
  showResult(url, data);
};
</script>