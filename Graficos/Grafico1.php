<?php
require_once ('../jpgraph/jpgraph.php');
require_once ('../jpgraph/jpgraph_line.php');
require_once ('../jpgraph/jpgraph_bar.php');
$x_axis=array();
$y_axis=array();
$i=0;

//$con= mysqli_connect("localhost", "root","","ventas");

$host = 'eurekabankdb.mysql.database.azure.com';
$username = 'eurekabank@eurekabankdb';
$password = '3ur3K4B@nk';
$db_name = 'ventas';

$con = mysqli_init();
mysqli_real_connect($con, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($con)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}


//if(mysqli_connect_errno()){
//    echo "Error";
//    }
    
	$result= mysqli_query($con, "select * from producto");
    while($row= mysqli_fetch_array($result)){
        $x_axis[$i]=$row["pro_descripcion"];
        $y_axis["$i"]=$row["pro_cantidad"];
        $i++;
    }
    mysqli_close($con);
    $width=900;
    $height=500;
    $graph=new Graph($width,$height);
    $graph->SetScale('textint');
    $graph->title->Set("Reporte de Productos");
    $graph->xaxis->title->Set("PRODUCTOS");
    $graph->xaxis->SetTickLabels($x_axis);
    $graph->yaxis->title->set("CANTIDAD");
    $barplot=new BarPlot($y_axis);
    $graph->Add($barplot);
    $graph->Stroke();

?>