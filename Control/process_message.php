<?php
// Trong một tệp xử lý nhắn tin, ví dụ: process_message.php

// Kết nối đến cơ sở dữ liệu
require_once '../config.php';

// Lấy dữ liệu từ biểu mẫu gửi tin nhắn
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST['message'];
    // Có thể lấy thông tin người gửi từ phiên đăng nhập hoặc thông tin khách hàng

    // Thực hiện thêm tin nhắn vào cơ sở dữ liệu
    $sql = "INSERT INTO messages (user_id, message_content) VALUES (1, '$message')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Tin nhắn đã được gửi thành công']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Lỗi khi gửi tin nhắn: ' . $conn->error]);
    }
}
?>
