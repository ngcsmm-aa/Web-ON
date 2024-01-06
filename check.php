<?php
include 'connect.php'; // Kết nối với cơ sở dữ liệu

// Kiểm tra xem biểu mẫu đã được gửi đi chưa và xử lý dữ liệu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Lấy dữ liệu từ form            $ten_bien = $_POST['name_trong_form'];
    $ht = $_POST['ten'];
    $ngaysinh = $_POST['ns'];
    $gioitinh = $_POST['gt'];
    $email = $_POST['mail'];
    $noisinh = $_POST['noisinh'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sothich = isset($_POST['sothich']) ? implode(', ', $_POST['sothich']) : '';

    $malop = $_POST['lop'];

    // ????????????????????
    $hinh = $_POST['img'];
    //Kiểm tra điều kiên nhập để insert vào csdl
    if(
        preg_match("/^[\p{L} ]{2,}$/u", $ht) &&
        strtotime($ngaysinh) <=strtotime('-18 years') &&
        filter_var($email,FILTER_VALIDATE_EMAIL) &&
        strlen($pass)>=8 
    ){  //Tạo câu truy vấn để thêm dữ liệu
        // sql = INSERT INTO ten_bang (cot1, cot2, cot3) VALUES ('$ten_bien', '...')
        $sql = "INSERT INTO thongtin (hoten, ngaysinh, gioitinh, noisinh,sothich, lop, email, user, pass,img) VALUES ('$ht', '$ngaysinh', '$gioitinh','$noisinh','$sothich','$malop','$email', '$user', '$pass','$hinh')";

        //Thực hiện truy vấn và kiểm tra kết quả
        if($conn->query($sql) === TRUE){
            // echo "Thêm dữ liệu vào csdl thành công!!!!";
            //Truy vấn lấy tất cả dữ liệu và hiển thị dữ liệu lên bảng
            $select_all = "SELECT * FROM thongtin,lop WHERE thongtin.lop=lop.malop";
            $result_all = $conn->query($select_all);
            if ($result_all->num_rows>0){
                //Bắt đầu tạo bảng
                echo "<br><br><table class='bordered-table' border='1'>";
                echo "<tr>
                    <th>Họ và tên</th> 
                    <th>Ngày sinh</th> 
                    <th>Giới tính</th> 
                    <th>Nơi sinh</th> 
                    <th>Lớp</th>
                    <th>Sở thích</th> 
                    <th>Email</th> 
                    <th>Hình</th></tr>";
                //Duyệt qua từng hàng và in ra thông tin
                while ($row=$result_all->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" . $row["hoten"] . "</td>";
                    echo "<td>" . $row["ngaysinh"] . "</td>";
                    echo "<td>" . $row["gioitinh"] . "</td>";
                    echo "<td>" . $row["noisinh"] . "</td>";
                    echo "<td>" . $row["ten_lop"] . "</td>";
                    echo "<td>" . $row["sothich"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td><img src='" . $row["img"] . "' alt='Hình ảnh'></td>";
                    echo "</tr>";
                }

                echo "</table>";
                //btn quay về trang index
                echo "<br><form action='./index.php' method='POST'>
                <input type='submit' value='Quay về trang chính'>
                </form>";
            }
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
        
    }

}

$conn->close(); // Đóng kết nối với cơ sở dữ liệu
?>




