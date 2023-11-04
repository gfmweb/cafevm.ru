<?php $this->section('photoGallery');?>
<section id="gallery" class="gallery">
    <div class="container-fluid">

        <div class="section-title">
            <h2 class="textOld">Фотогалерея <span>нашего заведения</span></h2>
           <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>-->
        </div>

        <div class="row g-0">
            <?php $images = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38]?>
            <?php foreach($images as $image):?>
            <div class="col-lg-3 col-md-4">
                <div class="gallery-item" style="max-height: 420px; overflow: hidden">
                  <!--  <a href="assets/img/gallery/1/<?php /*=$image*/?>.jpeg" class="gallery-lightbox">-->
                        <img src="assets/img/gallery/1/<?=$image?>.jpg" alt="" class="img-fluid" >
                   <!-- </a>-->
                </div>
            </div>
            <?php endforeach;?>
        <?php for ($i=1; $i<52; $i++):?>
        <?php if($i!==41):?>
            <div class="col-lg-3 col-md-4">
                <div class="gallery-item" style="max-height: 420px; overflow: hidden">
                    <!--  <a href="assets/img/gallery/1/<?php /*=$image*/?>.jpeg" class="gallery-lightbox">-->
                    <img src="assets/img/gallery/2/<?=$i?>.jpg" alt="" class="img-fluid" >
                    <!-- </a>-->
                </div>
            </div>
         <?php endif;?>
        <?php endfor; ?>

        </div>

    </div>
</section><!-- End Gallery Section -->
<?php $this->endSection();?>
