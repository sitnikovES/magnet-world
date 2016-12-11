<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Доставка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        Мы доставляем наши магнитные панели компаниями <strong><?= implode(", ", $fixed_nl) ?></strong>,
        а так же транспортными компаниями <strong><?= implode(", ", $free_nl) ?></strong>.
    </p>
    <?php if(count($fixed)){ ?>
        Для компаний <strong><?= implode(", ", $fixed_nl) ?></strong> установлена фиксированная стоимость доставки:
        <table>
            <?php foreach ($fixed as $value){ ?>
            <tr><td><strong><?= $value['name'] ?>&nbsp;</strong></td><td><strong>&nbsp;<?= $value['price'] ?> руб.</strong></td></tr>
            <?php } ?>
        </table>
    <?php } if(count($free) > 0){ ?>
        <p>При отправке остальными транспортными компаниями <strong><?= implode(", ", $free_nl) ?> </strong>оплата доставки осуществляется при получении заказа.</p><br>
    <?php } ?>
</div>
