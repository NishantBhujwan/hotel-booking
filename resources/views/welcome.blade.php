<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <title>My Website</title>
    <style>
        .service-card {
            margin: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .owl-carousel .owl-item {
            display: flex;
            justify-content: center;
        }
        .owl-carousel .card {
            width: 18rem;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .owl-carousel .owl-item {
            display: flex;
            justify-content: center;
        }
        .image-wrapper {
            overflow: hidden;
            height: 200px; /* Set a fixed height */
        }
        .card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .card:hover img {
            transform: scale(1.05);
        }
        .navbar-center {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
        .navbar-center .navbar-nav {
            margin: 0 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-center">
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#rooms">Rooms</a>
                        </li>
                    </ul>
                </div>
                {{-- <a class="navbar-brand mx-3" href="#">Hotel</a> --}}
                <a class="navbar-brand mx-3" href="#">
                    <img src="{{ asset('images/logo.png') }}" alt="The White Mountains" alt="Hotel Logo" width="170" height="90">
                </a>
                <div class="collapse navbar-collapse justify-content-start" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About Us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a class="nav-link btn btn-success text-light ms-2" href="#signin">Sign In</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://t4.ftcdn.net/jpg/03/81/89/61/240_F_381896172_z2QE8bV3z7FxzpGM6uzukJ3JAz6y6N0w.jpg" class="d-block w-100" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="https://t4.ftcdn.net/jpg/06/77/35/87/240_F_677358723_wySfdSnDvtbrubSMiO678VTlqnS4AVqQ.jpg" class="d-block w-100" alt="Banner 2">
            </div>
            <div class="carousel-item">
                <img src="https://t3.ftcdn.net/jpg/05/08/10/34/240_F_508103499_m0oopyxd5AcgE7coP07FW4HK9TosWSk5.jpg" class="d-block w-100" alt="Banner 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Services Section -->

    @include('product')

    <!-- About Us Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">About Us</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae urna hendrerit, auctor libero nec, malesuada elit. Integer ut nisi eu mauris commodo placerat. Nullam at cursus sapien. Vivamus euismod, leo eu convallis ultricies, sapien urna feugiat justo, ac ultricies mi magna sit amet nisl. Etiam sit amet nibh nec ligula vestibulum scelerisque.</p>
    </div>

    <!-- Footer -->
    <footer class="bg-light py-4">
        <div class="container text-center">
            <p>&copy; 2024 My Website. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                }
            });
        });
    </script>

</body>
</html>
