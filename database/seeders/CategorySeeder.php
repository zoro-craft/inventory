<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Électronique', 'description' => 'Appareils et accessoires connectés.'],
            ['name' => 'Maison', 'description' => 'Produits pour l\'aménagement intérieur.'],
            ['name' => 'Mode', 'description' => 'Vêtements et accessoires tendance.'],
            ['name' => 'Sport', 'description' => 'Équipements et accessoires sportifs.'],
            ['name' => 'Beauté', 'description' => 'Produits de soin et cosmétique.'],
            ['name' => 'Jardin', 'description' => 'Équipements et accessoires de jardinage.'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                ['description' => $category['description']]
            );
        }
    }
}
