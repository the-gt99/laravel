<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\CurrencyRepositoryEloquent;


class ProductsController extends Controller
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

        foreach (Product::all() as $product)
        {
            $currency = $this->currencyRepo->getCurrencyById($product->currency_id);

            array_push($response,[
                "id" => sha1(config("constants.homePage.salt") . "_" . $product->id),
                "name" => $product->name,
                "cost" => $product->cost,
                "currency" => [
                    "name" => $currency->name,
                    "cost" => $currency->cost
                ]
            ]);
        }

        return json_encode($response);
    }
}
