<?php


namespace App\Http\Controllers;


use App\Models\Product;
use App\Repositories\CurrencyRepositoryEloquent;

class CurrenciesController
{
    protected $currencyRepo;

    public  function __construct(CurrencyRepositoryEloquent $currencyRepo)
    {
        $this->currencyRepo = $currencyRepo;
    }

    public function getAll()
    {
        //todo
        //переделать под общий вывод
        $response = [];

        foreach ($this->currencyRepo->all() as $currency)
        {
            array_push($response,[
                "id" => sha1(config("constants.homePage.salt") . "_" . $currency->id),
                "name" => $currency->name,
                "cost" => $currency->cost
            ]);
        }

        return json_encode($response);
    }

    public function getInfoByName($name)
    {
        //todo
        //переделать под общий вывод
        $response = false;
        $currency = $this->currencyRepo->getCurrencyByName($name);

        if($currency)
            $response = [
                "id" => sha1(config("constants.homePage.salt") . "_" . $currency->id),
                "name" => $currency->name,
                "cost" => $currency->cost
            ];

        return json_encode($response);
    }

    public function getInfoById($id)
    {
        //todo
        //переделать под общий вывод
        $currency = $this->currencyRepo->getCurrencyById($id);

        $response = [
            "id" => sha1(config("constants.homePage.salt") . "_" . $currency->id),
            "name" => $currency->name,
            "cost" => $currency->cost
        ];

        return json_encode($response);
    }
}
