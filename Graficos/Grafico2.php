<?php
require_once ('../jpgraph/jpgraph.php');
require_once ('../jpgraph/jpgraph_line.php');
require_once ('../jpgraph/jpgraph_pie.php');

$y_axis=array();
$i=0;
$con= mysqli_connect("localhost", "root","","ventas");

if(mysqli_connect_errno()){
    echo "Error";
    }
    $result= mysqli_query($con, "select * from cliente");
    while($row= mysqli_fetch_array($result)){
       
        $y_axis["$i"]=$row["cli_visitas"];
        $i++;
    }
    mysqli_close($con);
 
// Create the Pie Graph. 
$graph = new PieGraph(800,750);

$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// Set A title for the plot
$graph->title->Set("PORCENTAJE DE VISITAS DE CLIENTES");
$graph->SetBox(true);

// Create
$p1 = new PiePlot($y_axis);
$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->SetSliceColors(array('#1E90FF','#2E8B57','#ADFF2F','#DC143C','#BA55D3'));
$graph->Stroke();
    
    
    
    
    
?>


