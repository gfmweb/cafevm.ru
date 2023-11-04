<?php $this->extend('layout/actions');?>
<?php $this->section('content')?>
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade mt-2" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="background-image: url(/assets/img/slide/slide-1.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                          <div class="container">
                              <div class="row justify-content-between mt-sm-4 ">
                                    <?php if(isset($actions)):?>
                                        <?php foreach($actions as $action):?>
                                            <div class="col-lg-4 col-sm-6 mt-4 " role="button">
                                                    <h2 class="animate__animated animate__fadeInDown mt-3">
                                                        <?=$action->alias?>
                                                    </h2>
                                                <a href="/actions/<?=$action->name?>">

                                                        <img src="<?=$action->img?>" class="img-thumbnail rounded-1"/>

                                                </a>
                                                    <p class="animate__animated animate__fadeInUp text-nowrap">
                                                        <?=$action->rules?>
                                                    </p>

                                            </div>
                                        <?php endforeach;?>
                                    <?php endif; ?>
                              </div>
                              <div class="row justify-content-center ">
                                  <div class="col-lg-8">
                                      <div class="text-center mb-3">
                                          <button class="btn btn-warning book-a-table-btn text-nowrap">
                                              <span>
                                                  <i class="bx bxl-telegram" style="font-size: large"></i><br/>

                                                  Зарегистрироваться и получить бонус
                                              </span>
                                          </button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?php $this->endSection()?>

