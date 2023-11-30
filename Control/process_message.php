<?php
// Trong một tệp xử lý nhắn tin và hiển thị tin nhắn, ví dụ: messages.php

// Kết nối đến cơ sở dữ liệu
require_once '../config.php';

// Bắt đầu phiên làm việc
session_start();

// Lấy thông tin người dùng từ phiên làm việc (đã đăng nhập)
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Xử lý việc gửi tin nhắn
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $message = $_POST['message'];

        // Thực hiện thêm tin nhắn vào cơ sở dữ liệu
        $sql = "INSERT INTO messages (user_id, message_content) VALUES ('$userId', '$message')";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(['status' => 'success', 'message' => 'Tin nhắn đã được gửi thành công']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Lỗi khi gửi tin nhắn: ' . $conn->error]);
        }
    }

    // Lấy tin nhắn từ cơ sở dữ liệu dựa trên ID người dùng
    $sql = "SELECT * FROM messages WHERE user_id = '$userId'";
    $result = $conn->query($sql);

    // Kiểm tra và hiển thị tin nhắn
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<p>' . $row['message_content'] . '</p>';
        }
    } else {
        echo '<p>No messages found.</p>';
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Người dùng chưa đăng nhập']);
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
