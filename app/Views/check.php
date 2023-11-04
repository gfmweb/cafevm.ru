<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Только для культурных сотрудников</title>
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
                margin-top: -58.59px;
            }
        }

        .navbar .nav-link {
            color: #fff !important;
        }
    </style>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block text-black" >
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand nav-link" target="_blank" href="https://mdbootstrap.com/docs/standard/">
                <strong>Маяк</strong>
            </a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
                    aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="#intro">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Клиенты</a>
                    </li>

                </ul>

                <!--<ul class="navbar-nav d-flex flex-row">

                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" rel="nofollow"
                           target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="https://www.facebook.com/mdbootstrap" rel="nofollow" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="https://twitter.com/MDBootstrap" rel="nofollow" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="https://github.com/mdbootstrap/mdb-ui-kit" rel="nofollow" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                    </li>
                </ul>-->
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Background image -->
    <!-- <div id="intro" class="bg-image vh-100 shadow-1-strong">
         <video style="min-width: 100%; min-height: 100%;" playsinline autoplay muted loop>
             <source class="h-100" src="https://mdbootstrap.com/img/video/Lines.mp4" type="video/mp4" />
         </video>
         <div class="mask"     style="
         background: linear-gradient(
           45deg,
           rgba(29, 236, 197, 0.7),
           rgba(91, 14, 214, 0.7) 100%
         );
       ">

         </div>
     </div>-->
    <!-- Background image -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main class="mt-5" id="App">
    <div class="container">
        <!--Section: Content-->
        <div class="container d-flex align-items-center justify-content-center text-center h-100">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-3">Результат проверки</h2>
                    <h2 class="text-center text-primary"><?=$user?></h2>
                    <?php if(!$file || !$time):?>
                        <h4 class="text-danger text-center">Попросите гостя перегенерировать QR</h4>
                    <?php else:?>
                        <h4 class="text-success text-center">Всё отлично. Дайте кофе</h4>
                     <?php endif;?>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center text-decoration-none text-center mt-4">
            <a href="/admin/lk">Перейти в панель управления</a>
        </div>
    </div>
</main>
<!--Main layout-->

<!--Footer-->
<footer class="bg-light text-lg-start fixed-bottom">


    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-dark" >Культурное кафе маяковский</a>
    </div>
    <!-- Copyright -->
</footer>
<!--Footer-->
<!-- MDB -->
<script type="text/javascript" src="/admin/js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="/admin/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.7.8/dist/vue.js"></script>
</body>
</html>
