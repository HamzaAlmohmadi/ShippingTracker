<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة المستخدم</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #02384e, #E0FFFF);
            background-size: cover;
            background-repeat: no-repeat;
            text-align: center;

        }

        .container {
            background: rgba(255, 255, 255, 0.8);
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .content h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 24px;
            color: #666;
        }

        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #ff6666;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .logout-button:hover {
            background-color: #ff4d4d;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <h1>أهلاً بك في صفحة المستخدم</h1>
            <p>النظام قيد الإنشاء. شكرًا لصبرك.</p>
        </div>
        {{-- <button class="logout-button" onclick="logout()">تسجيل خروج</button> --}}

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                class="dropdown-item has-icon text-danger">
                <i class="logout-button"></i>
                <h3>تسجيل خروج</h3>
            </a>
        </form>

    </div>

    <script>
        function logout() {
            // تنفيذ منطق تسجيل الخروج هنا
            alert('تم تسجيل الخروج بنجاح!');
        }
    </script>
</body>

</html>
