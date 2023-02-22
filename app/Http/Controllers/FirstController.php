<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function index() {

        return view('first', ['data' => $this->ladder()]);
    }

    public function ladder() {
        $data = '';
        $n = 1;
        $count = 1;
        for($i=1; $i<101; $i++) {
            if ($i < 11) {
                if ($count ==1) {
                    $data = $data . $i;    
                } else {
                    $data = $data . "&nbsp&nbsp&nbsp" . $i;    
                }
            } else {
                $data = $data . ' ' . $i;
            }
            if($count == $n) {
                // $data .= '<br>';
                $data .= '<br>';
                $n++;
                $count = 1;
            } else {
                $count++;
            }
        }

        return $data;
    }
}
