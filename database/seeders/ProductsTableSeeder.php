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
            [
                'name' => 'Camiseta Chelsea 2024/2025',
                'price' => 89.99,
                'liga' => 'Premier League',
                'image' => 'CamisetaChelsea.jpg',
                'description' => 'Camiseta oficial del Chelsea para la temporada 2024/2025. Fabricada en 100% poliéster de alta calidad, con un diseño moderno y elegante. 
                                Ideal para los seguidores del club londinense. Incluye el logo bordado en el pecho y detalles de la Premier League.',
                'type' => 'Estandar'
            ],
            [
                'name' => 'Camiseta Arsenal 2024/2025',
                'price' => 85.00,
                'liga' => 'Premier League',
                'image' => 'CamisetaArsenal.jpg',
                'description' => 'Camiseta oficial del Arsenal para la temporada 2024/2025, hecha de un material ligero y transpirable. Confeccionada con un 100% 
                                poliéster reciclado para un mejor rendimiento y confort. Ideal para entrenamientos y partidos. Diseño clásico con colores rojo y amarillo.',
                'type' => 'Estandar'
            ],
            [
                'name' => 'Camiseta Liverpool 2024/2025',
                'price' => 109.99,
                'liga' => 'Premier League',
                'image' => 'CamisetaLiverpool.jpg',
                'description' => 'Camiseta oficial del Liverpool FC para la temporada 2024/2025, fabricada con materiales de alto rendimiento que permiten máxima comodidad 
                                en todo momento. El tejido está compuesto por 100% poliéster reciclado, lo que la hace sostenible y ecológica. Su diseño elegante y moderno, 
                                con detalles en rojo y blanco, la convierte en una prenda imprescindible para los aficionados del Liverpool.',
                'type' => 'Estandar'
            ],
            [
                'name' => 'Camiseta United Retro',
                'price' => 114.99,
                'liga' => 'Premier League',
                'image' => 'CamisetaUnitedRetro.png',
                'description' => 'Icónica camiseta del Manchester United de la temporada 2008, con el legendario diseño de Nike y el patrocinio de AIG, usada en la histórica temporada de la Champions League.',
                'type' => 'Retro'
            ],
            [
                'name' => 'Camiseta Arsenal Retro',
                'price' => 104.99,
                'liga' => 'Premier League',
                'image' => 'CamisetaArsenalRetro.png',
                'description' => 'Mítica camiseta del Arsenal de la temporada 2005, con el elegante diseño burdeos de Nike y patrocinio de O2, utilizada en la última campaña de Highbury y en la histórica final de la Champions League.',
                'type' => 'Retro'
            ],

            // La Liga
            [
                'name' => 'Camiseta Real Madrid 2024/2025',
                'price' => 129.99,
                'liga' => 'LaLiga',
                'image' => 'CamisetaMadrid.jpg',
                'description' => 'Camiseta oficial del Real Madrid para la temporada 2024/2025. Hecha de poliéster reciclado, esta camiseta tiene un diseño elegante 
                                con detalles en dorado. Ideal para los fanáticos del equipo blanco, con el logo bordado y la tecnología de ventilación para mantenerte cómodo en 
                                cualquier momento. Perfecta tanto para el campo como para tu día a día.',
                'type' => 'Estandar'
            ],
            [
                'name' => 'Camiseta FC Barcelona 2024/2025',
                'price' => 99.00,
                'liga' => 'LaLiga',
                'image' => 'CamisetaBarcelona.jpg',
                'description' => 'Camiseta oficial del FC Barcelona para la temporada 2024/2025. Confeccionada en 100% poliéster con tecnología ClimaCool para mayor 
                                ventilación y comodidad. Diseño clásico azulgrana con detalles amarillos. Perfecta para los fans del Barça que buscan un equilibrio entre 
                                estilo y rendimiento.',
                'type' => 'Estandar'
            ],
            [
                'name' => 'Camiseta Atlético de Madrid 2024/2025',
                'price' => 79.50,
                'liga' => 'LaLiga',
                'image' => 'CamisetaAtletico.jpg',
                'description' => 'Camiseta oficial del Atlético de Madrid para la temporada 2024/2025. Hecha de un material altamente transpirable que proporciona 
                                comodidad durante todo el día. Su diseño clásico rojo y blanco es ideal para mostrar tu apoyo al club. Con el logo bordado del equipo y el emblema de La Liga.',
                'type' => 'Estandar'
            ],
            [
                'name' => 'Camiseta Leganés x Ibai',
                'price' => 99.50,
                'liga' => 'LaLiga',
                'image' => 'CamisetaLeganesIbai.png',
                'description' => 'Edición especial del C.D. Leganés en colaboración con Ibai Llanos. Diseño exclusivo inspirado en el carisma del streamer y el espíritu del equipo madrileño.',
                'type' => 'Exclusivo'
            ],
            [
                'name' => 'Camiseta Barcelona x Rosalía',
                'price' => 249.99,
                'liga' => 'LaLiga',
                'image' => 'CamisetaBarcelonaRosalia.png',
                'description' => 'Camiseta única del FC Barcelona con diseño especial de Rosalía, fusionando la esencia del club con el estilo inconfundible de la artista catalana.',
                'type' => 'Exclusivo'
            ],
            [
                'name' => 'Camiseta Sevilla x Jesús Navas',
                'price' => 114.50,
                'liga' => 'LaLiga',
                'image' => 'CamisetaSevillaNavas.png',
                'description' => 'Homenaje a la leyenda del Sevilla FC, Jesús Navas. Diseño especial en honor a su trayectoria con el club y su inquebrantable pasión por los colores sevillistas.',
                'type' => 'Exclusivo'
            ],
            [
                'name' => 'Camiseta Atletico Retro',
                'price' => 109.99,
                'liga' => 'LaLiga',
                'image' => 'CamisetaAtleticoRetro.png',
                'description' => 'Auténtica réplica de la camiseta del Arsenal de 1939, con su clásico diseño rojo y mangas blancas, evocando la elegancia de una era dorada del fútbol inglés.',
                'type' => 'Retro'
            ],
            [
                'name' => 'Camiseta Barcelona Retro',
                'price' => 124.99,
                'liga' => 'LaLiga',
                'image' => 'CamisetaBarcelonaRetro.png',
                'description' => 'Clásica camiseta del Arsenal de 1992, con el icónico diseño de Adidas y el patrocinio de JVC, representando la esencia del fútbol de los años 90.',
                'type' => 'Retro'
            ],
            [
                'name' => 'Camiseta Sevilla Retro',
                'price' => 179.99,
                'liga' => 'LaLiga',
                'image' => 'CamisetaSevillaRetro.png',
                'description' => 'Histórica camiseta del Arsenal de 1992, con el inconfundible diseño de Adidas y el patrocinio de JVC, símbolo de una era dorada en Highbury.',
                'type' => 'Retro'
            ],

            // Serie A
            [
                'name' => 'Camiseta Nápoles 2024/2025',
                'price' => 69.99,
                'liga' => 'Serie A',
                'image' => 'CamisetaNapoles.jpg',
                'description' => 'Camiseta oficial del Nápoles para la temporada 2024/2025. Hecha de un material elástico y transpirable que asegura una excelente 
                                comodidad. El tejido es 100% poliéster, lo que ayuda a controlar la humedad durante el uso. Con un diseño en tonos azules y detalles 
                                en blanco, perfecta para los seguidores del club italiano.',
                'type' => 'Estandar'
            ],
            [
                'name' => 'Camiseta Inter de Milán 2024/2025',
                'price' => 95.00,
                'liga' => 'Serie A',
                'image' => 'CamisetaInter.jpg',
                'description' => 'Camiseta oficial del Inter de Milán para la temporada 2024/2025. Hecha con tecnología Dri-FIT para mantenerte seco y cómodo durante 
                                cualquier actividad. El diseño elegante en negro y azul le da un toque clásico y moderno a la vez. Esta camiseta es ideal tanto para la 
                                práctica deportiva como para mostrar tu apoyo al Inter.',
                'type' => 'Estandar'
            ],
            [
                'name' => 'Camiseta AC Milán 2024/2025',
                'price' => 109.00,
                'liga' => 'Serie A',
                'image' => 'CamisetaMilan.jpg',
                'description' => 'Camiseta oficial del AC Milán para la temporada 2024/2025, confeccionada con 100% poliéster reciclado. Diseño clásico rojo y negro 
                                con el escudo del club. Con tecnología de ventilación para mantenerte fresco y seco, ideal para entrenamientos, partidos o como prenda 
                                diaria para los fans del equipo.',
                'type' => 'Estandar'
            ],
            [
                'name' => 'Camiseta Nápoles x Maradona',
                'price' => 139.99,
                'liga' => 'Serie A',
                'image' => 'CamisetaNapolesMaradona.png',
                'description' => 'Edición tributo a la eterna leyenda Diego Armando Maradona. Diseño icónico del Napoli con detalles que recuerdan la era dorada del astro argentino en el club.',
                'type' => 'Exclusivo'
            ],
            [
                'name' => 'Camiseta Inter Retro',
                'price' => 139.99,
                'liga' => 'Serie A',
                'image' => 'CamisetaInterRetro.jpg',
                'description' => 'Clásica camiseta del Inter de Milán de 1993, con el icónico diseño de Umbro y el patrocinio de Fiorucci, representando una era inolvidable del fútbol italiano.',
                'type' => 'Retro'
            ],
            [
                'name' => 'Camiseta Milan Retro',
                'price' => 129.99,
                'liga' => 'Serie A',
                'image' => 'CamisetaMilanRetro.png',
                'description' => 'Icónica camiseta del AC Milan de 1992, con el característico diseño a rayas rojas y negras, patrocinada por Opel, evocando una de las épocas doradas del club en la Serie A.',
                'type' => 'Retro'
            ],

            // Bundesliga
            [
                'name' => 'Camiseta FC Bayern Múnich 2024/2025',
                'price' => 119.99,
                'liga' => 'Bundesliga',
                'image' => 'CamisetaBayern.jpg',
                'description' => 'Camiseta oficial del Bayern Múnich para la temporada 2024/2025. Hecha de poliéster reciclado con un diseño moderno en rojo y detalles 
                                en blanco y dorado. La tecnología Aeroready asegura que te mantengas cómodo durante todo el partido, ya sea en la cancha o fuera de ella.',
                'type' => 'Estandar'
            ],
            [
                'name' => 'Camiseta Borussia Dortmund 2024/2025',
                'price' => 85.00,
                'liga' => 'Bundesliga',
                'image' => 'CamisetaDortmund.jpg',
                'description' => 'Camiseta oficial del Borussia Dortmund para la temporada 2024/2025, hecha con un material ligero y transpirable. Confeccionada 
                                en 100% poliéster, diseñada para garantizar un ajuste cómodo. El diseño amarillo y negro es característico del club y la camiseta 
                                incluye detalles que la hacen única para los fanáticos de los amarillos.',
                'type' => 'Estandar'
            ],
            [
                'name' => 'Camiseta Leverkusen 2024/2025',
                'price' => 79.99,
                'liga' => 'Bundesliga',
                'image' => 'CamisetaLeverkusen.jpg',
                'description' => 'Camiseta oficial del Bayer Leverkusen para la temporada 2024/2025. Hecha con materiales de alta calidad para ofrecer comodidad 
                                y resistencia. Con un diseño clásico en rojo y negro, esta camiseta incluye tecnología de control de humedad, lo que te permitirá 
                                mantenerte seco durante todo el día.',
                'type' => 'Estandar'
            ],

            // Ligue 1
            [
                'name' => 'Camiseta Paris Saint-Germain 2024/2025',
                'price' => 119.00,
                'liga' => 'Ligue 1',
                'image' => 'CamisetaPSG.jpg',
                'description' => 'Camiseta oficial del PSG para la temporada 2024/2025, confeccionada con tecnología de absorción de humedad para mantenerte cómodo 
                                durante el uso. Hecha de 100% poliéster, en un diseño clásico en azul, rojo y blanco con detalles dorados. Ideal para los seguidores 
                                del club parisino.',
                'type' => 'Estandar'
            ],
            [
                'name' => 'Camiseta Olympique de Lyon 2024/2025',
                'price' => 75.00,
                'liga' => 'Ligue 1',
                'image' => 'CamisetaLyon.jpg',
                'description' => 'Camiseta oficial del Olympique de Lyon para la temporada 2024/2025. Hecha de materiales ligeros y transpirables, con un diseño 
                                clásico en tonos azules y blancos. Esta camiseta incluye detalles en rojo y el logo del club bordado en el pecho, perfecta para 
                                los fanáticos del Lyon.',
                'type' => 'Estandar'
            ],
            [
                'name' => 'Camiseta OL Marsella 2024/2025',
                'price' => 69.99,
                'liga' => 'Ligue 1',
                'image' => 'CamisetaMarsella.jpg',
                'description' => 'Camiseta oficial del Olympique de Marsella para la temporada 2024/2025, fabricada con materiales ecológicos y de alta calidad. 
                                El diseño en azul con detalles blancos es el estilo clásico del Marsella, perfecta para la afición del club. Con tecnología de 
                                ventilación para mayor confort y rendimiento.',
                'type' => 'Estandar'
            ],

            //Eredivisie
            [
                'name' => 'Camiseta Ajax x Bob Marley',
                'price' => 109.99,
                'liga' => 'Eredivisie',
                'image' => 'CamisetaAjaxBobmarley.png',
                'description' => 'Camiseta especial del Ajax inspirada en la canción "Three Little Birds" de Bob Marley, himno no oficial del club y símbolo de unión entre los aficionados.',
                'type' => 'Exclusivo'
            ],

            //Liga AFA
            [
                'name' => 'Camiseta Boca Retro',
                'price' => 149.99,
                'liga' => 'Liga AFA',
                'image' => 'CamisetaBocaRetro.png',
                'description' => 'Legendaria camiseta de Boca Juniors de 1996, con el diseño clásico amarillo y azul, y el patrocinio de Quilmes, usada en una de las épocas más brillantes del club en el fútbol argentino.',
                'type' => 'Retro'
            ],

            //Seleccion
            [
                'name' => 'Camiseta Brasil x Cristo Redentor',
                'price' => 399.99,
                'liga' => 'Seleccion',
                'image' => 'CamisetaBrasilCristo.png',
                'description' => 'Edición de lujo de la selección brasileña con un diseño inspirado en el Cristo Redentor, símbolo icónico de Brasil y su pasión por el fútbol.',
                'type' => 'Exclusivo'
            ],
            [
                'name' => 'Camiseta URSS Retro',
                'price' => 124.99,
                'liga' => 'Seleccion',
                'image' => 'CamisetaURSSRetro.png',
                'description' => 'Camiseta histórica de la selección de la URSS, con su clásico diseño en rojo y blanco, utilizada en las competiciones internacionales más destacadas durante la era soviética.',
                'type' => 'Retro'
            ],
            
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
