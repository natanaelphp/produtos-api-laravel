<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Http\Requests\{
    CreateProductRequest,
    UpdateProductRequest
};

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return $this->productRepository->getAll();
    }

    public function store(CreateProductRequest $request)
    {
        $data = $request->all();

        return $this->productRepository->create($data);
    }

    public function show($id)
    {
        return $this->productRepository->get($id);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $data = $request->all();

        return $this->productRepository->update($id, $data);
    }

    public function destroy($id)
    {
        $deleted = $this->productRepository->delete($id);

        $statusCode = $deleted ? 200 : 204;

        return response()->json(null, $statusCode);
    }
}
