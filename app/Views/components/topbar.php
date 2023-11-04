<?php $this->section('TopBar') ?>
<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
        <?php if(isset($top)):?>
            <?php foreach($top as $el): ?>
                <i class="<?=$el->icon?>"><?=$el->value?></i>
            <?php endforeach;?>
        <?php endif; ?>
    </div>
</section>
<?php $this->endSection()?>