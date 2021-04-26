<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class Currency
{
    private $url = "http://openexchangerates.org/api/latest.json";

    public function getActual($token) : array
    {
        //todo
        //Заюзать https://docs.guzzlephp.org/en/stable/

        $currencies = file_get_contents($this->url . "?app_id=$token&show_alternative=true");
        $currenciesJson = json_decode($currencies,true);

        $isError = isset($currenciesJson['error']) && filter_var($currenciesJson['error'], FILTER_VALIDATE_BOOLEAN);

        if(!$isError && is_array($currenciesJson['rates']))
        {
            return $currenciesJson['rates'];
        }
        else
        {
            //todo
            //вернуть exception и сделать систему их обработки
            //взять из проектка тикток
            return [];
        }
    }
}
