<?php
$conn = new mysqli("localhost", "root", "", "db_news");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT tieude, so_luot_like FROM tbl_bantin ORDER BY so_luot_like DESC LIMIT 10";
$result = $conn->query($sql);

echo "<ul class='list-group'>";
while ($row = $result->fetch_assoc()) {
    echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
            {$row['tieude']}
            <span class='badge bg-primary rounded-pill'>{$row['so_luot_like']}</span>
          </li>";
}
echo "</ul>";

$conn->close();
