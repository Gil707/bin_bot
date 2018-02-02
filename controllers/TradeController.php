<?php
/**
 * Created by PhpStorm.
 * User: Gil
 * Date: 02-Feb-18
 * Time: 11:25
 */

namespace app\controllers;

use app\models\BinanceApp;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class TradeController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetprice()
    {

        Yii::$app->response->format = Response::FORMAT_JSON;

        $btc_usdt = 0;

        if (Yii::$app->request->isAjax) {
            $binance = BinanceApp::getInstance();

            foreach (json_decode($binance->getPrice()) as $ticker) {
                ($ticker->symbol == 'BTCUSDT') ? $btc_usdt = $ticker->price : null;
            }

            return ['success' => true, 'btc_usdt' => $btc_usdt];
        }
        return ['success' => false];
    }

    public function actionPlaceorder()
    {

        if (Yii::$app->request->isPost) {

            $symbol = 'BTCUSDT';
            $side = (Yii::$app->request->post('side') == '1') ? 'SELL' : 'BUY';
            $price = Yii::$app->request->post('price');
            $amount = Yii::$app->request->post('amount');

            $binance = BinanceApp::getInstance();

            // to make real order change to placeOrder(...
            $action = $binance->placeOrderTest([
                'symbol' => $symbol, 'side' => $side, 'type' => 'LIMIT',
                'timeInForce' => 'GTC', 'quantity' => $amount, 'price' => $price,
                'timestamp' => time() * 1000
            ]);


            $arr = (array)json_decode($action);

            if (empty($arr)) {
                Yii::$app->getSession()->setFlash('success', 'Order added (test)!');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Error while adding order (test)!');
                // can var_dump or echo $action to see more info
            }

        }

        return $this->render('index');

    }

    public function actionGetorders()
    {

        $binance = BinanceApp::getInstance();

        $data = $binance->getOrders([
            'symbol' => 'BTCUSDT',
            'timestamp' => time() * 1000
        ]);

        // shows active orders....
        var_dump(json_decode($data));
        exit();

    }

}