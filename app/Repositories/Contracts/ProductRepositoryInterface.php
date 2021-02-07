<?php

namespace App\Repositories\Contracts;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function __construct(Product $model);
    public function getAll();
    public function create(array $data);
    public function get(int $id);
    public function update(int $id, array $data);
    public function delete(int $id);
}
