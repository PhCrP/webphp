<?php
function getCon()
{
    $con = null;
    try {
        $con = new mysqli("mysql-server", "root", "123456789", "QL");
    } catch (mysqli_sql_exception $e) {
        echo "Lỗi kết nối: " . $e->getMessage();
    }
    return $con;
}


function getTG()
{
    $sqlGetTG = "call proc_xem_tat_ca_tac_gia()";
    try {
        $con = getCon();
        $st = $con->prepare($sqlGetTG);
        $st->execute();
        $rs = $st->get_result();

        if ($rs->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Tuổi</th>
                        <th>Quê quán</th>
                    </tr>";
            while ($row = $rs->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["ten"] . "</td>
                        <td>" . $row["tuoi"] . "</td>
                        <td>" . $row["que_quan"] . "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "Không có thông tin!!!!!!!";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Lỗi: " . $e->getMessage();
    } finally {
        if (isset($con)) $con->close();
        if (isset($st)) $st->close();
    }
}

function insertTG(int $id, string $ten, int $tuoi, string $qq)
{
    $sqlInsertTG = "call proc_them_tac_gia(?, ?, ?, ?)";
    $con = getCon();

    try {
        $st = $con->prepare($sqlInsertTG);
        $st->bind_param("isis", $id, $ten, $tuoi, $qq);
        $st->execute();
        $st->close();
        $con->close();
        header("Location: index.php");
        exit;
    } catch (mysqli_sql_exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $ten = $_POST["ten"];
    $tuoi = $_POST["tuoi"];
    $qq = $_POST["quequan"];

    insertTG($id, $ten, $tuoi, $qq);
}

getTG();

?>