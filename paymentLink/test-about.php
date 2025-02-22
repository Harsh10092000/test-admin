<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero - EV Auto</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #ffffff);
            padding: 40px;
        }
        .hero.section {
            padding: 80px 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 30px;
        }
        .col-lg-6 {
            flex: 1;
            min-width: 300px;
            padding: 20px;
        }
        .hero-content .company-badge {
            display: inline-flex;
            align-items: center;
            background: #eef7f2;
            color: #28a745;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .company-badge i {
            margin-right: 8px;
        }
        .hero-content h1 {
            color: #333;
            font-size: 48px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
        }
        .accent-text {
            color: #0078d4;
        }
        .hero-content p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .hero-buttons .btn {
            padding: 12px 25px;
            border-radius: 25px;
            font-size: 16px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background: #0078d4;
            color: #fff;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 120, 212, 0.3);
        }
        .btn-primary:hover {
            background: #005a9e;
            transform: translateY(-2px);
        }
        .btn-link {
            color: #0078d4;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .btn-link:hover {
            color: #005a9e;
            text-decoration: none;
        }
        .hero-image img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .customers-badge {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .customer-avatars {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #fff;
        }
        .avatar.more {
            background: #0078d4;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }
        .customers-badge p {
            color: #555;
            font-size: 12px;
            margin-top: 10px;
        }
        .stats-row {
            margin-top: 40px;
            gap: 20px;
            justify-content: center;
        }
        .col-lg-3 {
            flex: 1;
            min-width: 200px;
            max-width: 250px;
        }
        .stat-item {
            display: flex;
            align-items: center;
            gap: 15px;
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .stat-icon i {
            font-size: 30px;
            color: #0078d4;
        }
        .stat-content h4 {
            color: #333;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .stat-content p {
            color: #555;
            font-size: 12px;
            margin: 0;
        }
        @media (max-width: 991px) {
            .col-lg-6, .col-lg-3 {
                flex: 100%;
                max-width: 100%;
            }
            .hero-content h1 {
                font-size: 36px;
            }
            .customers-badge {
                position: static;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                        <div class="company-badge mb-4">
                            <i class="bi bi-battery-charging me-2"></i>
                            Powering the Future
                        </div>
                        <h1 class="mb-4">
                            Drive the <br>
                            Electric Revolution <br>
                            <span class="accent-text">with EV Auto</span>
                        </h1>
                        <p class="mb-4 mb-md-5">
                            Experience sustainable mobility with cutting-edge electric vehicles designed for performance, efficiency, and a greener tomorrow.
                        </p>
                        <div class="hero-buttons">
                            <a href="#about" class="btn btn-primary me-0 me-sm-2 mx-1">Get Started</a>
                            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="btn btn-link mt-2 mt-sm-0 glightbox">
                                <i class="bi bi-play-circle me-1"></i>
                                Watch Demo
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Electric Vehicle" class="img-fluid">
                        <div class="customers-badge">
                            <div class="customer-avatars">
                                <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-4.0.3&auto=format&fit=crop&w=40&h=40&q=80" alt="Customer 1" class="avatar">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=40&h=40&q=80" alt="Customer 2" class="avatar">
                                <img src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=40&h=40&q=80" alt="Customer 3" class="avatar">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=40&h=40&q=80" alt="Customer 4" class="avatar">
                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=40&h=40&q=80" alt="Customer 5" class="avatar">
                                <span class="avatar more">15k+</span>
                            </div>
                            <p class="mb-0 mt-2">15,000+ happy EV drivers worldwide</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <div class="stat-content">
                            <h4>5x Awards Won</h4>
                            <p class="mb-0">For EV innovation</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-car-front-fill"></i>
                        </div>
                        <div class="stat-content">
                            <h4>10k+ Vehicles</h4>
                            <p class="mb-0">Delivered globally</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-battery-full"></i>
                        </div>
                        <div class="stat-content">
                            <h4>500k+ km</h4>
                            <p class="mb-0">Average range driven</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-tree-fill"></i>
                        </div>
                        <div class="stat-content">
                            <h4>1M+ Tons</h4>
                            <p class="mb-0">CO2 emissions saved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>