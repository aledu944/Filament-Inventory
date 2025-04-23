<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Auriculares',
                'slug' => Str::slug('Auriculares'),
                'summary' => 'Descubre una experiencia de sonido excepcional con nuestros auriculares de última generación. Tecnología de cancelación de ruido, audio de alta fidelidad y diseño ergonómico para uso prolongado.',
            ],
            [
                'name' => 'Laptops',
                'slug' => Str::slug('Laptops'),
                'summary' => 'Potencia y portabilidad combinadas en nuestras laptops de alto rendimiento. Ideales para trabajo, gaming o creatividad, con componentes de última tecnología y diseños innovadores.',
            ],
            [
                'name' => 'Smartphones',
                'slug' => Str::slug('Smartphones'),
                'summary' => 'Los últimos smartphones con innovación tecnológica. Cámaras profesionales, rendimiento ultrarrápido y pantallas de alta calidad para una experiencia móvil premium.',
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
