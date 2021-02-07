<?php

namespace App\Repositories\Contracts;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function __construct(Category $categoryModel);
    public function getAll();
}