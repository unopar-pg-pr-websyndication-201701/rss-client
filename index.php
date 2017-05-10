<!DOCTYPE html>
<html>
    <head>
      <title>RSS</title>

      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="jquery.loading.css" />
  <style>
    .search{
      clear: both;
    }
    .marginTopo{
        margin-top: 80px;
      }    
    #livesearch{
      
    }
    img{
      width: 150px;
      height: 150px;
      max-width: 100%;
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
    body{
      background-color: white;
    }
  </style>    </head>
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
              <button type="button" class="btn btn-primary" onclick="busca();">Buscar</button>
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
    </section>
  </body>


      <script src="jquery-3.2.1.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <script src="jquery.loading.js"></script>
      <script src="js/modernizr.custom.js"></script>
  
<script type="text/javascript">
function busca(){

  var data  = document.getElementById("data").value;
  var url = document.getElementById("url").value;
  showResult(url, data);
};

 function showResult(str, datapesquisa) {
    $('body').loading({
      message:"Carregando Conteudo..."
    });
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
        $('body').loading('stop');
        document.getElementById("livesearch").innerHTML=this.responseText;

        //document.getElementById("date").innerHTML=this.value;
      }else if(this.readyState==4 && this.status!=200){
        $('body').loading('stop');
        //window.onload = function(){
          //$("#modal-mensagem").modal();
        //}
      alert('Ocorreu um erro no link do RSS !!!');
      }
      
    }
  }
</script>  
</html>

