 
<?php

require('htmlpdf.php');

$idexamen=$_GET["examen"];


$pdf=new PDF();
$pdf->AddPage();



require_once "../model/Examen.php";

if (!isset($_SESSION['correo'])) {
//si no existe la session correo no dejara entrar y direcciona al usuario login form  
header('location:../');
}

// instaciamos la clase CLIENTE para utlizar su metodo  listarpdf
$examen = new Examen();
$rspta = $examen->listarhistoria($idexamen);


 $pdf->Image('logo.png',10,8,33);
$pdf->ln(10);
$pdf->SetFont('Arial','B',8);
$pdf->Text(100,33,'hola');

 



while($reg= $rspta->fetch_object())
{ 
$html='
<center>
<br><br><br>
<table>
<tr>
<td  width="130" bgcolor="#C62C2C" height="60">Cedula</td>
<td  width="100" bgcolor="#787A81" height="60">Nombre</td>
<td  width="100" bgcolor="#DFE4E6" height="60">Apellido</td>
<td  width="100" bgcolor="#DFE4E6" height="60">Telefono</td>
<td  width="100"  bgcolor="#DFE4E6" height="60">Ciudad</td>
<td  width="100" bgcolor="#DFE4E6" height="60">Barrio</td>
<td  width="100" bgcolor="#DFE4E6" height="60">Dirrecion</td>
</tr>
<br>
<tr>
<td width="130"  bgcolor="#DFE4E6  "  height="90">'.$reg->cedula.'</td>
<td width="100"   bgcolor="#DFE4E6  " height="90">'.$reg->nombre.'</td>
<td width="100"   bgcolor="#DFE4E6  " height="90">'.$reg->apellido.'</td>
<td width="100"   bgcolor="#DFE4E6  " height="90">'.$reg->telefono.'</td>
<td width="100"   bgcolor="#DFE4E6  "  height="90">'.$reg->ciudad.'</td>
<td width="100"   bgcolor="#DFE4E6  " height="90">'.$reg->barrio.'</td>
<td width="100"   bgcolor="#DFE4E6  " height="90">'.$reg->direccion.'</td>
</tr>
</table>
<br><br>';
// $pdf->Image('../files/mascota/'.$reg->imagen.'',100,30,-200);
$html.='
<br>
<table>
<tr>
<td  width="130"  bgcolor="#C62C2C" height="60">Nombre</td>
<td  width="100" bgcolor="#787A81" height="60">Especie</td>
<td  width="100" bgcolor="#DFE4E6" height="60">Sexo</td>
<td  width="100" bgcolor="#DFE4E6" height="60">Raza</td>
<td  width="100"  bgcolor="#DFE4E6" height="60">Edad</td>
<td  width="100" bgcolor="#DFE4E6" height="60">Procedencia</td>
<td  width="100" bgcolor="#DFE4E6" height="60">Descripcion</td>
</tr>
<br>
<tr>
<td width="130"   bgcolor="#DFE4E6  "  height="90">'.$reg->mascotax.'</td>
<td width="100"   bgcolor="#DFE4E6  " height="90">'.$reg->categoria.'</td>
<td width="100"   bgcolor="#DFE4E6  " height="90">'.$reg->sexo.'</td>
<td width="100"   bgcolor="#DFE4E6  "  height="90">'.$reg->raza.'</td>
<td width="100"   bgcolor="#DFE4E6  " height="90">'.$reg->edad.'</td>
<td width="100"   bgcolor="#DFE4E6  " height="90">'.$reg->procedencia.'</td>
<td width="100"   bgcolor="#DFE4E6  " height="90">'.$reg->descripcion.'</td>';
$html.='
</td>
</tr>
</table>
<br><br>
<table>
<tr>
<td  width="130"  bgcolor="#C62C2C" height="60">F.Respiratoria</td>
<td  width="100" bgcolor="#787A81" height="60">F.cardiaca</td>
<td  width="100" bgcolor="#DFE4E6" height="60">Hidratacion</td>
<td  width="60" bgcolor="#DFE4E6" height="60">Peso</td>
<td  width="80"  bgcolor="#DFE4E6" height="60">Pulso</td>
<td  width="100" bgcolor="#DFE4E6" height="60">Temperatura</td>
<td  width="60" bgcolor="#DFE4E6" height="60">Actitud</td>
<td  width="100" bgcolor="#DFE4E6" height="60">C.Corporal</td>
</tr>
<tr>
<br>
<td width="130"   bgcolor="#DFE4E6  "  height="90">'.$reg->frespiratoria.'</td>
<td width="100"   bgcolor="#DFE4E6  " height="90">'.$reg->fcardiaca.'</td>
<td width="100"   bgcolor="#DFE4E6  " height="90">'.$reg->hidratacion.'</td>
<td width="60"   bgcolor="#DFE4E6  "  height="90">'.$reg->peso.'</td>
<td width="80"   bgcolor="#DFE4E6  " height="90">'.$reg->pulso.'</td>
<td width="100"   bgcolor="#DFE4E6  " height="90">'.$reg->temperatura.'</td>
<td width="60"   bgcolor="#DFE4E6  " height="90">'.$reg->actitud.'</td>
<td width="100"   bgcolor="#DFE4E6  " height="90">'.$reg->ccorporal.'</td>';
$html.='
</table>
</center>
';
}

$pdf->WriteHTML($html);
$pdf->Output();


?>

