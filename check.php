<?php
include 'connect.php'; // Kết nối với cơ sở dữ liệu

// Kiểm tra xem biểu mẫu đã được gửi đi chưa và xử lý dữ liệu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Lấy dữ liệu từ form            $ten_bien = $_POST['name_trong_form'];
    $ht = $_POST['ten'];
    $ngaysinh = $_POST['ns'];
    $gioitinh = $_POST['gt'];
    $sothich1 = isset($_POST['bc']);
    $sothich2 =  isset($_POST['br']); 
    $sothich3 =  isset($_POST['bd']);
    $email = $_POST['mail'];
    $noisinh = $_POST['noisinh'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];



    //Kiểm tra điều kiên nhập
    if(
        preg_match("/^[\p{L} ]{2,}$/u", $ht) &&
        strtotime($ngaysinh) <=strtotime('-18 years') &&
        filter_var($email,FILTER_VALIDATE_EMAIL) &&
        strlen($pass)>=8
    ){  //Tạo câu truy vấn để thêm dữ liệu
        // sql = INSERT INTO ten_bang (cot1, cot2, cot3) VALUES ('$ten_bien', '...')
        $sql = "INSERT INTO thongtin (hoten, ngaysinh, gioitinh, email) VALUES ('$ht','$ngaysinh', '$gioitinh', '$email')";
        //Thực hiện truy vấn và kiểm tra kết quả
        if($conn->query($sql)===TRUE){
            echo "Nhập thành công!!!!";
        }
    }

}

$conn->close(); // Đóng kết nối với cơ sở dữ liệu
?>




