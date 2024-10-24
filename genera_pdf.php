<?php
require('libs/fpdf.php');
$conexion = mysqli_connect('localhost', 'root', '', 'estudiantes');
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$pdf = new FPDF('P', 'mm', 'A3');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$fechaDescarga = date('d-m-Y');
$pdf->Cell(0, 10, 'Fecha: ' . $fechaDescarga, 0, 1, 'R');
$pdf->Ln(10); 

$widths = array(15, 40, 60, 60, 30);
$headers = array('No.', 'NIE', 'APELLIDOS', 'NOMBRES', 'CODIGO');

// Encabezados de tabla
for ($i = 0; $i < count($headers); $i++) {
    $pdf->Cell($widths[$i], 10, $headers[$i], 1, 0, 'C');
}
$pdf->Ln();

$sql = "SELECT NIE, Apellidos, Nombres, Codigo FROM estudianntes_iti";
$result = mysqli_query($conexion, $sql);
$numero = 1;
$pdf->SetFont('Arial', '', 10);

// Llenar la tabla con los datos de los estudiantes
while ($row = mysqli_fetch_array($result)) {
    $pdf->Cell($widths[0], 10, $numero, 1, 0, 'C');
    $pdf->Cell($widths[1], 10, $row['NIE'], 1, 0, 'C');
    $pdf->Cell($widths[2], 10, $row['Apellidos'], 1, 0, 'C');
    $pdf->Cell($widths[3], 10, $row['Nombres'], 1, 0, 'C');
    $pdf->Cell($widths[4], 10, $row['Codigo'], 1, 0, 'C');
    $pdf->Ln(); 
    $numero++;
}

mysqli_close($conexion);

// Descargar el PDF
$pdf->Output('D', 'Lista_Estudiantes.pdf');
?>
