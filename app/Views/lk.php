<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Культурное кафе "Маяковский" личный кабинет</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.8/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js" integrity="sha512-LUKzDoJKOLqnxGWWIBM4lzRBlxcva2ZTztO8bTcWPmDSpkErWx0bSP4pdsjNH8kiHAUPaT06UXcb+vOEZH+HpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
</head>

<body>

<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
        <i class="bi bi-phone d-flex align-items-center"><a href="tel:+7 965 665-41-11"> <span>+7 965 665-41-11</span></a></i>
        <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span> 09:00  - 22:00 </span></i>
    </div>
</section>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <div class="logo me-auto">
            <h1><a href="/">Маяковский</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>



        <a href="/#book-a-table" class="book-a-table-btn scrollto">Забронировать столик</a>

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(/assets/img/slide/slide-1.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown"><span>Безлимитный</span> кофе</h2>
                            <p class="animate__animated animate__fadeInUp text-nowrap" v-text="persMessage"></p>
                            <template v-if="register == true">
                                <div class="container text-white text-start">
                                    <label>Как к Вам обращаться ?</label>
                                    <input type="text" class="form-control" autocomplete="new-name" name="name" v-model="name" placeholder="Ваше Имя"/>
                                    <label class="mt-2">Телефон</label>
                                    <input type="tel" class="form-control " name="phoneCafe" autocomplete="new-phoneCafe" v-model="phone" v-phone placeholder="Ваш телефон"/>
                                    <label class="mt-2">Когда нам поздравлять Вас с днем рождения?</label>
                                    <input type="date" class="form-control" name="birthday" autocomplete="new-birthday" autocomplete="off" v-model="birthday" placeholder="Ваш день рождения">
                                    <div class="text-center ">
                                        <button class="book-a-table-btn mt-4" v-on:click="registermy">Участвовать в акции</button>
                                    </div>
                                </div>
                            </template>
                            <template v-if="register == false">
                                <div class="container text-white">
                                    <h4>Рады видеть Вас <?php echo date('d.m.Y')?> </h4>
                                    Вы участник акции <span style="color:#ffb03b" v-text="actions.action"></span><br/>
                                    <div v-if="actions.start!==null && actions.start!=='01-01-1970'" >
                                    c <span v-text="actions.start"></span> по <span v-text="actions.end"></span>
                                    </div>
                                    <div v-else>
                                        <p class="mt-3">Ожидаем начала Вашего старта. Подробности Вы можете узнать у Бармена</p>
                                    </div>
                                </div>
                                <div class="row mt-3 mb-4 justify-content-center">
                                    <template v-if="link!==null && actions.start!=='01-01-1970'">
                                        <div class="row justify-content-center mt-2 mb-4">
                                            <img :src="link" class="img-thumbnail" style="max-width: 200px;"/>
                                        </div>
                                    </template>
                                    <div class="col-lg-6 col-md-10" v-if="actions.start!=='01-01-1970' && !apser">
                                        <div role="button" class="book-a-table-btn" v-on:click="takeQR()">Выпить чашечку</div>
                                    </div>
                                    <div class="col-lg-6 col-md-10" v-if="apser">
                                        <h4 class="text-warning">Месяц акции подошел к концу! <br/> Подойдите к бармену чтобы возобновить её</h4>
                                    </div>
                                </div>
                            </template>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section><!-- End Hero -->



<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
        <h3>Маяковский</h3>
       <!-- <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>-->
        <div class="social-links">
            <a href="https://t.me/Mayakovskycafe" target="_blank" class="telegram"><i class="bx bxl-telegram"></i></a>
            <a href="https://instagram.com/mayakovsky.rest?igshid=YmMyMTA2M2Y=" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
        </div>
        <div class="copyright">
            &copy; Copyright <strong><span>Культурное кафе "Маяковский"</span></strong>. Все права защищены
        </div>

    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>
<script>
    Vue.directive('phone', {
        bind(el) {
            el.oninput = function(e) {
                if (!e.isTrusted) {
                    return
                }
                const x = this.value.replace(/\D/g, '').match(/(\d{0,1})(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})/)
                x[1] = '+7'
                if (!x[2] && x[1] !== '') {
                    this.value = !x[3] ? x[1] + ' (' + x[2] : x[1] + ' (' + x[2] + ') ' + x[3] + (x[4] ? '-' + x[4] : '') + (x[5] ? '-' + x[5] : '')
                } else {
                    this.value = !x[3] ? x[1] + ' (' + x[2] : x[1] + ' (' + x[2] + ') ' + x[3] + (x[4] ? '-' + x[4] : '') + (x[5] ? '-' + x[5] : '')
                }
            }
        },
    });
    let hash = localStorage.getItem('hash');
    const App = new Vue({
        el:'#hero',
        data:{
            persMessage:null,
            register:true,
            phone:null,
            name:null,
            birthday:null,
            actions:null,
            link:null,
            apser:false

        },
        methods:{
            takeQR()
            {
                axios.post('/getUserQr?user='+hash).then(res=>{
                   this.link = res.data.link
                });
            },
            getInfo(){

                axios.post('/getInfo?hash='+hash).then(res=>{
                    if(res.data.data.name == 'superErr'){
                        localStorage.removeItem('hash')
                        window.location.reload()
                    }
                   this.name = res.data.data.name
                    this.persMessage = 'Здравствуйте '+this.name+'!'
                    this.actions = res.data.data.actions
                    this.apser = res.data.data.apser
                })
            },
            startView(){
                if (hash == null){
                    return this.register=true

                }
                else{
                    this.register=false
                    this.getInfo()
                }
            },
            registermy()
            {
                let phoneval = this.phone.length
                console.log(phoneval)
                if(this.name!==null && phoneval > 17 && this.birthday!==null) {
                    axios.post('/register?name='+this.name+'&phone='+this.phone+'&birthday='+this.birthday).then(res => {
                        localStorage.setItem('hash', res.data.data)
                        window.location.reload()
                    })
                }
            }
        },
        mounted(){
            this.startView()
        }
    })
</script>
</body>

</html>