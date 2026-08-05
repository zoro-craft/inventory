<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            return;
        }

        $products = [
            ['name' => 'Smartphone X10', 'description' => 'Téléphone haut de gamme avec appareil photo avancé.', 'price' => 8990, 'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=800&q=80', 'category' => 'Électronique'],
            ['name' => 'Casque Audio Pro', 'description' => 'Casque sans fil à réduction de bruit.', 'price' => 2490, 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=800&q=80', 'category' => 'Électronique'],
            ['name' => 'Montre Connectée', 'description' => 'Montre intelligente avec suivi d’activité.', 'price' => 3290, 'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=800&q=80', 'category' => 'Électronique'],
            ['name' => 'Tablette AirLite', 'description' => 'Tablette légère et performante.', 'price' => 4590, 'image' => 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=800&q=80', 'category' => 'Électronique'],
            ['name' => 'Enceinte Bluetooth', 'description' => 'Enceinte portable avec son immersif.', 'price' => 1890, 'image' => 'https://images.unsplash.com/photo-1518444065439-e933c06ce9cd?auto=format&fit=crop&w=800&q=80', 'category' => 'Électronique'],
            ['name' => 'Canapé Modulaire', 'description' => 'Canapé confortable pour les salons modernes.', 'price' => 12990, 'image' => 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=800&q=80', 'category' => 'Maison'],
            ['name' => 'Lampe Design', 'description' => 'Lampe élégante pour l’éclairage intérieur.', 'price' => 1490, 'image' => 'https://images.unsplash.com/photo-1494526585095-c41746248156?auto=format&fit=crop&w=800&q=80', 'category' => 'Maison'],
            ['name' => 'Rangement Cuisine', 'description' => 'Solution pratique pour organiser la cuisine.', 'price' => 2190, 'image' => 'https://images.unsplash.com/photo-1484154218962-a197022b5858?auto=format&fit=crop&w=800&q=80', 'category' => 'Maison'],
            ['name' => 'Tapis de Salon', 'description' => 'Tapis doux et moderne pour votre intérieur.', 'price' => 2990, 'image' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=800&q=80', 'category' => 'Maison'],
            ['name' => 'Suspension LED', 'description' => 'Éclairage décoratif à la pointe du design.', 'price' => 1690, 'image' => 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=800&q=80', 'category' => 'Maison'],
            ['name' => 'Veste d’Hiver', 'description' => 'Veste chaude et résistante au froid.', 'price' => 3990, 'image' => 'https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=800&q=80', 'category' => 'Mode'],
            ['name' => 'Sneakers Urbaines', 'description' => 'Chaussures confortables et stylées.', 'price' => 2490, 'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=800&q=80', 'category' => 'Mode'],
            ['name' => 'Sac À Main', 'description' => 'Sac élégant avec compartiments pratiques.', 'price' => 3190, 'image' => 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=800&q=80', 'category' => 'Mode'],
            ['name' => 'Montre Classique', 'description' => 'Montre sobre et élégante.', 'price' => 4990, 'image' => 'https://images.unsplash.com/photo-1523170335258-f5ed11844a49?auto=format&fit=crop&w=800&q=80', 'category' => 'Mode'],
            ['name' => 'Protège-Tibia', 'description' => 'Équipement de protection pour sport collectif.', 'price' => 690, 'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=800&q=80', 'category' => 'Sport'],
            ['name' => 'Crème Hydratante', 'description' => 'Crème douce pour une peau nourrie.', 'price' => 390, 'image' => 'https://images.unsplash.com/photo-1556228720-195a672e8a03?auto=format&fit=crop&w=800&q=80', 'category' => 'Beauté'],
            ['name' => 'Sérum Vitamin C', 'description' => 'Sérum éclat pour le visage.', 'price' => 690, 'image' => 'https://images.unsplash.com/photo-1571781926291-c477ebfd024b?auto=format&fit=crop&w=800&q=80', 'category' => 'Beauté'],
            ['name' => 'Masque Nourrissant', 'description' => 'Masque visage à base de botanique.', 'price' => 250, 'image' => 'https://images.unsplash.com/photo-1556228578-8c89e6adf883?auto=format&fit=crop&w=800&q=80', 'category' => 'Beauté'],
            ['name' => 'Kit de Soins', 'description' => 'Ensemble complet pour un rituel beauté.', 'price' => 890, 'image' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=800&q=80', 'category' => 'Beauté'],
            ['name' => 'Tondeuse Électrique', 'description' => 'Tondeuse pratique pour un jardin bien entretenu.', 'price' => 5990, 'image' => 'https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?auto=format&fit=crop&w=800&q=80', 'category' => 'Jardin'],
            ['name' => 'Arrosoir Premium', 'description' => 'Arrosoir robuste avec pompe ergonomique.', 'price' => 490, 'image' => 'https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?auto=format&fit=crop&w=800&q=80', 'category' => 'Jardin'],
            ['name' => 'Éclairages de Jardin', 'description' => 'Guirlande lumineuse pour ambiance extérieure.', 'price' => 690, 'image' => 'https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=800&q=80', 'category' => 'Jardin'],
        ];

        foreach ($products as $index => $product) {
            $category = $categories->firstWhere('name', $product['category']);
            $image = $product['image'] . '&sig=' . ($index + 1) . '-' . str_replace(' ', '-', strtolower($product['name']));

            if ($category) {
                Product::updateOrCreate(
                    ['name' => $product['name']],
                    [
                        'description' => $product['description'],
                        'price' => $product['price'],
                        'image' => $image,
                        'category_id' => $category->id,
                    ]
                );
            }
        }
    }
}
