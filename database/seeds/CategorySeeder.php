<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Category $categoryModel)
    {
        $categories = [
            'Beleza',
            'Limpeza',
            'Eletrônicos'
        ];

        foreach ($categories as $name) {
            $categoryModel->create(['name' => $name]);
        }
    }
}
