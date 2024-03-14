<?php
include("conexion.php");
require __DIR__ . '/vendor/autoload.php'; // Reemplaza esta línea con la ruta correcta a la librería PHPSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['export'])) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Encabezados
    $sheet->setCellValue('A1', 'Profesores');
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

    // Crear el archivo Excel
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="informe_profesores_estudiantes.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Informe Profesor</title>
</head>
<body>
    <form method="post" action="">
        <button type="submit" name="export">Exportar Datos de Profesores a Excel</button>
    </form>
</body>
</html>
