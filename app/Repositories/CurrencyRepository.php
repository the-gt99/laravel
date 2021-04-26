<?php


namespace App\Repositories;


interface CurrencyRepository
{
    public function all();
    public function create(string $name, float $cost);

}
