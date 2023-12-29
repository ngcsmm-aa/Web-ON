<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Form nhập</h3>
    <form action="./check.php" method="post">
    <p>Họ và tên: <input type="text" name="ten" id="ten"></p>
    <p>Ngày sinh: <input type="date" name="ns" id="ns"></p>
    <p>Giới tính: &nbsp;Nam <input type="radio" name="gt" checked="checked" value="Nam">  
                  &nbsp; Nữ <input type="radio" name="gt" value="Nữ"></p>
    <p>Sở thích: Bóng chuyền<input type="checkbox" name="bc" id="bc">
        &nbsp; Bóng rổ <input type="checkbox" name="br" id="br">
        &nbsp; Bóng đá <input type="checkbox" name="bd" id="bd">
    </p>
    <p>Email: <input type="email" name="mail" id="mail"></p>
    <p>Nơi sinh: 
        <select name="noisinh" id="noisinh">
            <option value="1">Vĩnh Long</option>
            <option value="2">Thành phố Hồ Chí Minh</option>
            <option value="3">Cần Thơ</option>
            <option value="4">Dồng Nai</option>
            <option value="5">Hà Nội</option>
        </select>
    </p>
    <p>User: <input type="text" name="user" id="user"></p>
    <p>Password: <input type="password" name="pass" id="pass"></p>
    <input type="submit" value="Submit">
    <button type="reset">Reset</button>
</form>



</body>  
</html>