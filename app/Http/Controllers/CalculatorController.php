<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use View;
use Route;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class CalculatorController extends Controller {

    private $data = array();

    public function init(Request $request) {
        $params = $request->all();

        $result = null;
        $user_input = null;
        if(isset($params['mode'])) {
            $user_input = $params['user_input'];
            $result = $this->calculateChange($user_input);
        }

        $this->data = null;
        $this->data['result'] = $result;
        $this->data['user_input'] = $user_input;
        return view('index', $this->data);
    }

    public function calculateChange($input) {

        $coins = array(  '100 Dollar Bill' => 100
                        ,'50 Dollar Bill' => 50
                        ,'20 Dollar Bill' => 20
                        ,'10 Dollar Bill' => 10
                        ,'5 Dollar Bill' => 5
                        ,'1 Dollar Bill' => 1
                        ,'Quarters' => 0.25
                        , 'Dimes' => 0.10
                        , 'Nickels' => 0.05
                        , 'Pennies' => 0.01);

        $totalCoinValue = 0;
        $output = null;

        foreach($coins as $key => $value) {
            $remainder = $input - $totalCoinValue;
            $numcoins = intval($remainder / $value);
            if($numcoins != 0) {
                //echo $key." : ".$numcoins."<br>";
                $output[$key] = $numcoins;
            }
            $totalCoinValue += $numcoins * $value;
        }

        return $output;
    }

}
