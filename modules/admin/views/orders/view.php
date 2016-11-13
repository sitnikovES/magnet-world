<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->registerCssFile('@web/css/my.css', ['position'=>$this::POS_HEAD], 'my_css');

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = 'Заказ №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<table>
    <tr>
        <td valign="top">
            <div class="orders-view">

                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
<br>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        //'id',
                        //'created_at:datetime',
                        ['attribute' => 'created_at', 'format' => ['datetime', 'dd.MM.Y HH:mm:ss']],
                        ['attribute' => 'updated_at', 'format' => ['datetime', 'dd.MM.Y HH:mm:ss']],
                        //'updated_at:datetime',
                        'name',
                        'phone',
                        'address',
                        'email:email',
                        'postindex',
                        //'order_status_id',
                        ['attribute' => 'Статус заказа', 'value' => $model->status->name, ],
                        //'pay_type_id',
                        ['attribute' => 'Способ оплаты', 'value' => $model->paytype->name, ],
                        //'post_type_id',
                        ['attribute' => 'Способ отправки', 'value' => $model->postcompany->name, ],
                        'post_code',
                        'note',
                    ],
                ]) ?>

            </div>
        </td>
        <td valign="top">
            <?= $this->render('index_order_content', [
                'model' => $model,
                'dataProvider' => $dataProvider,
            ]) ?>
            
            <?= $this->render('index_cashflow', [
                'model' => $model,
                'dataProvider' => $billing['dataProvider'],
            ]) ?>
            <label>Всего получено:</label> <?php echo $billing['billing']['in']; ?> руб.<br>
            <label>Всего потрачено:</label> <?php echo $billing['billing']['out']; ?> руб.<br>
            <label>Сальдо:</label> <?php echo $billing['billing']['in'] - $billing['billing']['out']; ?> руб.<br>
        </td>
    </tr>
</table>