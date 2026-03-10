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
    <link rel="stylesheet" href="{{ asset('pluto/css/bootstrap.min.css') }}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Outfit', sans-serif;
            overflow: hidden;
        }

        .bg-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('{{ asset('img/header/header-2.jpeg') }}');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            filter: blur(4px);
            -webkit-filter: blur(4px);
            position: absolute;
            width: 100%;
            z-index: -1;
            transform: scale(1.1);
            /* Prevents white edges from blur */
        }

        .login-container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            color: white;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
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
            font-size: 0.9rem;
            opacity: 0.8;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            padding: 12px 15px 12px 45px;
            color: white;
            transition: 0.3s;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: #ff8c42;
            /* ASA Orange */
            box-shadow: none;
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .label_field {
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
            color: rgba(255, 255, 255, 0.9);
        }

        .btn-marathon {
            background: #ffcc00;
            /* Yellow */
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #000;
            width: 100%;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-marathon:hover {
            background: #ff8c42;
            /* ASA Orange */
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(36, 56, 142, 0.4);
        }

        .forgot-pass {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: 0.3s;
        }

        .forgot-pass:hover {
            color: #ffcc00;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
        }

        .form-check-input {
            background-color: transparent;
            border-color: rgba(255, 255, 255, 0.5);
        }

        .form-check-input:checked {
            background-color: #ffcc00;
            border-color: #ffcc00;
        }

        .back-to-site {
            margin-top: 25px;
            text-align: center;
            font-size: 0.85rem;
        }

        .back-to-site a {
            color: #ff8c42;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="bg-image"></div>

    <div class="login-container">
        <div class="glass-card">
            <div class="logo-section mb-4">
                <div class="text-center mb-3">
                    <img src="{{ asset('img/logo/swahili Marathon.jpeg') }}" alt="Swahili Marathon Logo"
                        style="max-width: 150px; border-radius: 10px;">
                </div>
                <h2>Swahili Marathon</h2>
                <p>Swahili Marathon Registration & Management</p>
            </div>

            <form action="/login" method="POST">
                @csrf
                <div class="form-group">
                    <label class="label_field">Email Address</label>
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required />
                </div>

                <div class="form-group">
                    <label class="label_field">Password</label>
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password"
                        required />
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="remember-me">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    <a href="#" class="forgot-pass">Forgot Password?</a>
                </div>

                <button type="submit" class="btn btn-marathon">Sign In to Dashboard</button>
            </form>

            <div class="back-to-site">
                <p>Don't have an account? <a href="{{ url('/register') }}">Register Now</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('pluto/js/jquery.min.js') }}"></script>
    <script src="{{ asset('pluto/js/bootstrap.min.js') }}"></script>
</body>

</html>