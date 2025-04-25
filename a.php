<?php
require_once("db_module.php");
$link = null;
taoKetNoi($link);

$sql = "SELECT tieude, so_luot_like FROM tbl_bantin ORDER BY so_luot_like DESC LIMIT 10";
$result = mysqli_query($link, $sql);

echo "<ul class='list-group'>";
while ($row = $result->fetch_assoc()) {
    echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
            {$row['tieude']}
            <span class='badge bg-primary rounded-pill'>{$row['so_luot_like']}</span>
          </li>";
}
echo "</ul>";

giaiPhongBoNho($link, true);
?>
