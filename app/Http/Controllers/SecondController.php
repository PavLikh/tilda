<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecondController extends Controller
{
    public function index() {

        return view('second', ['data' => $this->randArray()]);
    }

    public function randArray () {
        $ar = [];
   
        // $numb = 0;
        for ($i=0; $i<35; $i++) {
            $numb = rand(1, 1000);
                // $numb++;
            while(in_array($numb, $ar)){
                $numb = rand(1, 1000);
            }
                $ar[] = $numb;
        }
        $i = 0;
        $n = 0;
        $array = []; // массив значений
        $row_sum = []; // сумма в каждой строке
        $col = [];
        $col_sum = []; // сумма в каждом столбце
        $col_num = 0; 
        while($i < count($ar)) {
        
            if (($i) % 5 == 0 && $i != 0) {
                $n++;
                $col_num = 0;
            }
        
            $array[$n][] = $ar[$i];
            $row_sum[$n] = array_sum($array[$n]);
            $col[$col_num][$n] = $ar[$i];

            $col_sum[$col_num] = array_sum($col[$col_num]);
            $col_num++;
            $i++;
        }
        foreach ($row_sum as $key => $val) {
            array_push($array[$key], $val);
        }
        $array[] = $col_sum;

        return $array;
    }
}
