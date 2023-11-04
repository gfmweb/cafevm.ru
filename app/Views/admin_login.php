<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Маяк административная панель</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="/admin/css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="/admin/css/style.css" />
</head>
<body>
<!--Main Navigation-->
<header>
    <style>
        /* Height for devices larger than 576px */
        @media (min-width: 992px) {
            #intro {

            }
        }

        .navbar .nav-link {
            color: #fff !important;
        }
    </style>

    <!-- Navbar -->

    <!-- Navbar -->

    <!-- Background image -->
    <div id="intro" class="bg-image vh-100 shadow-1-strong" style="z-index:-3">
        <video style="min-width: 100%; z-index: -1; min-height: 100%;" playsinline autoplay muted loop>
            <source class="h-100" src="https://mdbootstrap.com/img/video/Lines.mp4" type="video/mp4" />
        </video>


    </div>
    <div class="h-100" style="position: absolute; top: 0; left: 0; width: 100%">
        <section class="my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <div class="card shadow-sm">
                            <div class="card header">
                                <div class="card-title text-center">
                                    <h4>Вход для персонала</h4>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <form action="/admin/login" method="post">
                                            <label>Имя</label>
                                            <input type="text" name="login" class="form-control mb-2">
                                            <label>Пароль</label>
                                            <input type="password" name="password" class="form-control mb-2">
                                            <div class="row justify-content-center">
                                            <div class="col-6">
                                                <div class="row">
                                                    <button type="submit" class="btn btn-outline-warning">
                                                        Вход
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p>
                </p>
        </section>
    </div>
    <!-- Background image -->
</header>
<!--Main Navigation-->

<!--Main layout-->

<!--Footer-->
<!-- MDB -->
<script type="text/javascript" src="/admin/js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="/admin/js/script.js"></script>
</body>
</html>