<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            // Premier League
            ['name' => 'Camiseta Chelsea 2024/2025', 'price' => 89.99, 'liga'=>'premierleague', 'image' => 'CamisetaChelsea.jpg', 
             'description' => 'Camiseta oficial del Chelsea para la temporada 2024/2025. Fabricada en 100% poliéster de alta calidad, con un diseño moderno y elegante. 
                                Ideal para los seguidores del club londinense. Incluye el logo bordado en el pecho y detalles de la Premier League.'],
            ['name' => 'Camiseta Arsenal 2024/2025', 'price' => 85.00, 'liga'=>'premierleague', 'image' => 'CamisetaArsenal.jpg', 
             'description' => 'Camiseta oficial del Arsenal para la temporada 2024/2025, hecha de un material ligero y transpirable. Confeccionada con un 100% 
                                poliéster reciclado para un mejor rendimiento y confort. Ideal para entrenamientos y partidos. Diseño clásico con colores rojo y amarillo.'],
            ['name' => 'Camiseta Liverpool 2024/2025', 'price' => 109.99, 'liga'=>'premierleague', 'image' => 'CamisetaLiverpool.jpg', 
             'description' => 'Camiseta oficial del Liverpool FC para la temporada 2024/2025, fabricada con materiales de alto rendimiento que permiten máxima comodidad 
                                en todo momento. El tejido está compuesto por 100% poliéster reciclado, lo que la hace sostenible y ecológica. Su diseño elegante y moderno, 
                                con detalles en rojo y blanco, la convierte en una prenda imprescindible para los aficionados del Liverpool.'],
            
            // La Liga
            ['name' => 'Camiseta Real Madrid 2024/2025', 'price' => 129.99, 'liga'=>'laliga', 'image' => 'CamisetaMadrid.jpg', 
             'description' => 'Camiseta oficial del Real Madrid para la temporada 2024/2025. Hecha de poliéster reciclado, esta camiseta tiene un diseño elegante 
                                con detalles en dorado. Ideal para los fanáticos del equipo blanco, con el logo bordado y la tecnología de ventilación para mantenerte cómodo en 
                                cualquier momento. Perfecta tanto para el campo como para tu día a día.'],
            ['name' => 'Camiseta FC Barcelona 2024/2025', 'price' => 99.00, 'liga'=>'laliga', 'image' => 'CamisetaBarcelona.jpg', 
             'description' => 'Camiseta oficial del FC Barcelona para la temporada 2024/2025. Confeccionada en 100% poliéster con tecnología ClimaCool para mayor 
                                ventilación y comodidad. Diseño clásico azulgrana con detalles amarillos. Perfecta para los fans del Barça que buscan un equilibrio entre 
                                estilo y rendimiento.'],
            ['name' => 'Camiseta Atlético de Madrid 2024/2025', 'price' => 79.50, 'liga'=>'laliga', 'image' => 'CamisetaAtlético.jpg', 
             'description' => 'Camiseta oficial del Atlético de Madrid para la temporada 2024/2025. Hecha de un material altamente transpirable que proporciona 
                                comodidad durante todo el día. Su diseño clásico rojo y blanco es ideal para mostrar tu apoyo al club. Con el logo bordado del equipo y el emblema de La Liga.'],
            
            // Serie A
            ['name' => 'Camiseta Nápoles 2024/2025', 'price' => 69.99, 'liga'=>'seriea', 'image' => 'CamisetaNapoles.jpg', 
             'description' => 'Camiseta oficial del Nápoles para la temporada 2024/2025. Hecha de un material elástico y transpirable que asegura una excelente 
                                comodidad. El tejido es 100% poliéster, lo que ayuda a controlar la humedad durante el uso. Con un diseño en tonos azules y detalles 
                                en blanco, perfecta para los seguidores del club italiano.'],
            ['name' => 'Camiseta Inter de Milán 2024/2025', 'price' => 95.00, 'liga'=>'seriea', 'image' => 'CamisetaInter.jpg', 
             'description' => 'Camiseta oficial del Inter de Milán para la temporada 2024/2025. Hecha con tecnología Dri-FIT para mantenerte seco y cómodo durante 
                                cualquier actividad. El diseño elegante en negro y azul le da un toque clásico y moderno a la vez. Esta camiseta es ideal tanto para la 
                                práctica deportiva como para mostrar tu apoyo al Inter.'],
            ['name' => 'Camiseta AC Milán 2024/2025', 'price' => 109.00, 'liga'=>'seriea', 'image' => 'CamisetaMilan.jpg', 
             'description' => 'Camiseta oficial del AC Milán para la temporada 2024/2025, confeccionada con 100% poliéster reciclado. Diseño clásico rojo y negro 
                                con el escudo del club. Con tecnología de ventilación para mantenerte fresco y seco, ideal para entrenamientos, partidos o como prenda 
                                diaria para los fans del equipo.'],
            
            // Bundesliga
            ['name' => 'Camiseta FC Bayern Múnich 2024/2025', 'price' => 119.99, 'liga'=>'bundesliga', 'image' => 'CamisetaBayern.jpg', 
             'description' => 'Camiseta oficial del Bayern Múnich para la temporada 2024/2025. Hecha de poliéster reciclado con un diseño moderno en rojo y detalles 
                                en blanco y dorado. La tecnología Aeroready asegura que te mantengas cómodo durante todo el partido, ya sea en la cancha o fuera de ella.'],
            ['name' => 'Camiseta Borussia Dortmund 2024/2025', 'price' => 85.00, 'liga'=>'bundesliga', 'image' => 'CamisetaDortmund.jpg', 
             'description' => 'Camiseta oficial del Borussia Dortmund para la temporada 2024/2025, hecha con un material ligero y transpirable. Confeccionada 
                                en 100% poliéster, diseñada para garantizar un ajuste cómodo. El diseño amarillo y negro es característico del club y la camiseta 
                                incluye detalles que la hacen única para los fanáticos de los amarillos.'],
            ['name' => 'Camiseta Leverkusen 2024/2025', 'price' => 79.99, 'liga'=>'bundesliga', 'image' => 'CamisetaLeverkusen.jpg', 
             'description' => 'Camiseta oficial del Bayer Leverkusen para la temporada 2024/2025. Hecha con materiales de alta calidad para ofrecer comodidad 
                                y resistencia. Con un diseño clásico en rojo y negro, esta camiseta incluye tecnología de control de humedad, lo que te permitirá 
                                mantenerte seco durante todo el día.'],
            
            // Ligue 1
            ['name' => 'Camiseta Paris Saint-Germain 2024/2025', 'price' => 119.00, 'liga'=>'ligueun', 'image' => 'CamisetaPSG.jpg', 
             'description' => 'Camiseta oficial del PSG para la temporada 2024/2025, confeccionada con tecnología de absorción de humedad para mantenerte cómodo 
                                durante el uso. Hecha de 100% poliéster, en un diseño clásico en azul, rojo y blanco con detalles dorados. Ideal para los seguidores 
                                del club parisino.'],
            ['name' => 'Camiseta Olympique de Lyon 2024/2025', 'price' => 75.00, 'liga'=>'ligueun', 'image' => 'CamisetaLyon.jpg', 
             'description' => 'Camiseta oficial del Olympique de Lyon para la temporada 2024/2025. Hecha de materiales ligeros y transpirables, con un diseño 
                                clásico en tonos azules y blancos. Esta camiseta incluye detalles en rojo y el logo del club bordado en el pecho, perfecta para 
                                los fanáticos del Lyon.'],
            ['name' => 'Camiseta OL Marsella 2024/2025', 'price' => 69.99, 'liga'=>'ligueun', 'image' => 'CamisetaMarsella.jpg', 
             'description' => 'Camiseta oficial del Olympique de Marsella para la temporada 2024/2025, fabricada con materiales ecológicos y de alta calidad. 
                                El diseño en azul con detalles blancos es el estilo clásico del Marsella, perfecta para la afición del club. Con tecnología de 
                                ventilación para mayor confort y rendimiento.'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
