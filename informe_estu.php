<?php
include("conexion.php");
require __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

if(isset($_POST['export_students'])) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Establecer estilos para el encabezado
    $headerStyle = [
        'font' => ['bold' => true],
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'CCCCCC']]
    ];
    $sheet->getStyle('B2:C2')->applyFromArray($headerStyle);

    // Encabezado personalizado
    $sheet->setCellValue('B2', 'Lista de Estudiantes');
    $sheet->mergeCells('B2:C2'); // Unir celdas para el encabezado

    // Encabezados de columnas en negrita
    $sheet->getStyle('B3:C3')->getFont()->setBold(true);
    $sheet->setCellValue('B3', 'Nombre');
    $sheet->setCellValue('C3', 'Apellido');

    // Obtener datos de estudiantes
    $sql_estudiantes = "SELECT * FROM personas WHERE codigo_tip = '1'";
    $result_estudiantes = $conn->query($sql_estudiantes);

    $row = 4; // Empezar desde la fila 4
    if ($result_estudiantes->num_rows > 0) {
        while($row_estudiante = $result_estudiantes->fetch_assoc()) {
            $sheet->setCellValue('B' . $row, $row_estudiante['nombre_per']);
            $sheet->setCellValue('C' . $row, $row_estudiante['apellidos_per']);
            $row++;
        }
    }

    // Autoajustar ancho de columnas
    foreach(range('B','C') as $columnID) {
        $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }

    // Crear el archivo Excel
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="informe_estudiantes.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Informe Estudiante</title>
    <style>
        /* Estilo para el botón */
        .blue-button {
            background-color: #007bff; /* Azul */
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
   <!-- Clase 'blue-button' añadida al botón -->
    </center>
   <button type="submit" name="export" class="blue-button">Exportar estudiantes</button>
    </form>
</body>
</html>
