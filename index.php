<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài ôn tập</title>
</head>
<body>
    <h3>Form nhập</h3>
    <form action="./check.php" method="post" onsubmit="return validateForm(event)">
    <p>Họ và tên: <input type="text" name="ten" id="ten"></p>
    <p>Ngày sinh: <input type="date" name="ns" id="ns"></p>
    <p>Giới tính: &nbsp;Nam <input type="radio" name="gt" checked="checked" value="Nam">  
                  &nbsp; Nữ <input type="radio" name="gt" value="Nữ"></p>
    <!-- <p>Sở thích: Bóng chuyền<input type="checkbox" name="bc" id="bc">
        &nbsp; Bóng rổ <input type="checkbox" name="br" id="br">
        &nbsp; Bóng đá <input type="checkbox" name="bd" id="bd">
    </p> -->
    <p>Email: <input type="email" name="mail" id="mail" placeholder="example@gmail.com"></p>
    <p>Nơi sinh: 
        <select name="noisinh">
            <option value="Vĩnh Long">Vĩnh Long</option>
            <option value="Tp HCM">Thành phố Hồ Chí Minh</option>
            <option value="Cần Thơ">Cần Thơ</option>
            <option value="Đồng Nai">Đồng Nai</option>
            <option value="Hà Nội">Hà Nội</option>
        </select>
    </p>
    <p>User: <input type="text" name="user" id="user"></p>
    <p>Password: <input type="password" name="pass" id="pass"></p>
    <input type="submit" value="Submit">
    <button type="reset">Reset</button>
</form>

<script>
    function validateForm(event) {
        var ten = document.getElementById('ten').value;
        var ns = document.getElementById('ns').value;
        var email = document.getElementById('mail').value;
        var user = document.getElementById('user').value;
        var pass = document.getElementById('pass').value;
        var bc = document.getElementById('bc').checked;
        var br = document.getElementById('br').checked;
        var bd = document.getElementById('bd').checked;

        if (ten === '' || ns === '' || email === '' || user === '' || pass === '') {
            alert('Vui lòng điền đầy đủ thông tin!');
            event.preventDefault(); // Ngăn chặn sự kiện mặc định của form
            return false;
        }

        // Kiểm tra tên có ít nhất 2 ký tự chữ cái hoặc khoảng trắng
        var nameRegex = /^[\p{L} ]{2,}$/u;
        if (!nameRegex.test(ten)) {
            alert('Tên phải có ít nhất 2 ký tự chữ cái hoặc khoảng trắng!');
            event.preventDefault(); // Ngăn chặn sự kiện mặc định của form
            return false;
        }

        // Kiểm tra ngày sinh có lớn hơn 18 tuổi hay không
        var dob = new Date(ns);
        var eighteenYearsAgo = new Date();
        eighteenYearsAgo.setFullYear(eighteenYearsAgo.getFullYear() - 18);
        if (dob >= eighteenYearsAgo) {
            alert('Bạn phải trên 18 tuổi để đăng ký!');
            event.preventDefault(); // Ngăn chặn sự kiện mặc định của form
            return false;
        }

        // Kiểm tra email có đúng định dạng hay không
        if (!email.includes('@')) {
            alert('Email không hợp lệ!');
            event.preventDefault(); // Ngăn chặn sự kiện mặc định của form
            return false;
        }

        // Kiểm tra mật khẩu có ít nhất 8 ký tự
        if (pass.length < 8) {
            alert('Mật khẩu phải có ít nhất 8 ký tự!');
            event.preventDefault(); // Ngăn chặn sự kiện mặc định của form
            return false;
        }

        // Kiểm tra ít nhất 1 sở thích được chọn
        if (!(bc || br || bd)) {
            alert('Vui lòng chọn ít nhất một sở thích!');
            event.preventDefault(); // Ngăn chặn sự kiện mặc định của form
            return false;
        }
        alert('Nhập thành công!');
        return true; // Nếu tất cả các điều kiện đều thoả mãn
    }
</script>


</body>  
</html>