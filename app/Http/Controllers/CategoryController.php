<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    public function index(CategoryRepository $categoryRepository)
    {
        return $categoryRepository->getAll();
    }
}
