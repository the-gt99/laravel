<?php


namespace App\Repositories;

use App\Models\Currency as CurrencyModel;

class CurrencyRepositoryEloquent implements CurrencyRepository
{

    public function all()
    {
        return CurrencyModel::all();
    }

    public function getCurrencyByName(string $name)
    {
        return CurrencyModel::where('name', $name)->first();
    }

    public function getCurrencyById(int $id)
    {
        //хз почему-то выдает первый элемент вместо требуемого
        //return CurrencyModel::find($id)->first();

        return CurrencyModel::where('id', $id)->first();
    }

    public function create(string $name, float $cost): void
    {
        $currency = new CurrencyModel();
        $currency->name = $name;
        $currency->cost = $cost;
        $currency->save();
    }

    public function updateByNames(array $assocArr)
    {
        foreach ($assocArr as $nameCurrency => $cost) {
            if ($el = CurrencyModel::where("name", $nameCurrency)->first()) {
                $el->update(["cost" => $cost]);
            } else {
                $this->create($nameCurrency, $cost);
            }
        }
    }
}
