<?php require 'config/databaseController.php';

$db = new DataAccessHelper();
$conn = $db->connect();
$sql = "SELECT * from monhoc";
$result = $conn->query($sql);
$monhoc = array();
while ($rows = $result->fetch_assoc()) {
    $monhoc[] = array(
        "MaMonHoc" => $rows['MaMonHoc'],
        "TenMonHoc" => $rows['TenMonHoc']
    );
}
function printTableMonHoc($monhoc)
{
    foreach ($monhoc as $value) {
        $html = " <tr>
        <td scope='row'>" . $value['MaMonHoc'] . "</td>
        <td>" . $value['TenMonHoc'] . "</td>
        <td> <button class='btn btn-primary'> Sửa</button> <button class='btn btn-primary'> Xóa</button> </td>
    </tr>";
        echo $html;
    }
}
$conn->close();
echo json_encode($monhoc);
