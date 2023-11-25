<!-- Trong trang chi tiết sản phẩm hoặc trang cần hiển thị chức năng nhắn tin -->
<div id="chat-box">
    <!-- Hiển thị danh sách tin nhắn -->
    <div id="message-list"></div>

    <!-- Form nhập tin nhắn -->
    <form id="message-form">
        <input type="text" id="message-input" placeholder="Nhập tin nhắn...">
        <button type="submit">Gửi</button>
    </form>
</div>

<script>
    // Trong tệp script.js hoặc trực tiếp trong trang HTML

document.addEventListener('DOMContentLoaded', function () {
    // Lấy phần tử và biến cần thiết
    var messageForm = document.getElementById('message-form');
    var messageInput = document.getElementById('message-input');
    var messageList = document.getElementById('message-list');

    // Xử lý sự kiện khi người dùng gửi tin nhắn
    messageForm.addEventListener('submit', function (e) {
        e.preventDefault();
        var message = messageInput.value;

        // Gửi tin nhắn đến server
        sendMessage(message);
    });

    // Hàm gửi tin nhắn đến server (sử dụng Fetch API)
    function sendMessage(message) {
        fetch('../Control/process_message.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'message=' + encodeURIComponent(message),
        })
        .then(response => response.json())
        .then(data => {
            // Xử lý phản hồi từ server
            if (data.status === 'success') {
                // Hiển thị tin nhắn ngay lập tức (chưa cần đợi server phản hồi)
                displayMessage(message);
                // Xóa nội dung trong ô nhập tin nhắn
                messageInput.value = '';
            } else {
                console.error('Error:', data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    // Hàm hiển thị tin nhắn trong danh sách
    function displayMessage(message) {
        var messageItem = document.createElement('div');
        messageItem.textContent = message;
        messageList.appendChild(messageItem);
    }
});

</script>