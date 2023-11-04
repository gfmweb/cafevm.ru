<?php $this->include('components/topbar'); ?>
<?php $this->include('components/header'); ?>
<?php $this->include('components/hiro'); ?>
<?php $this->include('components/footer'); ?>
<?php $this->include('components/about')?>
<?php $this->include('components/whyus')?>
<?php $this->include('components/menu')?>
<?php $this->include('components/specials')?>
<?php $this->include('components/events')?>
<?php $this->include('components/booking')?>
<?php $this->include('components/photoGallery')?>
<?php $this->include('components/feedbacks')?>
<?php $this->include('components/comand')?>
<?php $this->include('components/contacts')?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?=env('APP_NAME')?></title>
    <meta content="<?=env('APP_NAME')?>" name="description">
    <meta content="Кафе Ресторан" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Delicious
    * Updated: Mar 10 2023 with Bootstrap v5.2.3
    * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.8/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js" integrity="sha512-LUKzDoJKOLqnxGWWIBM4lzRBlxcva2ZTztO8bTcWPmDSpkErWx0bSP4pdsjNH8kiHAUPaT06UXcb+vOEZH+HpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        @font-face {
            font-family: 'izvestija';
            src: url('izvestija.ttf')format("truetype");
            src: url('izvestija.woff');
            font-weight: normal;
            font-style: normal;
        }
        .textOld {
            font-family: 'izvestija';
            font-weight: normal;
        }
    </style>
</head>

<body>
<?php echo $this->renderSection('TopBar');?>
<?php echo $this->renderSection('header');?>
<?=$this->renderSection('hiro');?>
<?=$this->renderSection('about'); ?>
<?=$this->renderSection('whyus'); ?>
<?=$this->renderSection('menu'); ?>
<?=$this->renderSection('specials'); ?>
<?=$this->renderSection('events'); ?>
<?=$this->renderSection('booking'); ?>
<?=$this->renderSection('photoGallery'); ?>
<?=$this->renderSection('comand'); ?>
<?=$this->renderSection('feedbacks'); ?>
<?=$this->renderSection('contacts');?>
<?php echo $this->renderSection('footer');?>


<!-- Vendor JS Files -->
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>

</body>

</html>