<?php
include("conexion.php");
require __DIR__ . '/vendor/autoload.php'; // Asegúrate de reemplazar con la ruta correcta a la librería PHPSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['export_students'])) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Encabezados
    $sheet->setCellValue('A1', 'Estudiantes');
    $sheet->setCellValue('A2', 'Nombre');
    $sheet->setCellValue('B2', 'Apellido');

    // Obtener datos de estudiantes
    $sql_estudiantes = "SELECT * FROM personas WHERE codigo_tip = '1'";
    $result_estudiantes = $conn->query($sql_estudiantes);

    $row = 3;
    if ($result_estudiantes->num_rows > 0) {
        while($row_estudiante = $result_estudiantes->fetch_assoc()) {
            $sheet->setCellValue('A' . $row, $row_estudiante['nombre_per']);
            $sheet->setCellValue('B' . $row, $row_estudiante['apellidos_per']);
            $row++;
        }
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
</head>
<body>
    <form method="post" action="">
        <button type="submit" name="export_students">Exportar Datos de Estudiantes a Excel</button>
    </form>
</body>
</html>
