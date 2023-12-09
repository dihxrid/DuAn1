<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận tài khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #CCF381;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        a:hover {
            color: #CCF381;
            background-color: #15c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Xác nhận tài khoản</h1>
        <p>Cảm ơn bạn đã đăng ký. Vui lòng xác nhận tài khoản bằng cách nhấn vào liên kết bên dưới:</p>
        <a href="{{route('mail.regis')}}">Xác nhận tài khoản</a>
    </div>
</body>
</html>
