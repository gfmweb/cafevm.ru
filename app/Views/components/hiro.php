<?php $this->section('hiro');?>
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown textOld"><span>Маяковский</span> культурное кафе</h2>
                            <p class="animate__animated animate__fadeInUp">Здесь воссоздан стиль литературно-артистических кабаре времён Серебряного Века первой половины XX века, до и после Революции. Официанты, сошедшие со старых чёрно-белых фото, особенный, с характерным потрескиванием, глубокий звук граммофона с музыкой, которую не всегда можно найти даже в Интернете…</p>
                            <div>
                                <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto mb-3">Меню</a>
                                <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Забронировать столик</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown textOld"><span>Маяковский</span> культурное кафе</h2>
                            <p class="animate__animated animate__fadeInUp">Здесь ежедневно проходят творческие вечера андерграундных поэтов, эмоциональные моноспектакли с экспромтом, где каждый гость может, по желанию, или остаться зрителем, или тоже стать активным участником перфоманса.
                            </p>
                            <div>
                                <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto mb-3">Меню</a>
                                <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Забронировать столик</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown textOld"><span>Маяковский</span> культурное кафе</h2>
                            <p class="animate__animated animate__fadeInUp">Каждый день не похож на предыдущий. Творческий вечер может быть как в дореволюционном стиле, так и в стиле брежневского СССР.
                            </p>
                            <div>
                                <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto mb-3">Меню</a>
                                <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Забронировать столик</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </div>
</section><!-- End Hero -->
<?php $this->endSection();?>
