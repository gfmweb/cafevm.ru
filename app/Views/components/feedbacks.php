<?php $this->section('feedbacks');?>
<section id="testimonials" class="testimonials">
    <div class="container position-relative">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

                <?php foreach ($reviews['reviews'] as $feed):?>
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <?php if($feed['pic']!==''):?>
                            <img src=<?=$feed['pic']?> class="testimonial-img" alt="">
                        <?php else: ?>
                            <img src="assets/img/nophoto.webp" class="testimonial-img" alt="">
                        <?php endif ?>
                        <h3><?=$feed['fio']?></h3>
                        <h4></h4>
                        <div class="stars">
                            <?php for($i=0;$i<$feed['rating']; $i++):?>
                            <i class="bi bi-star-fill"></i>
                            <?php endfor ?>
                        </div>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            <?=$feed['text']?>
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->
                <?php endforeach;?>
            </div>
            <!--<div class="swiper-pagination"></div>-->
        </div>

    </div>
</section><!-- End Testimonials Section -->
<?php $this->endSection();?>
