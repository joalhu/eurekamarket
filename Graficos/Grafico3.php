<?php
require_once ('../jpgraph/jpgraph.php');
require_once ('../jpgraph/jpgraph_line.php');

$x_axis=array();
$y_axis=array();
$i=0;
$con= mysqli_connect("localhost", "root","","ventas");

if(mysqli_connect_errno()){
    echo "Error";
    }
    $result= mysqli_query($con, "select * from ventas_mensuales");
    while($row= mysqli_fetch_array($result)){
        $x_axis[$i]=$row["ven_mes"];
        $y_axis["$i"]=$row["ven_monto"];
        $i++;
    }
    mysqli_close($con);
  

// Setup the graph
$graph = new Graph(900,650);
$graph->SetScale("intlin",0,$aYMax=1000);
$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->SetBox(false);

$graph->title->Set('REPORTE DE VENTAS MENSUALES 2016');
$graph->ygrid->Show(true);
$graph->xgrid->Show(false);
$graph->yaxis->HideZeroLabel();
$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
$graph->SetBackgroundGradient('blue', '#55eeff', GRAD_HOR, BGRAD_PLOT);
$graph->xaxis->SetTickLabels(array('ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SETIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'));

// Create the line
$p1 = new LinePlot($y_axis);
$graph->Add($p1);

$p1->SetFillGradient('yellow','red');
$p1->SetStepStyle();
$p1->SetColor('#808000');

// Output line
$graph->Stroke();
?>