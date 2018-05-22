 
<?php

//Inlcuímos a la clase PDF_MC_Table
require('../public/fpdf/PDF_MC_Table.php');
 
//Instanciamos la clase para generar el documento pdf
$pdf=new PDF_MC_Table();
$pdf->AddPage();
$y_axis_initial = 25;
 
//PARAMETROS CELL(anchocelda,alturacelda,txt,borde o no 1-0,)
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,6,'',0,0,'C');
$pdf->Cell(115,6,'LISTADO DE CIENTES',0,0,'C'); 
$pdf->Image('logo.png',100,20,-300);
$pdf->Ln(35);
//ENCABEZADO END

// INFORMACION PERSONAL TITULO
$pdf->SetFont('Arial','B',7);
$pdf->Cell(1,6,'',0,0,'L');
$pdf->Cell(100,6,'INFORMACION PERSONAL ',0,0,'L'); 
//END INFORMACION PERSONAL

$pdf->ln(10);
$pdf->SetFillColor(199, 55, 24); 
$pdf->SetFont('Arial','B',10);

$pdf->Cell(30,6,'Cedula',0,0,'C',1); 
$pdf->Cell(30,6,utf8_decode('Nombre'),0,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Apellido'),0,0,'C',1);
$pdf->Cell(26,6,utf8_decode('Telefono'),0,0,'C',1);
$pdf->Ln(10);


//Comenzamos a crear las filas de los registros según la consulta mysql
require_once "../model/Cliente.php";
$cliente = new Cliente();
$rspta = $cliente->listar();
$pdf->SetWidths(array(30,30,30,26,));

while($reg= $rspta->fetch_object())
{  
	$cedula = $reg->cedula;
    $nombre = $reg->nombre;
     $apellido = $reg->apellido;
    $telefono= $reg->telefono;
    
          
    $pdf->SetFont('Arial','',10);
    $pdf->Row(array(utf8_decode($cedula),utf8_decode($nombre),utf8_decode($apellido),$telefono));
   $pdf->Output();
}







?>