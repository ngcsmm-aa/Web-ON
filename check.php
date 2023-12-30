<?php
include 'connect.php'; // Kết nối với cơ sở dữ liệu

// Kiểm tra xem biểu mẫu đã được gửi đi chưa và xử lý dữ liệu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Lấy dữ liệu từ form            $ten_bien = $_POST['name_trong_form'];
    $ht = $_POST['ten'];
    $ngaysinh = $_POST['ns'];
    $gioitinh = $_POST['gt'];
    $sothich_bc = isset($_POST['bc']) ? 1 : 0;
    $sothich_br = isset($_POST['br']) ? 1 : 0; 
    $sothich_bd = isset($_POST['bd']) ? 1 : 0; 
    $email = $_POST['mail'];
    // $noisinh = $_POST['noisinh'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];



    //Kiểm tra điều kiên nhập để insert vào csdl
    if(
        preg_match("/^[\p{L} ]{2,}$/u", $ht) &&
        strtotime($ngaysinh) <=strtotime('-18 years') &&
        filter_var($email,FILTER_VALIDATE_EMAIL) &&
        strlen($pass)>=8 &&
        (isset($sothich_bc) || isset($sothich_br) || isset($sothich_bd))// Ít nhất một sở thích được chọn
    ){  //Tạo câu truy vấn để thêm dữ liệu
        // sql = INSERT INTO ten_bang (cot1, cot2, cot3) VALUES ('$ten_bien', '...')
        $sql = "INSERT INTO thongtin (hoten, ngaysinh, gioitinh, sothich_bc, sothich_br, sothich_bd, email, user, pass) VALUES ('$ht', '$ngaysinh', '$gioitinh', $sothich_bc, $sothich_br, $sothich_bd, '$email', '$user', '$pass')";

        //Thực hiện truy vấn và kiểm tra kết quả
        if($conn->query($sql) === TRUE){
            echo "Thêm dữ liệu vào csdl thành công!!!!";
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
        
    }

}

$conn->close(); // Đóng kết nối với cơ sở dữ liệu
?>




