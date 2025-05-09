<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Sony WH-1000XM5',
                'slug' => Str::slug('Sony WH-1000XM5'),
                'description' => 'Auriculares inalámbricos con cancelación de ruido líder en su clase. Tecnología de sonido HD con procesador V1 integrado. Compatible con Sony 360 Reality Audio. Hasta 30 horas de batería con carga rápida.',
                'price' => 299.99,
                'code' => "LV-001",
                "summary" => "Auriculares inalámbricos con cancelación de ruido líder en su clase y 30h de batería",
                'category_id' => 1,
            ],
            [
                'name' => 'Dell XPS 15 9520',
                'slug' => Str::slug('Dell XPS 15 9520'),
                'description' => 'Laptop premium con pantalla InfinityEdge 4K OLED de 15.6". Procesador Intel Core i7 de 12ma generación, 32GB RAM DDR5, 1TB SSD NVMe. Tarjeta gráfica NVIDIA GeForce RTX 3050 Ti. Diseño ultradelgado en aluminio y fibra de carbono.',
                'price' => 2199.99,
                'code' => "LV-002",
                "summary" => "Laptop premium con pantalla 4K OLED, Intel Core i7 y 32GB RAM",
                'category_id' => 2,
            ],
            [
                'name' => 'iPhone 15 Pro Max',
                'slug' => Str::slug('iPhone 15 Pro Max'),
                'description' => 'Smartphone Apple con pantalla Super Retina XDR de 6.7". Chip A17 Bionic, 48MP cámara principal con estabilización óptica. Resistente al agua IP68. Batería para todo el día y carga rápida USB-C.',
                'price' => 1399.99,
                'code' => "LV-003",
                "summary" => "Flagship de Apple con cámara de 48MP y pantalla 120Hz ProMotion",
                'category_id' => 3,
            ],
            [
                'name' => 'Bose QuietComfort Ultra',
                'slug' => Str::slug('Bose QuietComfort Ultra'),
                'description' => 'Auriculares con cancelación de ruido adaptativa y sonido espacial Bose Immersive Audio. Modos de escucha activa, hasta 24h de autonomía. Compatible con asistente de voz y touch controls.',
                'price' => 349.99,
                'code' => "LV-004",
                "summary" => "Auriculares con sonido espacial y cancelación de ruido inteligente",
                'category_id' => 1,
            ],
            [
                'name' => 'HP Spectre x360 16',
                'slug' => Str::slug('HP Spectre x360 16'),
                'description' => 'Laptop convertible 2-en-1 con pantalla táctil 4K de 16". Procesador Intel Evo Core i9, 16GB RAM, 2TB SSD. Batería de hasta 17 horas. Incluye lápiz óptico HP Tilt Pen y funda de piel natural.',
                'price' => 1899.99,
                'code' => "LV-005",
                "summary" => "Convertible premium con pantalla táctil 4K y procesador Core i9",
                'category_id' => 2,
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'slug' => Str::slug('Samsung Galaxy S24 Ultra'),
                'description' => 'Smartphone Android con pantalla Dynamic AMOLED 2X de 6.8". Cámara de 200MP con zoom óptico 10x. Procesador Snapdragon 8 Gen 3, 12GB RAM. Batería de 5000mAh con carga inalámbrica.',
                'price' => 1299.99,
                'code' => "LV-006",
                "summary" => "Potente smartphone Android con cámara de 200MP y S-Pen integrado",
                'category_id' => 3,
            ],
            [
                'name' => 'Sennheiser Momentum 4',
                'slug' => Str::slug('Sennheiser Momentum 4'),
                'description' => 'Auriculares wireless con sonido Hi-Res y cancelación de ruido híbrida. Autonomía de 60 horas, carga rápida USB-C. Control táctil inteligente y diseño premium en cuero.',
                'price' => 279.99,
                'code' => "LV-007",
                "summary" => "Sonido de alta fidelidad con 60 horas de autonomía",
                'category_id' => 1,
            ],
            [
                'name' => 'MacBook Pro 16" M3 Max',
                'slug' => Str::slug('MacBook Pro 16 M3 Max'),
                'description' => 'Laptop Apple con chip M3 Max de 16-core CPU/40-core GPU. Pantalla Liquid Retina XDR de 16.2". 64GB RAM unificada, 8TB SSD. Sistema de audio de seis parlantes con Dolby Atmos.',
                'price' => 4299.99,
                'code' => "LV-008",
                "summary" => "Potencia extrema con chip M3 Max y pantalla XDR profesional",
                'category_id' => 2,
            ],
            [
                'name' => 'Google Pixel 8 Pro',
                'slug' => Str::slug('Google Pixel 8 Pro'),
                'description' => 'Teléfono Android con cámara de 50MP y sistema de IA Tensor G3. Pantalla OLED de 6.7" a 120Hz. Resistente IP68, carga inalámbrica y actualizaciones garantizadas por 5 años.',
                'price' => 999.99,
                'code' => "LV-009",
                "summary" => "Cámaras líderes en smartphones con inteligencia artificial Google",
                'category_id' => 3,
            ],
            [
                'name' => 'Apple AirPods Max',
                'slug' => Str::slug('Apple AirPods Max'),
                'description' => 'Auriculares over-ear con cancelación activa de ruido. Sonido espacial con seguimiento dinámico de cabeza. Diseño premium en aluminio y malla transpirable.',
                'price' => 449.99,
                'code' => "LV-010",
                "summary" => "Auriculares premium de Apple con sonido espacial dinámico",
                'category_id' => 1,
            ],
            [
                'name' => 'Lenovo ThinkPad X1 Carbon',
                'slug' => Str::slug('Lenovo ThinkPad X1 Carbon'),
                'description' => 'Laptop empresarial ultraliviana (1.1kg) con pantalla 2.8K OLED. Procesador Intel vPro Core i7, 32GB RAM, 1TB SSD. Teclado retroiluminado y lector de huellas.',
                'price' => 2399.99,
                'code' => "LV-011",
                "summary" => "Laptop empresarial ultraligera con máxima seguridad y rendimiento",
                'category_id' => 2,
            ],
            [
                'name' => 'Xiaomi 14 Ultra',
                'slug' => Str::slug('Xiaomi 14 Ultra'),
                'description' => 'Smartphone con cámara Leica de 1" y doble apertura variable. Snapdragon 8 Gen 3, pantalla AMOLED 2K 120Hz. Carga hiperrápida de 90W y carga inalámbrica de 50W.',
                'price' => 1099.99,
                'code' => "LV-012",
                "summary" => "Cámaras profesionales Leica en un smartphone de alto rendimiento",
                'category_id' => 3,
            ],
            [
                'name' => 'JBL Tour One M2',
                'slug' => Str::slug('JBL Tour One M2'),
                'description' => 'Auriculares con cancelación de ruido adaptativa Smart Ambient. Sonido Hi-Res certificado, 50 horas de autonomía. Asistentes de voz y modo concierto en vivo.',
                'price' => 199.99,
                'code' => "LV-013",
                "summary" => "Audio de estudio con cancelación de ruido inteligente",
                'category_id' => 1,
            ],
            [
                'name' => 'Asus ROG Zephyrus G14',
                'slug' => Str::slug('Asus ROG Zephyrus G14'),
                'description' => 'Laptop gaming con AMD Ryzen 9 7940HS y NVIDIA RTX 4090. Pantalla QHD+ 165Hz, 32GB DDR5, 2TB SSD. Teclado mecánico per-key RGB y diseño AniMe Matrix.',
                'price' => 2899.99,
                'code' => "LV-014",
                "summary" => "Ultraportátil gaming con potencia extrema RTX 4090",
                'category_id' => 2,
            ],
            [
                'name' => 'OnePlus 12',
                'slug' => Str::slug('OnePlus 12'),
                'description' => 'Smartphone con pantalla Fluid AMOLED 2K 120Hz. Cámara Hasselblad de 64MP, Snapdragon 8 Gen 3. Carga de 100W con batería de 5400mAh y diseño alerta deslizable.',
                'price' => 899.99,
                'code' => "LV-015",
                "summary" => "Rendimiento flagship con carga ultrarrápida de 100W",
                'category_id' => 3,
            ],
            [
                'name' => 'Beats Studio Pro',
                'slug' => Str::slug('Beats Studio Pro'),
                'description' => 'Auriculares over-ear con cancelación de ruido activa. Sonido espacial personalizado, hasta 40h de batería. Compatibilidad multiplataforma con iOS y Android.',
                'price' => 249.99,
                'code' => "LV-016",
                "summary" => "Audio potente con cancelación de ruido y diseño ergonómico",
                'category_id' => 1,
            ],
            [
                'name' => 'Microsoft Surface Laptop 6',
                'slug' => Str::slug('Microsoft Surface Laptop 6'),
                'description' => 'Laptop convertible con pantalla PixelSense táctil de 15". Procesador Snapdragon X Elite, 16GB RAM LPDDR5x. Windows 11 Pro y autonomía de hasta 20 horas.',
                'price' => 1699.99,
                'code' => "LV-017",
                "summary" => "Diseño elegante con potencia Snapdragon X Elite y Windows 11 Pro",
                'category_id' => 2,
            ],
            [
                'name' => 'Nothing Phone (2)',
                'slug' => Str::slug('Nothing Phone 2'),
                'description' => 'Smartphone con diseño transparente y LED Glyph Interface. Snapdragon 8+ Gen 1, pantalla OLED 120Hz. Sistema dual cámaras de 50MP y carga inalámbrica.',
                'price' => 699.99,
                'code' => "LV-018",
                "summary" => "Diseño único con interfaz LED Glyph y rendimiento premium",
                'category_id' => 3,
            ],
            [
                'name' => 'Sony LinkBuds S',
                'slug' => Str::slug('Sony LinkBuds S'),
                'description' => 'Audífonos true wireless compactos con cancelación de ruido. Sonido de alta calidad con driver V1. Resistencia IPX4 y hasta 20h de autonomía total.',
                'price' => 149.99,
                'code' => "LV-019",
                "summary" => "Audífonos compactos con cancelación de ruido y audio de alta resolución",
                'category_id' => 1,
            ],
            [
                'name' => 'Razer Blade 18',
                'slug' => Str::slug('Razer Blade 18'),
                'description' => 'Laptop gaming con pantalla 18" 4K 144Hz. Intel Core i9-14900HX y NVIDIA RTX 4090. 64GB DDR5 RAM, 4TB SSD. Teclado mecánico Chroma RGB y refrigeración vapor chamber.',
                'price' => 4999.99,
                'code' => "LV-020",
                "summary" => "Monstruo gaming con pantalla 18' 4K y componentes top de gama",
                'category_id' => 2,
            ],
            [
                'name' => 'Jabra Elite 85t',
                'slug' => Str::slug('Jabra Elite 85t'),
                'description' => 'Audífonos true wireless con cancelación de ruido ajustable. Drivers de 12mm, sonido equilibrado. Resistencia IPX4, hasta 25 horas de batería con estuche de carga. Compatible con carga inalámbrica.',
                'price' => 179.99,
                'code' => "LV-021",
                "summary" => "Audífonos true wireless con cancelación de ruido ajustable y sonido equilibrado",
                'category_id' => 1,
            ],
            [
                'name' => 'Acer Swift 5',
                'slug' => Str::slug('Acer Swift 5'),
                'description' => 'Laptop ultraligera de 14" 2K touchscreen. Intel Core i7-1360P, 16GB LPDDR5, 1TB SSD. Chasis de magnesio-litio de 990g. Batería de 15 horas y carga rápida USB-C.',
                'price' => 1299.99,
                'code' => "LV-022",
                "summary" => "Ultrabook ligero con pantalla táctil 2K y procesador Intel de 13va generación",
                'category_id' => 2,
            ],
            [
                'name' => 'Oppo Find X6 Pro',
                'slug' => Str::slug('Oppo Find X6 Pro'),
                'description' => 'Smartphone con cámara triple Hasselblad de 50MP. Pantalla LTPO AMOLED 2K 120Hz, Snapdragon 8 Gen 2. Batería de 5000mAh con carga de 100W. Certificación IP68.',
                'price' => 1199.99,
                'code' => "LV-023",
                "summary" => "Potente smartphone con sistema de cámara Hasselblad y carga ultrarrápida",
                'category_id' => 3,
            ],
            [
                'name' => 'HyperX Cloud Alpha Wireless',
                'slug' => Str::slug('HyperX Cloud Alpha Wireless'),
                'description' => 'Auriculares gaming con conexión inalámbrica de 2.4GHz. Batería de 300 horas, drivers duales de 50mm. Estructura de aluminio reforzado y almohadillas de memoria viscoelástica.',
                'price' => 199.99,
                'code' => "LV-024",
                "summary" => "Auriculares gaming inalámbricos con autonomía récord de 300 horas",
                'category_id' => 1,
            ],
            [
                'name' => 'Asus ZenBook Pro Duo 15',
                'slug' => Str::slug('Asus ZenBook Pro Duo 15'),
                'description' => 'Laptop creativa con pantalla dual 4K OLED. Intel Core i9-13900H, RTX 4070, 32GB RAM. Pantalla principal 15.6" 4K y ScreenPad Plus secundario táctil.',
                'price' => 2999.99,
                'code' => "LV-025",
                "summary" => "Solución creativa con pantallas duales 4K y hardware de alto rendimiento",
                'category_id' => 2,
            ],
            [
                'name' => 'Vivo X90 Pro+',
                'slug' => Str::slug('Vivo X90 Pro+'),
                'description' => 'Smartphone con sensor de cámara de 1" y zoom óptico 5x. Pantalla AMOLED 2K 120Hz, Snapdragon 8 Gen 2. Sistema de audio Hi-Fi con DAC integrado.',
                'price' => 1399.99,
                'code' => "LV-026",
                "summary" => "Fotografía móvil profesional con sensor de cámara de 1 pulgada",
                'category_id' => 3,
            ],
            [
                'name' => 'Bang & Olufsen Beoplay HX',
                'slug' => Str::slug('Bang & Olufsen Beoplay HX'),
                'description' => 'Auriculares premium con diseño en aluminio anodizado. Cancelación de ruido adaptativa, sonido signature B&O. Hasta 35 horas de autonomía con carga rápida USB-C.',
                'price' => 499.99,
                'code' => "LV-027",
                "summary" => "Audio de lujo con diseño escandinavo y materiales premium",
                'category_id' => 1,
            ],
            [
                'name' => 'MSI Stealth 17 Studio',
                'slug' => Str::slug('MSI Stealth 17 Studio'),
                'description' => 'Laptop gaming delgada de 17" 4K 144Hz. Intel Core i9-13900H, RTX 4090, 64GB DDR5. Teclado mecánico per-key RGB y sistema de refrigeración Cryo-Tech.',
                'price' => 3999.99,
                'code' => "LV-028",
                "summary" => "Potencia gaming en formato ultradelgado con pantalla 4K",
                'category_id' => 2,
            ],
            [
                'name' => 'Motorola Edge 40 Ultra',
                'slug' => Str::slug('Motorola Edge 40 Ultra'),
                'description' => 'Smartphone con pantalla pOLED 165Hz y carga de 125W. Cámara de 200MP con OIS, Snapdragon 8 Gen 2. Diseño curvo con resistencia IP68.',
                'price' => 999.99,
                'code' => "LV-029",
                "summary" => "Pantalla de 165Hz y carga más rápida del mercado",
                'category_id' => 3,
            ],
            [
                'name' => 'Anker Soundcore Liberty 4',
                'slug' => Str::slug('Anker Soundcore Liberty 4'),
                'description' => 'Audífonos true wireless con cancelación de ruido adaptativa. Sonido espacial ACAA 3.0, monitor de frecuencia cardíaca. Hasta 28 horas de autonomía total.',
                'price' => 129.99,
                'code' => "LV-030",
                "summary" => "Tecnología de seguimiento cardíaco y cancelación de ruido inteligente",
                'category_id' => 1,
            ],
            [
                'name' => 'LG Gram 17',
                'slug' => Str::slug('LG Gram 17'),
                'description' => 'Laptop ultraligera de 17" WQXGA. Intel Evo i7-1360P, 32GB LPDDR5, 2TB SSD. Peso de solo 1.35kg con batería de 19 horas. Certificación militar MIL-STD-810H.',
                'price' => 1999.99,
                'code' => "LV-031",
                "summary" => "Pantalla grande ultraligera con máxima portabilidad",
                'category_id' => 2,
            ],
            [
                'name' => 'Xiaomi Redmi Note 12 Pro+',
                'slug' => Str::slug('Xiaomi Redmi Note 12 Pro+'),
                'description' => 'Smartphone con cámara de 200MP y carga de 210W. Pantalla AMOLED 120Hz, Dimensity 1080. Altavoces estéreo con Dolby Atmos.',
                'price' => 449.99,
                'code' => "LV-032",
                "summary" => "Carga más rápida del mundo y cámara de alta resolución",
                'category_id' => 3,
            ],
            [
                'name' => 'Skullcandy Crusher Evo',
                'slug' => Str::slug('Skullcandy Crusher Evo'),
                'description' => 'Auriculares con bass sensorial personalizable. Hasta 40 horas de batería, modo ambiente ajustable. Tecnología Tile para localización.',
                'price' => 159.99,
                'code' => "LV-033",
                "summary" => "Experiencia de graves personalizables y tecnología antiperdida",
                'category_id' => 1,
            ],
            [
                'name' => 'Lenovo Yoga 9i',
                'slug' => Str::slug('Lenovo Yoga 9i'),
                'description' => 'Convertible 2-en-1 de 14" 4K OLED táctil. Intel Core i7-1360P, 16GB RAM, 1TB SSD. Batería de 18 horas con carga rápida.',
                'price' => 1699.99,
                'code' => "LV-034",
                "summary" => "Versatilidad premium con pantalla OLED táctil y rotación 360°",
                'category_id' => 2,
            ],
            [
                'name' => 'Honor Magic5 Pro',
                'slug' => Str::slug('Honor Magic5 Pro'),
                'description' => 'Smartphone con triple cámara de 50MP y pantalla LTPO 120Hz. Snapdragon 8 Gen 2, carga inalámbrica de 66W. Sistema de seguridad de nivel bancario.',
                'price' => 1099.99,
                'code' => "LV-035",
                "summary" => "Fotografía avanzada con seguridad biométrica mejorada",
                'category_id' => 3,
            ],
            [
                'name' => 'JBL Live Pro 2',
                'slug' => Str::slug('JBL Live Pro 2'),
                'description' => 'Audífonos true wireless con ANC inteligente y sonido JBL Signature. Hasta 30 horas de autonomía, resistencia IPX5. Personalización mediante aplicación.',
                'price' => 149.99,
                'code' => "LV-036",
                "summary" => "Sonido personalizable con cancelación de ruido adaptativa",
                'category_id' => 1,
            ],
            [
                'name' => 'Microsoft Surface Pro 9',
                'slug' => Str::slug('Microsoft Surface Pro 9'),
                'description' => 'Tablet convertible con procesador SQ3 y Windows 11 Pro. Pantalla PixelSense 13" 120Hz, LTE avanzado. Teclado Type Cover incluido.',
                'price' => 1599.99,
                'code' => "LV-037",
                "summary" => "Versatilidad empresarial con conectividad LTE integrada",
                'category_id' => 2,
            ],
            [
                'name' => 'Ulefone Armor 14',
                'slug' => Str::slug('Ulefone Armor 14'),
                'description' => 'Smartphone rugged con certificación IP68/IP69K/MIL-STD-810G. Batería de 10000mAh, cámara nocturna de 48MP. Resistente a caídas de 2 metros.',
                'price' => 299.99,
                'code' => "LV-038",
                "summary" => "Diseño resistente para uso extremo con batería gigante",
                'category_id' => 3,
            ],
            [
                'name' => 'Shure AONIC 50',
                'slug' => Str::slug('Shure AONIC 50'),
                'description' => 'Auriculares Hi-Res Wireless con cancelación de ruido. Drivers de 50mm, sonido de estudio. Hasta 20 horas de batería y entrada de audio balanceado.',
                'price' => 299.99,
                'code' => "LV-039",
                "summary" => "Calidad de audio profesional inalámbrica",
                'category_id' => 1,
            ],
            [
                'name' => 'HP Envy 16',
                'slug' => Str::slug('HP Envy 16'),
                'description' => 'Laptop creativa de 16" 4K touch OLED. Intel Core i9-13900H, RTX 4060, 32GB RAM. Sistema de audio Bang & Olufsen con 8 altavoces.',
                'price' => 2499.99,
                'code' => "LV-040",
                "summary" => "Potencia creativa con pantalla OLED táctil y audio premium",
                'category_id' => 2,
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
