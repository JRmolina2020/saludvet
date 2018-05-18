 
<?php

require('htmlpdf.php');

$idexamen=$_GET["examen"];

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);


require_once "../model/Examen.php";

if (!isset($_SESSION['correo'])) {
//si no existe la session correo no dejara entrar y direcciona al usuario login form  
header('location:../');
}

// instaciamos la clase CLIENTE para utlizar su metodo  listarpdf
$examen = new Examen();
$rspta = $examen->listarhistoria($idexamen);


$pdf->Cell(40,6,'',0,0,'C');
$pdf->Cell(115,6,'LISTADO DE CIENTES',0,0,'C'); 
$pdf->Image('logo.png',100,20,-300);
$pdf->Ln(35);
// colores filas
$pdf->ln(10);
$pdf->SetFillColor(199, 55, 24); 
$pdf->SetFont('Arial','B',9);
// 
$pdf->Cell(1,6,'',0,0,'L');
$pdf->Cell(100,6,'INFORMACION PERSONAL ',0,0,'L'); 
$pdf->ln(10);



while($reg= $rspta->fetch_object())
{ 

$html='
<table>
<tr>
<td  width="145"  bgcolor="#CE3A1A" height="60">Cedula</td>
<td  width="145" bgcolor="#CE3A1A" height="60">Nombre</td>
<td  width="145" bgcolor="#CE3A1A" height="60">Apellido</td>
<td  width="145" bgcolor="#CE3A1A" height="60">Telefono</td>
</tr>
<tr>
<td width="145"  bgcolor="#B0D5DE"  height="30">'.$reg->cedula.'</td>
<td width="145"   bgcolor="#B0D5DE" height="30">'.$reg->mascotax.'</td>
<td width="145"   bgcolor="#B0D5DE" height="30">'.$reg->apellido.'</td>
<td width="145"   bgcolor="#B0D5DE" height="30">'.$reg->telefono.'</td>
</tr>
</table>
<br><br><br><br>
<h1>INFORMACION RESIDENCIAL</h1>
<br><br>
<table>
<tr>
<td  width="145"  bgcolor="#CE3A1A" height="60">Ciudad</td>
<td  width="145" bgcolor="#CE3A1A" height="60">Barrio</td>
<td  width="145" bgcolor="#CE3A1A" height="60">Dirrecion</td>
</tr>
<tr>
<td width="145"   bgcolor="#B0D5DE"  height="30">'.$reg->ciudad.'</td>
<td width="145"   bgcolor="#B0D5DE" height="30">'.$reg->barrio.'</td>
<td width="145"   bgcolor="#B0D5DE" height="30">';$pdf->Image('../files/mascota/'.$reg->imagen.'');
$html.='
</td>
</tr>
</table>
';
}

$pdf->WriteHTML($html);
$pdf->Output();


?>