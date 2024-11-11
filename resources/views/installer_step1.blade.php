<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Install E-Commerce Application - Step 1</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
        }
        .container {
            width: 100%;
            max-width: 500px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 16px;
            color: #333;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            color: #555;
        }
        input[type="text"],
        input[type="password"],
        input[type="url"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #4f46e5;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #4338ca;
        }

        .alert-danger{
            color: red;
        }
    </style>
</head>
<body>

    <div class="container">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
        @endforeach
        <h1>Install Your E-Commerce Site</h1>
        <form action="{{ route('install.step1.post') }}" method="POST">
            @csrf
            <!-- App Info -->
            <label for="APP_NAME">App Name</label>
            <input type="text" name="APP_NAME" id="APP_NAME" required>
            
            <!-- Database Info -->
            <label for="DB_HOST">Database Host</label>
            <input type="text" name="DB_HOST" id="DB_HOST" required>
            
            <label for="DB_PORT">Database Port</label>
            <input type="text" name="DB_PORT" id="DB_PORT" required>
            
            <label for="DB_DATABASE">Database Name</label>
            <input type="text" name="DB_DATABASE" id="DB_DATABASE" required>
            
            <label for="DB_USERNAME">Database Username</label>
            <input type="text" name="DB_USERNAME" id="DB_USERNAME" required>
            
            <label for="DB_PASSWORD">Database Password</label>
            <input type="password" name="DB_PASSWORD" id="DB_PASSWORD">
            
            <button type="submit">Next Step</button>
        </form>
    </div>
</body>
</html>
