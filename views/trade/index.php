<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

/** @var $btc_usdt String */


$this->registerJsFile('../../js/script.js', ['depends' => 'yii\web\JqueryAsset']);

$this->title = 'Bin.Bot';

?>

<h3>BTCUSDT: <span id="btccrs">-----</span></h3>
<span id="btccrs_time" style="font-size: 12px; color: lightgray;">-----</span><br>


<div class="row">
    <div class="col-lg-4">
        <?= $this->render('_buybtc') ?>
    </div>
</div>
