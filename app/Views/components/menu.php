<?php $this->section('menu');?>
<section id="menu" class="menu">
    <div class="container">

        <div class="section-title">
            <h2 class="textOld">Наше <span>Меню</span></h2>
        </div>

        <div class="row">
            <div class="col-lg-6  mt-2 mb-2">
                <div class="container">
                    <img src="./menu.jpg"class="img-fluid">
                </div>

                    <div class="row mt-2 mb-2 justify-content-between d-none d-lg-block">
                        <table class="text-center">
                            <tr>
                            <td><a href="./menu.pdf" target="_blank" class="btn book-a-table-btn">Открыть</a></td>
                            <td><a href="./menu.pdf" download="Маяковский меню.pdf" class="btn book-a-table-btn">Сохранить</a></td>
                            </tr>
                        </table>
                    </div>
                    <div class="row mt-2 mb-2 justify-content-center d-lg-none">
                        <div class="col text-center">
                            <a href="./menu.pdf" download="Маяковский меню.pdf" class="btn book-a-table-btn">Прочитать</a>
                        </div>
                    </div>
            </div>




            <div class="col-lg-6  mt-2 mb-2">
                <div class="container">
                    <img src="./bar_card.jpg"class="img-fluid">
                </div>
                <div class="container">
                    <div class="row mt-2 mb-2 justify-content-between d-none d-lg-block">
                        <table class="text-center">
                            <tr>
                                <td><a href="./bar_card.pdf" target="_blank" class="btn book-a-table-btn">Открыть</a></td>
                                <td><a href="./bar_card.pdf" download="Маяковский карта бара.pdf" class="btn book-a-table-btn">Сохранить</a></td>
                            </tr>
                        </table>
                    </div>
                    <div class="row mt-2 mb-2 justify-content-center d-lg-none">
                        <div class="col text-center ">
                            <a href="./bar_card.pdf" download="Маяковский карта бара.pdf" class="btn book-a-table-btn">Прочитать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>
    <script>
        function ready() {
            let hidebtn = document.getElementById('hide_menu')
            hidebtn.click()
            let hidebtn2 = document.getElementById('hide_menu')
            hidebtn2.click()
        }

        document.addEventListener("DOMContentLoaded", setTimeout(ready, 1500));
    </script>
</section><!-- End Menu Section -->
<?php $this->endSection();?>
