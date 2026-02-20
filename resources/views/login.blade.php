<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Swahili Marathon - Login</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        body,
        html {
            min-height: 100%;
            margin: 0;
            font-family: 'Outfit', sans-serif;
            background-color: #1a1a1a;
            position: relative;
        }

        .bg-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('img/header/header-2.jpeg') }}');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            filter: blur(8px);
            -webkit-filter: blur(8px);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: -1;
            transform: scale(1.1);
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 30px 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            color: white;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo-section h2 {
            font-weight: 800;
            letter-spacing: 2px;
            color: #fff;
            margin-bottom: 5px;
            text-align: center;
        }

        .logo-section p {
            text-align: center;
            font-size: 0.95rem;
            opacity: 0.7;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 18px;
            position: relative;
        }

        .form-group i {
            position: absolute;
            left: 18px;
            top: 45px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 1.1rem;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 14px;
            padding: 12px 15px 12px 50px;
            color: white;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: #ffcc00;
            box-shadow: 0 0 0 4px rgba(255, 204, 0, 0.15);
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .label_field {
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 10px;
            display: block;
            color: rgba(255, 255, 255, 0.8);
        }

        .btn-marathon {
            background: #ffcc00;
            border: none;
            border-radius: 14px;
            padding: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #1a1a1a;
            width: 100%;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            margin-top: 10px;
            box-shadow: 0 10px 20px -10px rgba(255, 204, 0, 0.5);
        }

        .btn-marathon:hover {
            background: #fff;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px -12px rgba(255, 204, 0, 0.6);
            color: #000;
        }

        .error-msg {
            background: rgba(220, 53, 69, 0.2);
            border: 1px solid rgba(220, 53, 69, 0.4);
            color: #ff8080;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 25px;
            font-size: 0.9rem;
            text-align: center;
        }

        .links-section {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9rem;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .links-section a {
            color: #ffcc00;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .links-section a:hover {
            color: #fff;
            text-decoration: underline;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .form-check-input {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.3);
            width: 1.2em;
            height: 1.2em;
        }

        .form-check-input:checked {
            background-color: #ffcc00;
            border-color: #ffcc00;
        }

        #loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1001;
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(255, 204, 0, 0.2);
            border-top: 5px solid #ffcc00;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 15px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @media (max-width: 576px) {
            .login-container {
                padding: 20px 15px;
            }

            .glass-card {
                padding: 25px 25px;
                border-radius: 20px;
            }

            .logo-section h2 {
                font-size: 1.5rem;
            }

            .logo-section img {
                max-width: 120px !important;
            }
        }
    </style>
</head>

<body>
    <div class="bg-image"></div>

    <div id="loading-overlay">
        <div class="spinner"></div>
        <div style="background: rgba(255,255,255,0.9); padding: 8px 15px; border-radius: 25px;">
            <span style="color: black; font-weight: 600; font-size: 0.9rem;">
                Powered by <span style="color: #940000;">EmCa Technologies</span>
            </span>
        </div>
    </div>

    <div class="login-container">
        <div class="glass-card">
            <div class="logo-section">
                <div class="text-center mb-3">
                    <img src="{{ asset('img/logo/asa-logo.png') }}" alt="SMRMS Logo" style="max-width: 140px;">
                </div>
                <h2>SMRMS</h2>
                <p>Swahili Marathon Management System</p>
            </div>

            @if($errors->any())
                <div class="error-msg">
                    <i class="fas fa-exclamation-circle me-1"></i> {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST"
                onsubmit="document.getElementById('loading-overlay').style.display='flex'">
                @csrf
                <div class="form-group">
                    <label class="label_field">Email Address</label>
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required
                        autofocus />
                </div>

                <div class="form-group">
                    <label class="label_field">Password</label>
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" class="form-control" required />
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="remember-me">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-marathon">Sign In</button>
            </form>

            <div class="links-section">
                <p class="mb-0">Don't have an account? <a href="{{ url('/register') }}">Register Now</a></p>
                <a href="{{ url('/') }}">Back to Homepage</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>