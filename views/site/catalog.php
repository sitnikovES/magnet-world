<?php

/* @var $this yii\web\View */

$this->title = 'Каталог магнитных панелей';
?>
<div class="site-index">
    <h1>Магнитные панели на холодильник!</h1>
    <div class="body-content">
        <div class="row">
            <?php
            foreach($products as $product){
                foreach($product['themes'] as $theme){ if($theme['active']){ ?>
                    <div class="col-lg-4 col-md-6" style="text-align: center;">
                        <a href="#">
                            <img src="/img/productthema/<?= $theme['file_icon'] ?>" style="height:350px; width:350px;" />
                        </a>
                        <div style="margin-top: -34px;">
                            <a href="/"><button style="color: #FFF; border:0; height: 34px; width: 350px; background-color: rgba(0,0,0,0.5);"><?= $theme['name'] ?></button></a>
                        </div><p></p>
                    </div>
                <?php }}} ?>
        </div>
    </div>
</div>
