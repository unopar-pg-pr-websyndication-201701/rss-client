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
    .search{
      clear: both;
    }
    #livesearch{
      
    }
    img{
      width: 150px;
      height: 150px;
    }
    .data{
      width: 200px !important;
      margin:0 0 20px 0;
    }
    hr{
      margin-top: 10px !important;
      margin-bottom: 60px !important;
      border-top: 5px solid #eee !important;
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
    <section id="busca">
      <div class="container">
        <form class="form-group">
          <div class="marginTopo">
            <div class="col-md-6 col-md-offset-3">
              <h3>URL da notícia</h3>
              <input type="text" class="form-control" size="30" id="url"></br>
            </div>
            <div class="col-md-6 col-md-offset-3">
              <h3>Periodo</h3>
              <input type="date" id="data" class="form-control data">
              <button type="button"  class="btn btn-primary" onclick="busca();">Buscar</button>
            </div>
        </form>
        <div class="search">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <div id="livesearch">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
<script type="text/javascript">
function busca(){

  var data  = $("#data").val();
  var url = $("#url").val();
  showResult(url, data);
};
</script>
