<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class ThirdController extends Controller
{
    public  $arTelephone = [
        'Moscow' => ['122-10-01', 'Москва'],
        'St Petersburg' => ['122-12-02', 'Санкт-Петербург'],
        'Yekaterinburg' => ['122-12-03', 'Екатеринбург'],
        'Nizhniy Novgorod' => ['122-12-04', 'Нижний Новгород'],
        'Chelyabinsk' => ['122-12-05', 'Челябинск'],
        'Tyumen' => ['122-22-07', 'Тюмень'],
        'Irkutsk' => ['122-12-06', 'Иркутск'],
        'default' => ['122-11-00', ''],
    ];

    public function index() {
        
        $data = $this->arTelephone['default'];
        if ($position = Location::get($this->getIp())) {
            if(array_key_exists($position->cityName,$this->arTelephone)){
                $data = $this->arTelephone[$position->cityName];
            }
        }

        // dd($position);
        return view('third', ['data' => $data]);
    }

    public function testIp() {
        // $ip_addr = [
        //     '2.59.215.255' => 'Москва',
        //     '5.3.81.255' => 'Санкт-Петербург',
        //     '82.193.132.255' => 'Екатеринбург',
        //     '5.164.245.255' => 'Нижний Новгород',
        //     '5.206.39.255' => 'Челябинск',
        //     '31.163.99.255' => 'Тюмень',
        //     '31.47.184.0' => 'Иркутск',
        // ];

        $ip = request('ip');

        $data = $this->arTelephone['default'];
        if ($position = Location::get($ip)) {
            if(array_key_exists($position->cityName,$this->arTelephone)){
                $data = $this->arTelephone[$position->cityName];
            }
        }

        // dd($data);
        return $data;
    }

    public function getIp() {
        $headers = [
          'HTTP_CLIENT_IP',
          'HTTP_X_FORWARDED_FOR',
          'REMOTE_ADDR'
        ];
        $res = false;
        foreach ($headers as $key) {
            if (!empty($_SERVER[$key])) {
                $ip = explode(',', $_SERVER[$key]);
                $ip = end($ip);
                $ip = trim($ip);
                if (filter_var($ip, FILTER_VALIDATE_IP)) {
                    $res = $ip;
                }
            }
        }
        // $res = '31.163.99.255';
        return $res;
    }
}
