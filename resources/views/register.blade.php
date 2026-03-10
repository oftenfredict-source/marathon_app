<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Swahili Marathon - Registration</title>

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
        :root {
            --primary-yellow: #ffcc00;
            --primary-orange: #ff8c42;
            --glass-bg: rgba(255, 255, 255, 0.08);
            --glass-border: rgba(255, 255, 255, 0.15);
        }

        body,
        html {
            min-height: 100%;
            margin: 0;
            font-family: 'Outfit', sans-serif;
            background-color: #0f0f0f;
            color: white;
        }

        .bg-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('img/header/header-3.jpeg') }}');
            height: 100%;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: fixed;
            width: 100%;
            z-index: -1;
            transform: scale(1.05);
        }

        .registration-container {
            padding: 60px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid var(--glass-border);
            border-radius: 30px;
            padding: 50px;
            width: 100%;
            max-width: 900px;
            box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.6);
            animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-section {
            text-align: center;
            margin-bottom: 45px;
        }

        .header-section h1 {
            font-weight: 800;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .header-section p {
            opacity: 0.6;
            font-size: 1.1rem;
        }

        .form-section-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--glass-border);
            color: var(--primary-yellow);
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
            color: rgba(255, 255, 255, 0.8);
        }

        .form-control,
        .form-select {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            padding: 12px 18px;
            color: white !important;
            transition: all 0.3s ease;
        }

        .form-select option {
            background-color: #1a1a1a;
            color: white;
        }

        .form-control:focus,
        .form-select:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--primary-yellow);
            box-shadow: 0 0 0 4px rgba(255, 204, 0, 0.1);
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        .radio-group {
            display: flex;
            gap: 15px;
            background: rgba(255, 255, 255, 0.03);
            padding: 12px 18px;
            border-radius: 12px;
            border: 1px solid var(--glass-border);
            flex-wrap: wrap;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            font-weight: 500;
            transition: 0.3s;
        }

        .radio-option:hover {
            color: var(--primary-yellow);
        }

        .radio-option input {
            width: 18px;
            height: 18px;
            accent-color: var(--primary-yellow);
        }

        .price-display {
            background: linear-gradient(135deg, rgba(255, 204, 0, 0.1), rgba(255, 140, 66, 0.1));
            border: 1px solid rgba(255, 204, 0, 0.3);
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            margin-top: 30px;
        }

        .price-label {
            font-size: 0.9rem;
            opacity: 0.7;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 5px;
        }

        .price-value {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-yellow);
            text-shadow: 0 0 20px rgba(255, 204, 0, 0.3);
        }

        .btn-register {
            background: var(--primary-yellow);
            border: none;
            border-radius: 15px;
            padding: 18px;
            font-weight: 800;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #000;
            width: 100%;
            margin-top: 40px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 15px 30px -10px rgba(255, 204, 0, 0.4);
        }

        .btn-register:hover {
            background: white;
            transform: translateY(-5px);
            box-shadow: 0 20px 40px -12px rgba(255, 204, 0, 0.5);
            color: black;
        }

        .success-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 1000;
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            backdrop-filter: blur(10px);
        }

        .success-card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            padding: 40px 30px;
            border-radius: 30px;
            max-width: 600px;
            width: 90%;
            margin: 20px;
            animation: slideUp 0.6s ease-out;
            overflow-y: auto;
            max-height: 90vh;
        }

        .check-icon {
            font-size: 5rem;
            color: #3fab30;
            margin-bottom: 30px;
        }

        .btn-marathon {
            background-color: var(--primary-yellow);
            color: var(--dark-bg);
            font-weight: 700;
            padding: 12px 30px;
            border-radius: 30px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 2px solid var(--primary-yellow);
            box-shadow: 0 4px 15px rgba(244, 198, 61, 0.3);
            display: inline-block;
            text-decoration: none;
            width: 100%;
        }

        .btn-marathon:hover {
            background-color: transparent;
            color: var(--primary-yellow);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(244, 198, 61, 0.4);
        }

        .error-alert {
            background: rgba(220, 53, 69, 0.15);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #ff8080;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            display: none;
        }

        #loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1001;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(255, 204, 0, 0.2);
            border-top: 5px solid var(--primary-yellow);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @media (max-width: 768px) {
            .registration-container {
                padding: 30px 15px;
            }

            .glass-card {
                padding: 30px 20px;
            }

            .header-section h1 {
                font-size: 1.8rem;
            }

            .header-section p {
                font-size: 1rem;
            }

            .form-section-title {
                font-size: 1.1rem;
                margin-bottom: 20px;
            }

            .price-display {
                padding: 20px;
            }

            .price-value {
                font-size: 1.8rem;
            }

            .success-card {
                padding: 30px 20px;
                border-radius: 24px;
            }

            .check-icon {
                font-size: 4rem;
                margin-bottom: 20px;
            }

            .success-card h2 {
                font-size: 1.5rem;
            }

            #payment-instructions {
                padding: 20px !important;
                font-size: 0.9rem;
            }

            #payment-instructions h5 {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .radio-group {
                flex-direction: column;
                gap: 10px;
            }

            .header-section h1 {
                font-size: 1.5rem;
            }

            .price-value {
                font-size: 1.6rem;
            }
        }
    </style>
</head>

