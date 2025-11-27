<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Book Shop</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 380px;
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.15);
            animation: fade 0.4s ease;
        }

        @keyframes fade {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .title {
            text-align: center;
            font-size: 26px;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        .input-group {
            margin-bottom: 18px;
        }

        .input-group label {
            font-size: 14px;
            color: #555;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border: 1px solid #d0d0d0;
            border-radius: 10px;
            font-size: 15px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #2c6e49;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background: #25583c;
        }

        .link {
            margin-top: 12px;
            text-align: center;
            font-size: 14px;
        }

        .link a {
            color: #2c6e49;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="title">Welcome Back</div>

        @if ($errors->any())
            <div style="background:#ffefef;padding:10px;margin-bottom:15px;color:#b30000;border-radius:8px;">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <label>Email Address</label>
                <input type="email" name="email" required value="{{ old('email') }}">
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button class="btn">Login</button>
        </form>

        <div class="link">
            Don't have an account? <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
</body>
</html>
