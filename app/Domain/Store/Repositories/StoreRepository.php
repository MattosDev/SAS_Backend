<?php

namespace App\Domain\Store\Repositories;

use App\Domain\Store\Entities\Store;

class StoreRepository
{
    public function all()
    {
        return Store::all();
    }

    public function create(array $data)
    {
        return Store::create($data);
    }

    public function update(Store $store, array $data)
    {
        $store->update($data);
        return $store;
    }

    public function delete(Store $store)
    {
        $store->delete();
    }

    public function getById(int $id)
    {
        return Store::findOrFail($id);
    }
}
