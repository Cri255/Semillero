<?php
include("conexion.php");
require __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

if(isset($_POST['export'])) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Establecer estilos para el encabezado
    $headerStyle = [
        'font' => ['bold' => true, 'size' => 14],
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'ADD8E6']]
    ];
    $sheet->getStyle('A1:B1')->applyFromArray($headerStyle);

    // Encabezado personalizado
    $sheet->setCellValue('A1', 'Lista de Profesores');
    $sheet->mergeCells('A1:B1'); // Unir celdas para el encabezado

    // Encabezados de columnas en negrita
    $sheet->getStyle('A2:B2')->getFont()->setBold(true);
    $sheet->setCellValue('A2', 'Nombre');
    $sheet->setCellValue('B2', 'Apellido');

    // Obtener datos de profesores
    $sql_profesores = "SELECT * FROM personas WHERE codigo_tip = '2'";
    $result_profesores = $conn->query($sql_profesores);

    $row = 3;
    if ($result_profesores->num_rows > 0) {
        while($row_profesor = $result_profesores->fetch_assoc()) {
            $sheet->setCellValue('A' . $row, $row_profesor['nombre_per']);
            $sheet->setCellValue('B' . $row, $row_profesor['apellidos_per']);
            $row++;
        }
    }

    // Autoajustar ancho de columnas
    foreach(range('A','B') as $columnID) {
        $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }

    // Crear el archivo Excel
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="informe_profesores.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Informe Profesor</title>
    <style>
        /* Estilo para el botón */
        .blue-button {
            background-color: #007bff; /* Azul */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <!-- Clase 'blue-button' añadida al botón -->
        <button type="submit" name="export" class="blue-button">Exportar Profesores</button>
    </form>
</body>
</html>