<body>
    <div class="bg-image"></div>

    <div id="loading-overlay">
        <div style="display: flex; flex-direction: column; align-items: center;">
            <div class="spinner mb-3"></div>
            <div style="background: rgba(255,255,255,0.9); padding: 8px 15px; border-radius: 25px;">
                <span style="color: black; font-weight: 600; font-size: 0.9rem;">
                    Powered by <span style="color: #940000;">EmCa Technologies</span>
                </span>
            </div>
        </div>
    </div>

    <div class="registration-container">
        <div class="glass-card">
            <div class="header-section">
                <div class="text-center mb-3">
                    <img src="{{ asset('img/logo/swahili Marathon.jpeg') }}" alt="Swahili Marathon Logo"
                        style="max-width: 120px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
                </div>
                <h1>Race Registration</h1>
                <p>Secure your spot in the Swahili Marathon 2026</p>
            </div>

            <div id="error-box" class="error-alert"></div>

            <!-- China International Marathon Announcement -->
            <div class="china-marathon-banner" id="chinaBanner">
                <button class="china-banner-close" onclick="document.getElementById('chinaBanner').style.display='none'"
                    title="Dismiss">&times;</button>
                <div class="china-banner-inner">
                    <div class="china-banner-body">
                        <div class="china-banner-badge">🌏 Coming Soon &nbsp;·&nbsp; International Event</div>
                        <h4 class="china-banner-title">China International Marathon 2026</h4>
                        <p class="china-banner-desc">
                            We are excited to announce that an <strong>international marathon event in China</strong> is
                            being organised for our runners!
                            Registration will officially open once the event date is confirmed.
                            <strong>Stay tuned for updates.</strong>
                        </p>
                        <div class="china-banner-footer">
                            <span><i class="fas fa-map-marker-alt"></i> China</span>
                            <span><i class="fas fa-calendar-alt"></i> Date: To Be Announced</span>
                            <span><i class="fas fa-users"></i> Open to All Categories</span>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .china-marathon-banner {
                    position: relative;
                    margin-bottom: 35px;
                    border-radius: 18px;
                    overflow: hidden;
                    background: linear-gradient(135deg, rgba(180, 0, 0, 0.18) 0%, rgba(255, 204, 0, 0.10) 100%);
                    border: 1px solid rgba(200, 30, 30, 0.4);
                    box-shadow: 0 8px 32px rgba(180, 0, 0, 0.18), 0 0 0 1px rgba(255, 204, 0, 0.1) inset;
                    animation: bannerPulse 3s ease-in-out infinite;
                }

                @keyframes bannerPulse {

                    0%,
                    100% {
                        box-shadow: 0 8px 32px rgba(180, 0, 0, 0.18), 0 0 0 1px rgba(255, 204, 0, 0.1) inset;
                    }

                    50% {
                        box-shadow: 0 8px 42px rgba(180, 0, 0, 0.30), 0 0 0 1px rgba(255, 204, 0, 0.22) inset;
                    }
                }

                .china-banner-inner {
                    display: flex;
                    align-items: flex-start;
                    gap: 20px;
                    padding: 22px 25px;
                }

                .china-banner-flag {
                    font-size: 3rem;
                    flex-shrink: 0;
                    filter: drop-shadow(0 2px 8px rgba(200, 30, 30, 0.4));
                    margin-top: 4px;
                }

                .china-banner-body {
                    flex: 1;
                }

                .china-banner-badge {
                    display: inline-block;
                    background: rgba(200, 30, 30, 0.25);
                    border: 1px solid rgba(200, 30, 30, 0.5);
                    color: #ffcc00;
                    font-size: 0.7rem;
                    font-weight: 700;
                    text-transform: uppercase;
                    letter-spacing: 1.5px;
                    padding: 4px 12px;
                    border-radius: 50px;
                    margin-bottom: 10px;
                }

                .china-banner-title {
                    font-size: 1.3rem;
                    font-weight: 800;
                    color: #fff;
                    margin-bottom: 8px;
                    line-height: 1.3;
                }

                .china-banner-desc {
                    font-size: 0.92rem;
                    color: rgba(255, 255, 255, 0.82);
                    margin-bottom: 14px;
                    line-height: 1.6;
                }

                .china-banner-desc strong {
                    color: #ffcc00;
                }

                .china-banner-footer {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 16px;
                    font-size: 0.8rem;
                    color: rgba(255, 255, 255, 0.6);
                }

                .china-banner-footer span i {
                    margin-right: 5px;
                    color: rgba(200, 30, 30, 0.85);
                }

                .china-banner-close {
                    position: absolute;
                    top: 10px;
                    right: 14px;
                    background: none;
                    border: none;
                    color: rgba(255, 255, 255, 0.45);
                    font-size: 1.3rem;
                    cursor: pointer;
                    line-height: 1;
                    padding: 0;
                    transition: color 0.2s;
                }

                .china-banner-close:hover {
                    color: #fff;
                }

                @media (max-width: 576px) {
                    .china-banner-flag {
                        font-size: 2rem;
                    }

                    .china-banner-title {
                        font-size: 1.1rem;
                    }

                    .china-banner-footer {
                        gap: 10px;
                        font-size: 0.75rem;
                    }
                }
            </style>

            <!-- === MODE TOGGLE === -->
            <div class="d-flex gap-3 mb-4" style="gap:12px;">
                <button type="button" id="btn-individual" onclick="setMode('individual')" class="btn flex-fill py-3"
                    style="border-radius:14px; font-weight:700; font-size:1rem;
                    background:var(--primary-yellow); color:#000; border:none;">
                    <i class="fas fa-user me-2"></i> Individual
                </button>
                <button type="button" id="btn-group" onclick="setMode('group')" class="btn flex-fill py-3" style="border-radius:14px; font-weight:700; font-size:1rem;
                    background:rgba(255,255,255,0.08); color:#fff; border:1px solid rgba(255,255,255,0.2);">
                    <i class="fas fa-users me-2"></i> Group / Bulk
                </button>
            </div>

            <div id="error-box-group" class="error-alert"></div>

            <!-- ===== GROUP FORM ===== -->
            <div id="group-form-section" style="display:none;">
                <div class="form-section-title">1. Group Leader Information</div>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Leader Full Name</label>
                        <input type="text" id="g-leader-name" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Leader Phone</label>
                        <input type="text" id="g-leader-phone" class="form-control" placeholder="712345678">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Group / Club Name <span
                                style="opacity:.5;font-weight:400">(Optional)</span></label>
                        <input type="text" id="g-group-name" class="form-control"
                            placeholder="e.g. Mwanza Runners Club">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Leader Email <span
                                style="opacity:.5;font-weight:400">(Optional)</span></label>
                        <input type="email" id="g-leader-email" class="form-control" placeholder="leader@email.com">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Registration Type</label>
                        <div class="radio-group">
                            <label class="radio-option">
                                <input type="radio" name="g-type" value="adult" checked onchange="updateGroupPrice()">
                                Adult (40,000 TZS base)
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="g-type" value="student" onchange="updateGroupPrice()"> Student
                                (20,000 TZS base)
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-section-title">2. Group Members <span
                        style="font-weight:400;font-size:.95rem;color:rgba(255,255,255,.6)">(minimum 2)</span></div>

                <div id="members-container"></div>

                <button type="button" onclick="addMember()" class="btn mt-2 mb-4"
                    style="background:rgba(255,255,255,0.08);border:1px dashed rgba(255,255,255,.3);color:#fff;border-radius:12px;padding:10px 24px;font-weight:600;">
                    <i class="fas fa-plus me-2"></i> Add Member
                </button>

                <!-- Discount & Price Summary -->
                <div class="price-display mb-3" id="group-price-display">
                    <div class="price-label">Group Registration Fee</div>
                    <div style="font-size:1rem;opacity:.7;margin-bottom:6px;" id="group-discount-line">Add at least 2
                        members to see discount</div>
                    <div class="price-value" id="group-total-price">-- TZS</div>
                </div>

                <button type="button" onclick="handleGroupRegistration()" class="btn btn-register">
                    Confirm Group Registration
                </button>
            </div>
            <!-- ===== END GROUP FORM ===== -->

            <form id="registration-form" onsubmit="handleRegistration(event)">
                @csrf
                <div class="form-section-title">1. Runner Information</div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email Address <span
                                style="opacity:0.5; font-weight:400; text-transform:none; letter-spacing:0;">(Optional)</span></label>
                        <input type="email" name="email" class="form-control" placeholder="your@email.com">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-select" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="form-section-title">2. Location & Contact</div>
                <!-- Nationality Selection First -->
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nationality</label>
                        <div class="radio-group">
                            <label class="radio-option">
                                <input type="radio" name="nationality" value="Tanzanian" checked
                                    onchange="toggleNationality(this)"> Tanzanian
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="nationality" value="International"
                                    onchange="toggleNationality(this)"> International
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3" id="region-section">
                        <label class="form-label">Region (Tanzania)</label>
                        <select name="region" class="form-select">
                            <option value="">Select Region</option>
                            <option value="Arusha">Arusha</option>
                            <option value="Dar es Salaam">Dar es Salaam</option>
                            <option value="Dodoma">Dodoma</option>
                            <option value="Geita">Geita</option>
                            <option value="Iringa">Iringa</option>
                            <option value="Kagera">Kagera</option>
                            <option value="Katavi">Katavi</option>
                            <option value="Kigoma">Kigoma</option>
                            <option value="Kilimanjaro">Kilimanjaro</option>
                            <option value="Lindi">Lindi</option>
                            <option value="Manyara">Manyara</option>
                            <option value="Mara">Mara</option>
                            <option value="Mbeya">Mbeya</option>
                            <option value="Mjini Magharibi">Mjini Magharibi</option>
                            <option value="Morogoro">Morogoro</option>
                            <option value="Mtwara">Mtwara</option>
                            <option value="Mwanza">Mwanza</option>
                            <option value="Njombe">Njombe</option>
                            <option value="Pemba Kaskazini">Pemba Kaskazini</option>
                            <option value="Pemba Kusini">Pemba Kusini</option>
                            <option value="Pwani">Pwani</option>
                            <option value="Rukwa">Rukwa</option>
                            <option value="Ruvuma">Ruvuma</option>
                            <option value="Shinyanga">Shinyanga</option>
                            <option value="Simiyu">Simiyu</option>
                            <option value="Singida">Singida</option>
                            <option value="Songwe">Songwe</option>
                            <option value="Tabora">Tabora</option>
                            <option value="Tanga">Tanga</option>
                            <option value="Unguja Kaskazini">Unguja Kaskazini</option>
                            <option value="Unguja Kusini">Unguja Kusini</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3 d-none" id="country-section">
                        <label class="form-label">Country</label>
                        <select name="country" id="country-select" class="form-select" onchange="updatePhoneCode()">
                            <option value="">Select Country</option>
                            <!-- Populated by JS -->
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone Number</label>
                        <div class="input-group">
                            <select name="phone_code" id="phone-code" class="form-select"
                                style="max-width: 130px; background-color: #3d3d3d; font-weight: 700; color: #fff; border: 1px solid #555;">
                                <option value="+255">+255 (TZ)</option>
                            </select>
                            <input type="text" name="phone" id="phone-input" class="form-control"
                                placeholder="712345678" required>
                        </div>
                        <div class="form-text text-white-50">Enter number without countrty code (e.g., 712345678)</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">T-Shirt Size</label>
                        <select name="t_shirt_size" class="form-select" required>
                            <option value="">Select Size</option>
                            <option value="S">Small (S)</option>
                            <option value="M">Medium (M)</option>
                            <option value="L">Large (L)</option>
                            <option value="XL">Extra Large (XL)</option>
                            <option value="XXL">XXL</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-4 d-none" id="passport-section">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Passport Number</label>
                        <input type="text" name="passport_number" class="form-control">
                    </div>
                </div>

                <div class="form-section-title">3. Registration Details</div>
                <div class="row mb-4">
                    <div class="col-md-12 mb-3" id="type-section">
                        <label class="form-label">Registration Type</label>
                        <div class="radio-group">
                            <label class="radio-option">
                                <input type="radio" name="type" value="adult" checked onchange="toggleStudent()"> Adult
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="type" value="student" onchange="toggleStudent()"> Student
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 d-none" id="student-section">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Institution / College</label>
                        <input type="text" name="institution_name" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Registration Number</label>
                        <input type="text" name="student_id" class="form-control">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Race Distance</label>
                        <select name="category_id" id="category_id" class="form-select" onchange="updatePrice()"
                            required>
                            <option value="">Loading distances...</option>
                        </select>
                    </div>
                </div>

                <div class="price-display">
                    <div class="price-label">Registration Fee</div>
                    <div class="price-value" id="total-price">-- TZS</div>
                </div>

                <button type="submit" class="btn btn-register">Confirm Registration</button>
            </form>

            <div class="text-center mt-4 pt-3 border-top border-secondary">
                <a href="{{ url('/') }}" class="mt-3 d-inline-block text-white-50 text-decoration-none"><i
                        class="fas fa-arrow-left me-2"></i>Back to Home</a>
            </div>
        </div>
    </div>

    <!-- Success Overlay -->
    <div id="success-overlay" class="success-overlay">
        <div class="success-card">
            <i class="fas fa-check-circle check-icon"></i>
            <h2 class="mb-3">Registration Successful!</h2>
            <p class="mb-4 opacity-75" id="success-message"></p>
            <div id="payment-instructions" class="text-start bg-dark p-4 rounded-4 mb-4"
                style="border: 1px dashed var(--primary-yellow)">
                <!-- Dynamic payment instructions will go here -->
            </div>
            <a href="{{ url('/') }}" class="btn btn-marathon" style="max-width: 250px;">Go to Homepage</a>

            <div class="mt-4 pt-3 border-top border-secondary">
                <span
                    style="color: black; background: rgba(255,255,255,0.8); padding: 5px 10px; border-radius: 20px; font-weight: 600; font-size: 0.85rem;">
                    Powered by <span style="color: #940000;">EmCa Technologies</span>
                </span>
            </div>
        </div>
    </div>

    <script>
        // Use origin-based URL to avoid protocol mismatch (HTTPS/HTTP)
        const apiBase = window.location.origin + '/api';
        let categories = [];

        // Country data with phone codes
        const countryData = [{ name: "Afghanistan", code: "+93" }, { name: "Albania", code: "+355" }, { name: "Algeria", code: "+213" }, { name: "Andorra", code: "+376" }, { name: "Angola", code: "+244" }, { name: "Argentina", code: "+54" }, { name: "Armenia", code: "+374" }, { name: "Australia", code: "+61" }, { name: "Austria", code: "+43" }, { name: "Azerbaijan", code: "+994" }, { name: "Bahrain", code: "+973" }, { name: "Bangladesh", code: "+880" }, { name: "Belarus", code: "+375" }, { name: "Belgium", code: "+32" }, { name: "Benin", code: "+229" }, { name: "Bhutan", code: "+975" }, { name: "Bolivia", code: "+591" }, { name: "Bosnia and Herzegovina", code: "+387" }, { name: "Botswana", code: "+267" }, { name: "Brazil", code: "+55" }, { name: "Brunei", code: "+673" }, { name: "Bulgaria", code: "+359" }, { name: "Burkina Faso", code: "+226" }, { name: "Burundi", code: "+257" }, { name: "Cambodia", code: "+855" }, { name: "Cameroon", code: "+237" }, { name: "Canada", code: "+1" }, { name: "Central African Republic", code: "+236" }, { name: "Chad", code: "+235" }, { name: "Chile", code: "+56" }, { name: "China", code: "+86" }, { name: "Colombia", code: "+57" }, { name: "Comoros", code: "+269" }, { name: "Congo", code: "+242" }, { name: "Costa Rica", code: "+506" }, { name: "Croatia", code: "+385" }, { name: "Cuba", code: "+53" }, { name: "Cyprus", code: "+357" }, { name: "Czech Republic", code: "+420" }, { name: "Denmark", code: "+45" }, { name: "Djibouti", code: "+253" }, { name: "DR Congo", code: "+243" }, { name: "Ecuador", code: "+593" }, { name: "Egypt", code: "+20" }, { name: "El Salvador", code: "+503" }, { name: "Equatorial Guinea", code: "+240" }, { name: "Eritrea", code: "+291" }, { name: "Estonia", code: "+372" }, { name: "Eswatini", code: "+268" }, { name: "Ethiopia", code: "+251" }, { name: "Fiji", code: "+679" }, { name: "Finland", code: "+358" }, { name: "France", code: "+33" }, { name: "Gabon", code: "+241" }, { name: "Gambia", code: "+220" }, { name: "Georgia", code: "+995" }, { name: "Germany", code: "+49" }, { name: "Ghana", code: "+233" }, { name: "Greece", code: "+30" }, { name: "Guatemala", code: "+502" }, { name: "Guinea", code: "+224" }, { name: "Guyana", code: "+592" }, { name: "Haiti", code: "+509" }, { name: "Honduras", code: "+504" }, { name: "Hungary", code: "+36" }, { name: "Iceland", code: "+354" }, { name: "India", code: "+91" }, { name: "Indonesia", code: "+62" }, { name: "Iran", code: "+98" }, { name: "Iraq", code: "+964" }, { name: "Ireland", code: "+353" }, { name: "Israel", code: "+972" }, { name: "Italy", code: "+39" }, { name: "Ivory Coast", code: "+225" }, { name: "Jamaica", code: "+1876" }, { name: "Japan", code: "+81" }, { name: "Jordan", code: "+962" }, { name: "Kazakhstan", code: "+7" }, { name: "Kenya", code: "+254" }, { name: "Kiribati", code: "+686" }, { name: "Kuwait", code: "+965" }, { name: "Kyrgyzstan", code: "+996" }, { name: "Laos", code: "+856" }, { name: "Latvia", code: "+371" }, { name: "Lebanon", code: "+961" }, { name: "Lesotho", code: "+266" }, { name: "Liberia", code: "+231" }, { name: "Libya", code: "+218" }, { name: "Liechtenstein", code: "+423" }, { name: "Lithuania", code: "+370" }, { name: "Luxembourg", code: "+352" }, { name: "Madagascar", code: "+261" }, { name: "Malawi", code: "+265" }, { name: "Malaysia", code: "+60" }, { name: "Maldives", code: "+960" }, { name: "Mali", code: "+223" }, { name: "Malta", code: "+356" }, { name: "Marshall Islands", code: "+692" }, { name: "Mauritania", code: "+222" }, { name: "Mauritius", code: "+230" }, { name: "Mexico", code: "+52" }, { name: "Micronesia", code: "+691" }, { name: "Moldova", code: "+373" }, { name: "Monaco", code: "+377" }, { name: "Mongolia", code: "+976" }, { name: "Montenegro", code: "+382" }, { name: "Morocco", code: "+212" }, { name: "Mozambique", code: "+258" }, { name: "Myanmar", code: "+95" }, { name: "Namibia", code: "+264" }, { name: "Nauru", code: "+674" }, { name: "Nepal", code: "+977" }, { name: "Netherlands", code: "+31" }, { name: "New Zealand", code: "+64" }, { name: "Nicaragua", code: "+505" }, { name: "Niger", code: "+227" }, { name: "Nigeria", code: "+234" }, { name: "North Korea", code: "+850" }, { name: "North Macedonia", code: "+389" }, { name: "Norway", code: "+47" }, { name: "Oman", code: "+968" }, { name: "Pakistan", code: "+92" }, { name: "Palau", code: "+680" }, { name: "Panama", code: "+507" }, { name: "Papua New Guinea", code: "+675" }, { name: "Paraguay", code: "+595" }, { name: "Peru", code: "+51" }, { name: "Philippines", code: "+63" }, { name: "Poland", code: "+48" }, { name: "Portugal", code: "+351" }, { name: "Qatar", code: "+974" }, { name: "Romania", code: "+40" }, { name: "Russia", code: "+7" }, { name: "Rwanda", code: "+250" }, { name: "Samoa", code: "+685" }, { name: "San Marino", code: "+378" }, { name: "Sao Tome & Principe", code: "+239" }, { name: "Saudi Arabia", code: "+966" }, { name: "Senegal", code: "+221" }, { name: "Serbia", code: "+381" }, { name: "Seychelles", code: "+248" }, { name: "Sierra Leone", code: "+232" }, { name: "Singapore", code: "+65" }, { name: "Slovakia", code: "+421" }, { name: "Slovenia", code: "+386" }, { name: "Solomon Islands", code: "+677" }, { name: "Somalia", code: "+252" }, { name: "South Africa", code: "+27" }, { name: "South Korea", code: "+82" }, { name: "South Sudan", code: "+211" }, { name: "Spain", code: "+34" }, { name: "Sri Lanka", code: "+94" }, { name: "Sudan", code: "+249" }, { name: "Suriname", code: "+597" }, { name: "Sweden", code: "+46" }, { name: "Switzerland", code: "+41" }, { name: "Syria", code: "+963" }, { name: "Taiwan", code: "+886" }, { name: "Tajikistan", code: "+992" }, { name: "Tanzania", code: "+255" }, { name: "Thailand", code: "+66" }, { name: "Timor-Leste", code: "+670" }, { name: "Togo", code: "+228" }, { name: "Tonga", code: "+676" }, { name: "Tunisia", code: "+216" }, { name: "Turkey", code: "+90" }, { name: "Turkmenistan", code: "+993" }, { name: "Tuvalu", code: "+688" }, { name: "Uganda", code: "+256" }, { name: "Ukraine", code: "+380" }, { name: "UAE", code: "+971" }, { name: "UK", code: "+44" }, { name: "USA", code: "+1" }, { name: "Uruguay", code: "+598" }, { name: "Uzbekistan", code: "+998" }, { name: "Vanuatu", code: "+678" }, { name: "Venezuela", code: "+58" }, { name: "Vietnam", code: "+84" }, { name: "Yemen", code: "+967" }, { name: "Zambia", code: "+260" }, { name: "Zimbabwe", code: "+263" }].sort((a, b) => a.name.localeCompare(b.name));

        // Populate Country Dropdown
        function populateCountries() {
            const select = document.getElementById('country-select');
            countryData.forEach(country => {
                // Skip Tanzania in the international list to avoid confusion
                if (country.name !== 'Tanzania') {
                    const option = document.createElement('option');
                    option.value = country.name;
                    option.textContent = country.name;
                    option.setAttribute('data-code', country.code);
                    select.appendChild(option);
                }
            });
        }

        // Update Phone Code when country changes
        function updatePhoneCode() {
            const countrySelect = document.getElementById('country-select');
            const phoneCodeSelect = document.getElementById('phone-code');
            const selectedOption = countrySelect.options[countrySelect.selectedIndex];

            if (selectedOption && selectedOption.getAttribute('data-code')) {
                const code = selectedOption.getAttribute('data-code');
                // Update the phone code select option
                phoneCodeSelect.innerHTML = `<option value="${code}">${code}</option>`;
            }
        }

        // Toggle Nationality logic
        function toggleNationality(input) {
            const isLocal = input.value === 'Tanzanian';
            const phoneCodeSelect = document.getElementById('phone-code');

            // Toggle Sections
            document.getElementById('region-section').classList.toggle('d-none', !isLocal);
            document.getElementById('country-section').classList.toggle('d-none', isLocal);
            document.getElementById('passport-section').classList.toggle('d-none', isLocal);

            // Set required attributes
            const regionSelect = document.querySelector('select[name="region"]');
            const countrySelect = document.querySelector('select[name="country"]');
            const passportInput = document.querySelector('input[name="passport_number"]');

            if (isLocal) {
                regionSelect.setAttribute('required', '');
                countrySelect.removeAttribute('required');
                passportInput.removeAttribute('required');

                // Reset phone code to +255 and make it look fixed
                phoneCodeSelect.innerHTML = '<option value="+255">+255 (TZ)</option>';
                phoneCodeSelect.style.backgroundColor = '#2b2b2b'; // Darker visual cue for readonly-like state
                phoneCodeSelect.style.color = '#aaa';
            } else {
                regionSelect.removeAttribute('required');
                countrySelect.setAttribute('required', '');
                passportInput.setAttribute('required', '');

                // Allow dynamic update based on country
                phoneCodeSelect.style.backgroundColor = '#3d3d3d';
                phoneCodeSelect.style.color = '#fff';
                updatePhoneCode(); // Set based on currently selected country (if any)
            }

            updatePrice();
        }

        // Toggle Student Fields
        function toggleStudent() {
            const typeRadio = document.querySelector('input[name="type"]:checked');
            // Check if type radio exists (it might be hidden or not yet selected)
            if (!typeRadio) return;

            const type = typeRadio.value;
            const isStudent = type === 'student';

            document.getElementById('student-section').classList.toggle('d-none', !isStudent);

            const institution = document.querySelector('input[name="institution_name"]');
            const regNum = document.querySelector('input[name="student_id"]');

            if (isStudent) {
                institution.setAttribute('required', '');
                regNum.setAttribute('required', '');
            } else {
                institution.removeAttribute('required');
                regNum.removeAttribute('required');
            }

            updatePrice();
        }

        let exchangeRate = 2455; // Default fallback (matching backend)

        // Fetch Exchange Rate
        async function fetchExchangeRate() {
            try {
                // Uses the same service logic but exposed via a simple endpoint (or we can just hardcode a safe average if no endpoint exists)
                // For now, let's use a safe average since we don't have a public public/api/exchange-rate endpoint yet.
                // TODO: Create an endpoint for this if real-time precision is needed.
                // For now, let's assume 2700 based on current trends, or better, pass it from the controller if possible.
                // Actually, the best way is to fetch it from our backend service.
                const response = await fetch(`${apiBase}/exchange-rate`);
                if (response.ok) {
                    const data = await response.json();
                    exchangeRate = data.rate;
                }
            } catch (e) {
                console.warn('Could not fetch live rate, using default:', exchangeRate);
            }
        }

        // Fetch Categories via AJAX
        async function fetchCategories() {
            const registerBtn = document.querySelector('.btn-register');
            const groupRegisterBtn = document.querySelector('button[onclick="handleGroupRegistration()"]');

            if (registerBtn) registerBtn.disabled = true;
            if (groupRegisterBtn) groupRegisterBtn.disabled = true;

            try {
                const response = await fetch(`${apiBase}/categories`);
                if (!response.ok) throw new Error('Could not fetch categories');

                categories = await response.json();

                // Populate individual form select
                const select = document.getElementById('category_id');
                if (select) {
                    select.innerHTML = '<option value="">Select Distance</option>';
                    categories.forEach(cat => {
                        const count = Number(cat.registrations_count || 0);
                        const limit = Number(cat.registration_limit || 0);
                        const isFull = count >= limit;

                        const option = document.createElement('option');
                        option.value = cat.id;
                        option.disabled = isFull;
                        option.textContent = `${cat.name} (${count}/${limit})${isFull ? ' [FULL]' : ''}`;
                        select.appendChild(option);
                    });

                    if (categories.length > 0) {
                        select.value = categories[0].id;
                        if (registerBtn) registerBtn.disabled = false;
                        if (groupRegisterBtn) groupRegisterBtn.disabled = false;
                        updatePrice();
                    }
                }

                // NEW: Populate any existing group member dropdowns that were created before fetch finished
                updateAllMemberDropdowns();
            } catch (err) {
                console.error('Failed to load categories', err);
                const errBox = document.getElementById('error-box');
                const groupErrBox = document.getElementById('error-box-group');
                const msg = "FAILED TO CONNECT: Please check your internet or server connection. (Race distances could not be loaded)";

                if (errBox) {
                    errBox.textContent = msg;
                    errBox.style.display = 'block';
                }
                if (groupErrBox) {
                    groupErrBox.textContent = msg;
                    groupErrBox.style.display = 'block';
                }
            }
        }

        // NEW: Helper to populate dropdowns in group member cards
        function updateAllMemberDropdowns() {
            const dropdowns = document.querySelectorAll('.m-category');
            const options = categories.map(c => {
                const isFull = c.registrations_count >= c.registration_limit;
                return `<option value="${c.id}" ${isFull ? 'disabled' : ''}>${c.name} ${isFull ? '[FULL]' : ''}</option>`;
            }).join('');

            dropdowns.forEach(dd => {
                const currentVal = dd.value;
                dd.innerHTML = `<option value="">Select distance</option>${options}`;
                if (currentVal) dd.value = currentVal;
            });
        }

        // Update Price logic
        function updatePrice() {
            const nationalityInput = document.querySelector('input[name="nationality"]:checked');
            const typeInput = document.querySelector('input[name="type"]:checked');
            const categoryId = document.getElementById('category_id').value;
            const display = document.getElementById('total-price');

            if (!categoryId || !nationalityInput || !typeInput) {
                display.textContent = "--";
                return;
            }

            const category = categories.find(c => c.id == categoryId);
            if (!category) {
                display.textContent = "--";
                return;
            }

            const nationality = nationalityInput.value;
            const type = typeInput.value;

            let price;
            let currency;

            if (nationality === 'Tanzanian') {
                // Fixed flat rate as per client request
                price = 40000;
                currency = 'TZS';
            } else {
                // Dynamic international pricing based on current exchange rate
                price = (40000 / exchangeRate).toFixed(2);
                currency = 'USD';
            }

            // Apply 50% discount for students
            if (type === 'student') {
                price = (price * 0.5).toFixed(2);
                // Handle different types (string for USD, number for TZS) logic if needed, but here simple math works
            }

            // Format appropriately
            if (currency === 'USD') {
                display.textContent = `$${price} USD`;
            } else {
                display.textContent = `${parseInt(price).toLocaleString()} TZS`;
            }
        }

        // Handle Registration form submission
        async function handleRegistration(e) {
            e.preventDefault();
            const form = e.target;
            const errorBox = document.getElementById('error-alert');
            const loading = document.getElementById('loading-overlay');

            loading.style.display = 'flex';
            document.getElementById('error-box').style.display = 'none';

            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());

            // Combine phone code and phone number
            if (data.phone_code && data.phone) {
                data.phone = data.phone_code + data.phone;
            }

            try {
                const response = await fetch(`${apiBase}/register`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (!response.ok) {
                    if (response.status === 422 && result.errors) {
                        const errorMessages = Object.values(result.errors).flat().join('<br>');
                        throw new Error(errorMessages);
                    }
                    throw new Error(result.message || 'Registration failed');
                }

                // Show Success
                document.getElementById('success-message').textContent = `Hello ${data.first_name}, you have successfully registered for the ${categories.find(c => c.id == data.category_id).name}!`;

                const priceStr = document.getElementById('total-price').textContent;
                const isInternational = data.nationality === 'International';

                if (isInternational) {
                    document.getElementById('payment-instructions').innerHTML = `
                        <h5 class="text-warning mb-3"><i class="fas fa-credit-card me-2"></i>Payment Instructions</h5>
                        <p class="mb-2">Please pay <strong>${priceStr}</strong> to complete your registration:</p>
                        <ul class="list-unstyled mb-0">
                            <li><strong>1. Bank Transfer:</strong> AZANIA BANK Plc.</li>
                            <li><strong>2. Account Name:</strong> Africa Sports Agency Company Limited (ASA)</li>
                            <li><strong>3. Account Number:</strong> 008000151395</li>
                            <li><strong>4. SWIFT Code:</strong> AZANTZTZ</li>
                            <li><strong>5. Important:</strong> After payment, please keep your bank slip or transaction receipt - you will need it for payment verification.</li>
                            <li class="mt-3 text-white-50 small"><i class="fas fa-info-circle me-1"></i> Your Bib number will be assigned after payment verification.</li>
                        </ul>
                    `;
                } else {
                    document.getElementById('payment-instructions').innerHTML = `
                        <h5 class="text-warning mb-3"><i class="fas fa-mobile-alt me-2"></i>Payment Instructions</h5>
                        <p class="mb-2">Please pay <strong>${priceStr}</strong> to complete your registration:</p>
                        <ul class="list-unstyled mb-0">
                            <li><strong>1. Mobile Money:</strong> Pay to LIPA NAMBA <strong>5935033 (MIX BY YAS)</strong></li>
                            <li><strong>2. Account Name:</strong> <strong>SWAHILI MARATHON</strong></li>
                            <li><strong>3. Important:</strong> After payment, you will receive a confirmation SMS with a unique transaction reference. <strong>Please keep this reference number</strong> - you will need it for payment verification.</li>
                            <li class="mt-3 text-white-50 small"><i class="fas fa-info-circle me-1"></i> Your Bib number will be assigned after payment verification.</li>
                        </ul>
                    `;
                }

                document.getElementById('success-overlay').style.display = 'flex';
            } catch (err) {
                document.getElementById('error-box').textContent = err.message;
                document.getElementById('error-box').style.display = 'block';
                window.scrollTo({ top: 0, behavior: 'smooth' });
            } finally {
                loading.style.display = 'none';
            }
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            fetchExchangeRate(); // Enable live rate fetching
            fetchCategories();
            populateCountries();
            toggleNationality(document.querySelector('input[name="nationality"]:checked'));
            toggleStudent();
            // Start with 2 default members
            addMember(); addMember();
        });

        // ===================== GROUP REGISTRATION JS =====================

        let memberCount = 0;

        function setMode(mode) {
            const isGroup = (mode === 'group');
            document.getElementById('group-form-section').style.display = isGroup ? 'block' : 'none';
            document.getElementById('registration-form').style.display = isGroup ? 'none' : 'block';
            // Toggle button styles
            document.getElementById('btn-individual').style.background = isGroup ? 'rgba(255,255,255,0.08)' : 'var(--primary-yellow)';
            document.getElementById('btn-individual').style.color = isGroup ? '#fff' : '#000';
            document.getElementById('btn-individual').style.border = isGroup ? '1px solid rgba(255,255,255,0.2)' : 'none';
            document.getElementById('btn-group').style.background = isGroup ? 'var(--primary-yellow)' : 'rgba(255,255,255,0.08)';
            document.getElementById('btn-group').style.color = isGroup ? '#000' : '#fff';
            document.getElementById('btn-group').style.border = isGroup ? 'none' : '1px solid rgba(255,255,255,0.2)';
        }

        function addMember() {
            const idx = memberCount++;
            const container = document.getElementById('members-container');
            const optionsHtml = categories.map(c => {
                const isFull = c.registrations_count >= c.registration_limit;
                return `<option value="${c.id}" ${isFull ? 'disabled' : ''}>${c.name} ${isFull ? '[FULL]' : ''}</option>`;
            }).join('');

            const card = document.createElement('div');
            card.className = 'mb-3 p-3';
            card.id = `member-card-${idx}`;
            card.style.cssText = 'background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.12);border-radius:16px;';
            card.innerHTML = `
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span style="font-weight:700;color:var(--primary-yellow);">Member ${container.children.length + 1}</span>
                    <button type="button" onclick="removeMember(${idx})"
                        style="background:none;border:none;color:rgba(255,100,100,.8);cursor:pointer;font-size:1.2rem;" title="Remove">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Member Full Name</label>
                        <input type="text" class="form-control m-full-name" data-idx="${idx}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Gender</label>
                        <select class="form-select m-gender" data-idx="${idx}">
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">T-Shirt Size</label>
                        <select class="form-select m-tshirt" data-idx="${idx}">
                            <option value="">Select</option>
                            <option value="S">S</option><option value="M">M</option>
                            <option value="L">L</option><option value="XL">XL</option><option value="XXL">XXL</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Race Distance</label>
                        <select class="form-select m-category" data-idx="${idx}" onchange="updateGroupPrice()">
                            <option value="">Select distance</option>
                            ${optionsHtml}
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Phone <span style="opacity:.5;font-weight:400">(Optional)</span></label>
                        <input type="text" class="form-control m-phone" data-idx="${idx}" placeholder="712345678">
                    </div>
                </div>`;
            container.appendChild(card);
            updateGroupPrice();
            renumberMembers();
        }

        function removeMember(idx) {
            const el = document.getElementById(`member-card-${idx}`);
            if (el) el.remove();
            updateGroupPrice();
            renumberMembers();
        }

        function renumberMembers() {
            const cards = document.querySelectorAll('#members-container > div');
            cards.forEach((card, i) => {
                const label = card.querySelector('span[style*="primary-yellow"]');
                if (label) label.textContent = `Member ${i + 1}`;
            });
        }

        function getGroupType() {
            return document.querySelector('input[name="g-type"]:checked')?.value || 'adult';
        }

        function updateGroupPrice() {
            const memberCards = document.querySelectorAll('#members-container > div');
            const count = memberCards.length;
            const type = getGroupType();
            const base = type === 'student' ? 20000 : 40000;

            let discount = 0;
            if (count >= 10) discount = 20;
            else if (count >= 5) discount = 10;
            else if (count >= 2) discount = 5;

            const subtotal = count * base;
            const saving = subtotal * (discount / 100);
            const total = subtotal - saving;

            const discountLine = document.getElementById('group-discount-line');
            const totalEl = document.getElementById('group-total-price');

            if (count < 2) {
                discountLine.textContent = 'Add at least 2 members to see discount';
                totalEl.textContent = '-- TZS';
            } else {
                discountLine.innerHTML =
                    `${count} members × ${base.toLocaleString()} TZS` +
                    (discount > 0 ? ` &nbsp;—&nbsp; <span style="color:#3fab30;">${discount}% group discount applied (−${saving.toLocaleString()} TZS)</span>` : '');
                totalEl.textContent = `${total.toLocaleString()} TZS`;
            }
        }

        async function handleGroupRegistration() {
            const errorBox = document.getElementById('error-box-group');
            errorBox.style.display = 'none';

            const leaderName = document.getElementById('g-leader-name').value.trim();
            const leaderPhone = document.getElementById('g-leader-phone').value.trim();
            const groupName = document.getElementById('g-group-name').value.trim();
            const leaderEmail = document.getElementById('g-leader-email').value.trim();
            const type = getGroupType();

            if (!leaderName || !leaderPhone) {
                errorBox.textContent = 'Please fill in the leader name and phone number.';
                errorBox.style.display = 'block';
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return;
            }

            const memberCards = Array.from(document.querySelectorAll('#members-container > div'));
            if (memberCards.length < 2) {
                errorBox.textContent = 'Please add at least 2 members for group registration.';
                errorBox.style.display = 'block';
                return;
            }

            const members = [];
            for (let i = 0; i < memberCards.length; i++) {
                const card = memberCards[i];
                const fullName = card.querySelector('.m-full-name')?.value.trim();
                const gender = card.querySelector('.m-gender')?.value;
                const tshirt = card.querySelector('.m-tshirt')?.value;
                const cat = card.querySelector('.m-category')?.value;
                const phone = card.querySelector('.m-phone')?.value.trim();

                if (!fullName || !gender || !tshirt || !cat) {
                    errorBox.textContent = `Please complete all required fields for Member ${i + 1}.`;
                    errorBox.style.display = 'block';
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    return;
                }

                // Split full name: first word as first name, rest as last name
                const parts = fullName.split(/\s+/);
                const firstName = parts[0];
                const lastName = parts.slice(1).join(' ') || 'Runner';

                members.push({
                    first_name: firstName,
                    last_name: lastName,
                    gender,
                    t_shirt_size: tshirt,
                    category_id: cat,
                    phone: phone || null,
                    nationality: 'Tanzanian'
                });
            }

            document.getElementById('loading-overlay').style.display = 'flex';

            try {
                const res = await fetch(`${apiBase}/register-group`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '' },
                    body: JSON.stringify({ leader_name: leaderName, leader_phone: leaderPhone, leader_email: leaderEmail || null, group_name: groupName || null, registration_type: type, members })
                });

                const data = await res.json();

                if (!res.ok) {
                    const msgs = data.errors ? Object.values(data.errors).flat().join(' | ') : (data.message || 'Registration failed.');
                    throw new Error(msgs);
                }

                // Build success overlay content
                const pi = data.payment_info;
                const memberList = (data.members || []).map((m, i) =>
                    `<li>${m.runner.first_name} ${m.runner.last_name}</li>`
                ).join('');

                document.getElementById('success-message').innerHTML =
                    `Your group of <strong>${members.length}</strong> has been registered successfully!<br>
                     An SMS with payment instructions has been sent to <strong>+255${leaderPhone}</strong>.`;

                document.getElementById('payment-instructions').innerHTML = `
                    <h5 style="color:var(--primary-yellow);"><i class="fas fa-mobile-alt me-2"></i>Payment Instructions</h5>
                    <p><strong>Total Amount:</strong> ${Number(pi.amount).toLocaleString()} ${pi.currency}</p>
                    <p><strong>Lipa Number:</strong> ${pi.lipa_number}</p>
                    <p><strong>Account Name:</strong> ${pi.account_name}</p>
                    <p><strong>Reference:</strong> ${pi.reference}</p>
         <hr style="border-color:rgba(255,255,255,.2);">
                    <p style="opacity:.85;margin-bottom:4px;"><strong>Members Registered (${members.length}):</strong></p>
                    <ul style="padding-left:18px;margin:0;">${memberList}</ul>
                    <hr style="border-color:rgba(255,255,255,.2);">
                    <p class="mb-0" style="font-size:.9rem;opacity:.75;">After payment, send your transaction screenshot or reference number to <strong>+255755165284</strong> for verification. Bib numbers will be assigned once payment is confirmed.</p>`;

                document.getElementById('success-overlay').style.display = 'flex';

            } catch (err) {
                errorBox.textContent = err.message;
                errorBox.style.display = 'block';
                window.scrollTo({ top: 0, behavior: 'smooth' });
            } finally {
                document.getElementById('loading-overlay').style.display = 'none';
            }
        }
    </script>

</body>

</html>