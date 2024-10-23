<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .error-container {
            text-align: center;
            max-width: 500px;
            width: 100%;
            animation: fadeInUp 0.7s ease-out;
        }

        .error-icon {
            font-size: 70px;
            color: #ff6b6b;
            margin-bottom: 20px;
        }

        .error-message {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }

        .error-title {
            font-size: 18px;
            color: #777;
            margin-bottom: 30px;
        }

        .search-box {
            max-width: 300px;
            margin: 0 auto 30px;
        }

        .search-box input {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ddd;
            font-size: 16px;
            color: #555;
            box-sizing: border-box;
        }

        .back-btn {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
            margin: 0 10px;
        }

        .back-btn {
            background-color: rgba({{ __setting('color-accent') }}) !important;
            color: #fff;
        }
        .back-btn:hover {
            background-color: rgba({{ __setting('color-accent-hover') }}) !important;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 600px) {
            .error-container {
                padding: 30px;
                margin: 5%;
            }

            .error-icon {
                font-size: 80px;
            }

            .error-message {
                font-size: 20px;
            }

            .error-title {
                font-size: 16px;
            }

            .back-btn {
                padding: 10px 20px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <div class="error-container">

        <!-- <img src="{{ asset(__setting('header_logo')) }}" alt="Site Logo" class="logo"> -->

        <h1 class="error-message">@yield('message', 'Page Not Found')</h1>

        <div class="error-icon">
            @yield('code', '404')
        </div>

        <div class="error-title">
            @yield('title', __trans('Page Not Found'))
        </div>
        
        <a href="/" class="back-btn">{{ __trans('Go Back to Homepage') }}</a>
    </div>

</body>

</html>
