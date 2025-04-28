<?php
require_once "db_module.php";

// Establish connection
$link = null;
taoKetNoi($link);

// Let's handle the execution to add comment about the specific Samsung article
// Find the exact Samsung article by its title
$article_title = "Liệu Samsung sẽ thành công với Galaxy S4 hay sẽ rơi vào tình trạng suy giảm sự tin cậy của nhà đầu tư như Apple";
$query_find_article = "SELECT id_bantin FROM tbl_bantin WHERE tieude = '$article_title' LIMIT 1";
$result = chayTruyVanTraVeDL($link, $query_find_article);
$data = layDuLieu($result);

// Default response
$response = "<div class='alert alert-danger'>Không tìm thấy bản tin cần thêm bình luận</div>";

if (count($data) > 0) {
    $id_bantin = $data[0]['id_bantin'];
    
    // Get a default user ID for the comment (can be adjusted as needed)
    $query_user = "SELECT id_docgia FROM tbl_docgia LIMIT 1";
    $result_user = chayTruyVanTraVeDL($link, $query_user);
    $user_data = layDuLieu($result_user);
    
    if (count($user_data) > 0) {
        $id_docgia = $user_data[0]['id_docgia'];
        
        // Add the comment
        $current_time = date("Y-m-d H:i:s");
        $comment_content = "Đây là bình luận mới cho bài viết về Samsung Galaxy S4";
        
        $query_add_comment = "INSERT INTO tbl_binhluan (id_docgia, id_bantin, noidung, thoigian, so_luot_like) 
                             VALUES ('$id_docgia', '$id_bantin', '$comment_content', '$current_time', 0)";
        
        $result_insert = chayTruyVanKhongTraVeDL($link, $query_add_comment);
        
        if ($result_insert) {
            $response = "<div class='alert alert-success'>Đã thêm bình luận mới vào bản tin thành công!</div>";
            $response .= "<p><strong>Tiêu đề bản tin:</strong> $article_title</p>";
            $response .= "<p><strong>Nội dung bình luận:</strong> $comment_content</p>";
            $response .= "<p><strong>Thời gian:</strong> $current_time</p>";
        } else {
            $response = "<div class='alert alert-danger'>Lỗi khi thêm bình luận: " . mysqli_error($link) . "</div>";
        }
    } else {
        $response = "<div class='alert alert-danger'>Không tìm thấy độc giả nào trong hệ thống</div>";
    }
}

// Free resources
giaiPhongBoNho($link, $result);

// Return response
echo $response;
?>