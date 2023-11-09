<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rent Car</title>
    <link rel="icon" href="{{ asset('assetsLanding/img/favicon.png')}}" sizes="32x32" type="image/png">
    <!-- custom.css -->
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/custom.css')}}">
    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/bootstrap.min.css')}}">
    <!-- font-awesome -->
    <link rel="stylesheet" href="{{ asset('assetsLanding/font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <!-- AOS -->
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/aos.css')}}">
</head>

<body>
    <!-- banner -->
    <div class="jumbotron jumbotron-fluid" id="banner" style="background-image: url({{ asset('assetsLanding/img/banner-bk.jpg')}});">
        <div class="container text-center text-md-left">
            <header>
                <div class="row justify-content-between">
                    <div class="col-2">
                        <img src="{{ asset('assetsLanding/img/logo.png')}}" alt="logo">
                    </div>
                    <div class="text-right col-6 align-self-center">
                        @if (Auth::user())
                        <a href="/admin/dashboard" class="text-white lead">Hola, <?php echo Auth::user()->name?></a>
                        @else
                        <a href="/login" class="text-white lead">Login here for rent!</a>
                        @endif
                    </div>
                </div>
            </header>
            <h1 data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"
                class="my-5 text-white display-3 font-weight-bold">
                The most professional<br>
                Car rent in Indonesia!
            </h1>
            <p data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"
                class="my-4 text-white lead">
                Unlock the Road to Adventure with Our Wide Range of Vehicles,<br> Where Every Mile Leads to Memorable Experiences!

            </p>
            <a href="/login" data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"
                class="my-4 btn font-weight-bold atlas-cta cta-green">Get Started</a>
        </div>
    </div>
    <!-- three-blcok -->
    <div class="container py-2 my-5">
        <h2 class="my-5 text-center font-weight-bold">Smartest protection for your journey</h2>
        <div class="row">
            <div data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000" data-aos-once="true"
                class="text-center col-md-4">
                <img src="{{ asset('assetsLanding/img/smart-protect-1.jpg')}}" alt="Anti-spam" class="mx-auto">
                <h4>Online car rent</h4>
                <p>Make car rental reservations online anytime, anywhere.</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true"
                class="text-center col-md-4">
                <img src="{{ asset('assetsLanding/img/smart-protect-2.jpg')}}" alt="Phishing Detect" class="mx-auto">
                <h4>Data Secure</h4>
                <p>Your data is safe with us</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-once="true"
                class="text-center col-md-4">
                <img src="{{ asset('assetsLanding/img/smart-protect-3.jpg')}}" alt="Smart Scan" class="mx-auto">
                <h4>Smart Scan</h4>
                <p>You can view the available cars</p>
            </div>
        </div>
    </div>

    <!-- contact -->
    <div class="jumbotron jumbotron-fluid" id="contact" style="background-image: url({{ asset('assetsLanding/img/contact-bk.jpg')}});">
        <div class="container my-5">
            <div class="row justify-content-between">
                <div class="text-white col-md-6">
                    <h2 class="font-weight-bold">Contact Us</h2>
                    <p class="my-4">
                        The best car rent in Indonesia!
                        <br>Unlock the Road to Adventure with Our Wide Range of Vehicles, <br>Where Every Mile Leads to Memorable Experiences!
                    </p>
                    <ul class="list-unstyled">
                        <li>Email : yudhistiradwiki17@gmail.com</li>
                        <li>Phone : 0896-2728-6733</li>
                        <li>Address : Perum Inova C3 Purwakarta</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <form>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Your Name</label>
                                <input type="name" class="form-control" id="name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Email">Your Email</label>
                                <input type="email" class="form-control" id="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="3"></textarea>
                        </div>
                        <button type="submit"
                            class="my-3 btn font-weight-bold atlas-cta atlas-cta-wide cta-green">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- copyright -->
    <div class="jumbotron jumbotron-fluid" id="copyright">
        <div class="container">
            <div class="row justify-content-between">
                <div class="my-2 text-center text-white col-md-6 align-self-center text-md-left">
                    Copyright © 2023 Yudhistira, Dwiki.
                </div>
                <div class="my-2 text-center col-md-6 align-self-center text-md-right" id="social-media">
                    <a href="https://instagram.com/moch_dwiki" class="ml-2 text-center d-inline-block">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                    <a href="https://linkedin.com/in/yudhistiradwiki" class="ml-2 text-center d-inline-block">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- AOS -->
    <script src="{{ asset('assetsLanding/js/aos.js')}}"></script>
    <script>
        AOS.init({});
    </script>
</body>

</html>
