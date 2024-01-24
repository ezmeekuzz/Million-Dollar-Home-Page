<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home - PhotoWithGarbGreh</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
        <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="assets/css/responsive.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" ></script>
        <style>
            #pixel-container {
                display: grid;
                grid-template-columns: repeat(auto-fill, 10px);
                gap: 0;
                max-width: 1000px;
                margin: auto;
                position: relative;
            }

            .pixel {
                width: 10px;
                height: 10px;
                background-color: #bfc2c7;
                border: 1px solid white;
            }

            .highlighted {
                background-color: #64b5f6; /* Change this to the highlight color */
            }

            #overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.3);
                display: none;
                pointer-events: none;
            }

            #overlay .selection {
                border: 1px dashed #fff;
                position: absolute;
                pointer-events: none;
            }
            .restricted-pixel-boxes {
                background: red;
            }
            .tooltip-details {
                padding: 5px;
            }
            .data-label {
                font-weight: bold;
            }
            .search-popup {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: #fff;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                z-index: 1000;
            }

            .search-popup.active {
                display: block;
            }
        </style>
    </head>
    <body>
    <header>
        <div class="navbar-container" id="navbar">
            <div class="top-bar">
                <div class="container">
                    <div class="inner-row">
                        <a class="navbar-brand" href="/">
                            <span>PhotoWithGarbGreh</span>
                        </a>
                        <ul class="list-inline ms-auto me-3">
                            <li class="list-inline-item">1,000,000 pixels</li>
                            <li class="list-inline-item">$1 per pixel</li>
                            <li class="list-inline-item">Own a piece of internet history!</li>
                        </ul>
                        <button class="btn p-0 btn-sold">
                            <img src="assets/images/sold-badge.png" alt="" />
                        </button>
                    </div>
                </div>
            </div>
            <div class="bottom-bar">
                <nav class="navbar navbar-expand-lg main_nav container">
                    <div class="social-button">
                        <a href="#" class="nav-link">
                            <img src="assets/images/Dribbble-Light-Preview.png" alt="" />
                            Follow @ lorem
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav ms-auto me-3">
                            <li class="nav-item">
                                <a class="nav-link" href="/home">Homepage</a>
                            </li>
                            <li class="nav-item open-btn">
                                <a class="nav-link" href="/buy-pixels">Buy Pixels</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/faq">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about-us">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contact-me">Contact Me</a>
                            </li>
                            <li class="nav-item search" id="search-li">
                                <a class="nav-link" href="#" id="search-icon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </a>
                                <div class="search-popup">
                                    <input type="text" class="nav-link search-input" id="search-input" placeholder="Search...">
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>