<?php
$this->registerCssFile('@web/css/catalog.css', '', 'catalog.css');
/* @var $this yii\web\View */

$this->title = 'Каталог магнитных панелей';

$this->params['breadcrumbs'][] = 'Магнитные панели на холодильник';
?>
<div class="site-index">
    <div class="row">
        <h1>Магнитные панели на холодильник!</h1>
    </div>
    <div class="body-content">
        <div class="row">
            <?php
            foreach($products as $product){
                foreach($product['themes'] as $theme){ if($theme['active']){ ?>
                    <div class="col-lg-4 col-md-6 th_item">
                        <a href="?theme=<?= $theme['id'] ?>">
                            <img src="/img/productthema/<?= $theme['file_icon'] ?>" style="height:350px; width:350px;" />
                        </a>
                        <div>
                            <a href="?theme=<?= $theme['id'] ?>"><button><?= $theme['name'] ?></button></a>
                        </div><p></p>
                    </div>
                <?php }}} ?>
        </div>
    </div>
</div>
