<?php
require_once "db_module.php";

// Establish connection
$link = null;
taoKetNoi($link);

// Article ID as specified in the task
$article_id = 10;

// Check if the article exists
$query_check = "SELECT * FROM tbl_bantin WHERE id_bantin = $article_id";
$result_check = chayTruyVanTraVeDL($link, $query_check);
$data = layDuLieu($result_check);

// Default response
$response = "";

if (count($data) > 0) {
    // Article exists, update its content
    $new_content = "Đặc sản của các vùng miền ở việc năm rất đa dang và phong phú.";
    
    $query_update = "UPDATE tbl_bantin SET noidung = '$new_content' WHERE id_bantin = $article_id";
    $result_update = chayTruyVanKhongTraVeDL($link, $query_update);
    
    if ($result_update) {
        $response = "<div class='alert alert-success'>Đã cập nhật nội dung cho bản tin ID $article_id thành công!</div>";
        
        // Fetch updated article to show confirmation
        $query_updated = "SELECT * FROM tbl_bantin WHERE id_bantin = $article_id";
        $result_updated = chayTruyVanTraVeDL($link, $query_updated);
        $updated_data = layDuLieu($result_updated);
        
        if (count($updated_data) > 0) {
            $article = $updated_data[0];
            $response .= "<div class='card mt-3'>";
            $response .= "<div class='card-header'><strong>Thông tin bản tin sau khi cập nhật</strong></div>";
            $response .= "<div class='card-body'>";
            $response .= "<p><strong>ID:</strong> " . $article['id_bantin'] . "</p>";
            $response .= "<p><strong>Tiêu đề:</strong> " . $article['tieude'] . "</p>";
            $response .= "<p><strong>Nội dung mới:</strong> " . $article['noidung'] . "</p>";
            $response .= "</div></div>";
        }
    } else {
        $response = "<div class='alert alert-danger'>Lỗi khi cập nhật nội dung: " . mysqli_error($link) . "</div>";
    }
} else {
    $response = "<div class='alert alert-warning'>Không tìm thấy bản tin với ID $article_id</div>";
    
    // Optional: Display a list of available article IDs for debugging purposes
    $query_all = "SELECT id_bantin, tieude FROM tbl_bantin LIMIT 10";
    $result_all = chayTruyVanTraVeDL($link, $query_all);
    $all_data = layDuLieu($result_all);
    
    if (count($all_data) > 0) {
        $response .= "<div class='mt-3'><p>Các bản tin hiện có:</p><ul>";
        foreach ($all_data as $article) {
            $response .= "<li>ID: " . $article['id_bantin'] . " - " . $article['tieude'] . "</li>";
        }
        $response .= "</ul></div>";
    }
}

// Free resources
giaiPhongBoNho($link, $result_check);

// Return response
echo $response;
?>