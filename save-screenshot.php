<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取Base64数据URL
    $dataUrl = $_POST['dataUrl'];

    // 去除Base64数据URL前缀
    $data = substr($dataUrl, strpos($dataUrl, ',') + 1);

    // 解码Base64数据
    $decodedData = base64_decode($data);

    // 保存图像到服务器
    $filename = 'screenshot.png'; // 保存的文件名
    file_put_contents($filename, $decodedData);

    // 返回成功响应
    echo 'Image saved successfully.';
} else {
    // 返回错误响应
    http_response_code(400);
    echo 'Invalid request.';
}
?>
