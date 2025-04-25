<?php
require_once("db_module.php");
$link = null;
taoKetNoi($link);

$sql = "
    SELECT * 
    FROM tbl_bantin 
    WHERE tieude LIKE '%công nghệ%'
";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h5 class='text-info'>Các bản tin chứa từ khoá 'công nghệ' trong tiêu đề:</h5>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p><strong>{$row['tieude']}</strong> - {$row['tukhoa']}</p>";
    }
} else {
    echo "<p class='text-danger'>Không tìm thấy bản tin nào có từ 'công nghệ' trong tiêu đề.</p>";
}

giaiPhongBoNho($link, true);
?>
