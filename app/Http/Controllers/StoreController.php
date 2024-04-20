<?php

namespace App\Http\Controllers;

use App\Domain\Store\Repositories\StoreRepository;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    protected $storeRepository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function index()
    {
        $stores = $this->storeRepository->all();
        return response()->json($stores);
    }

    public function store(Request $request)
    {
        $store = $this->storeRepository->create($request->all());
        return response()->json($store, 201);
    }

    public function update(Request $request, $id)
    {
        $store = $this->storeRepository->getById($id);
        $store = $this->storeRepository->update($store, $request->all());
        return response()->json($store, 200);
    }

    public function destroy($id)
    {
        $store = $this->storeRepository->getById($id);
        $this->storeRepository->delete($store);
        return response()->json(null, 204);
    }
}
