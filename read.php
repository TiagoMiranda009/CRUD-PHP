<?php
session_start();
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "db_crud";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
$x = 0;
$y = 0;
$z = 0;
$a = 0;
$b = 0;
$c = 0;

//percorre o banco
$result_niveis_ava = "SELECT * FROM usuarios ";
$resultado_niveis_ava = mysqli_query($conn, $result_niveis_ava);
while($row_niveis_ava = mysqli_fetch_assoc($resultado_niveis_ava)){
    if($row_niveis_ava['data_cadastro'] == "01/08/2021"){
        $x++;
    } else  if($row_niveis_ava['data_cadastro'] == "02/08/2021"){
        $y++;
    } else if($row_niveis_ava['data_cadastro'] == "03/08/2021"){
        $z++;
    }
    else if($row_niveis_ava['data_cadastro'] == "04/08/2021"){
        $a++;
    }
    else if($row_niveis_ava['data_cadastro'] == "05/08/2021"){
        $b++;
    }
    if($row_niveis_ava['data_cadastro'] == "06/08/2021"){
        $c++;
    }
}
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['DATA', 'QUANTIDADE'],
          ['01/08/2021',  <?=$x?>], //copia $x
          ['02/08/2021',  <?=$y?>], //copia $y
          ['03/08/2021',  <?=$z?>], //copia $z
          ['04/08/2021',  <?=$a?>],
          ['05/08/2021',  <?=$b?>],
          ['06/08/2021',  <?=$c?>]
          
        ]);
          //titulo do gráfico
        var options = {
          title: 'Cadastros'
        };

        var chart = new google.visualization.LineChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>

