<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::insert(
            "
        insert into inventarios (name, unit_id, category_id, presentation) VALUES
(UPPER ('Aceite'),4,4,UPPER ('900')),
(UPPER ('Aceitunas'),2,7,UPPER ('')),
(UPPER ('Acondicionador'),4,3,UPPER ('')),
(UPPER ('Ajo'),1,1,UPPER ('')),
(UPPER ('Ajoporro'),1,1,UPPER ('')),
(UPPER ('Arroz'),2,4,UPPER ('900')),
(UPPER ('Arvejas'),2,4,UPPER ('')),
(UPPER ('Atun'),2,2,UPPER ('170')),
(UPPER ('auyama'),1,1,UPPER ('')),
(UPPER ('Avena'),2,3,UPPER ('')),
(UPPER ('Azucar'),1,3,UPPER ('1')),
(UPPER ('Bistecks'),1,2,UPPER ('')),
(UPPER ('Café'),2,4,UPPER ('500')),
(UPPER ('Café'),2,4,UPPER ('100')),
(UPPER ('chicle'),5,5,UPPER ('')),
(UPPER ('Caraotas'),2,3,UPPER ('')),
(UPPER ('Cebolla'),1,1,UPPER ('')),
(UPPER ('Cebollin'),1,1,UPPER ('')),
(UPPER ('Chorizos'),2,8,UPPER ('')),
(UPPER ('Chuletas Cerdo'),1,2,UPPER ('')),
(UPPER ('Cigarros'),5,5,UPPER ('')),
(UPPER ('Cilantro'),1,1,UPPER ('')),
(UPPER ('Cloro'),4,6,UPPER ('')),
(UPPER ('compota osole'),2,11,UPPER ('100')),
(UPPER ('Costillas'),1,1,UPPER ('')),
(UPPER ('Desinfectante'),4,6,UPPER ('')),
(UPPER ('Desodorante Lady'),2,3,UPPER ('30')),
(UPPER ('Detergente en polvo'),2,6,UPPER ('850')),
(UPPER ('Detergente en polvo'),2,6,UPPER ('500')),
(UPPER ('Diablito'),2,8,UPPER ('')),
(UPPER ('Esponjas'),5,6,UPPER ('x3')),
(UPPER ('Frijoles'),2,2,UPPER ('')),
(UPPER ('Guisar'),1,2,UPPER ('')),
(UPPER ('Harina de Maiz'),2,4,UPPER ('')),
(UPPER ('Hueso Ahumado'),2,8,UPPER ('')),
(UPPER ('Huesos Rojos'),2,2,UPPER ('')),
(UPPER ('Huevos'),5,4,UPPER ('')),
(UPPER ('Jabon Azul'),2,6,UPPER ('')),
(UPPER ('Jabon de baño'),5,3,UPPER ('x3')),
(UPPER ('Jamon'),2,8,UPPER ('')),
(UPPER ('Lavaplatos'),2,6,UPPER ('425')),
(UPPER ('Leche'),2,4,UPPER ('500')),
(UPPER ('Lenteja'),2,4,UPPER ('400')),
(UPPER ('Lentejas'),1,4,UPPER ('1')),
(UPPER ('Mantequilla'),1,4,UPPER ('1')),
(UPPER ('Mantequilla'),2,4,UPPER ('250')),
(UPPER ('Masa Pastelitos'),5,8,UPPER ('')),
(UPPER ('Mayonesa'),2,7,UPPER ('910')),
(UPPER ('Mechar'),1,2,UPPER ('')),
(UPPER ('Molida'),1,2,UPPER ('')),
(UPPER ('Muslos'),1,2,UPPER ('')),
(UPPER ('Ñame'),1,1,UPPER ('')),
(UPPER ('Pan'),5,13,UPPER ('')),
(UPPER ('Panela'),5,5,UPPER ('')),
(UPPER ('Papa'),1,1,UPPER ('')),
(UPPER ('Papel Baño'),5,3,UPPER ('')),
(UPPER ('Pasta corta'),1,4,UPPER ('')),
(UPPER ('Pasta larga'),1,4,UPPER ('')),
(UPPER ('Pechuga'),1,2,UPPER ('')),
(UPPER ('Pulpa Cerdo'),1,2,UPPER ('')),
(UPPER ('Queso'),2,8,UPPER ('')),
(UPPER ('Queso amarillo'),2,8,UPPER ('')),
(UPPER ('Recortes'),2,8,UPPER ('')),
(UPPER ('Riquesa'),2,7,UPPER ('300')),
(UPPER ('Sal'),2,4,UPPER ('')),
(UPPER ('Salchichas'),1,8,UPPER ('')),
(UPPER ('Salsa Osole'),5,7,UPPER ('')),
(UPPER ('Shampoo drene'),4,3,UPPER ('370')),
(UPPER ('Bolsa'),5,5,UPPER ('25 Kg')),
(UPPER ('Bolsa'),5,5,UPPER ('2 Kg')),
(UPPER ('Suavitel'),4,6,UPPER ('500')),
(UPPER ('Toallas'),5,3,UPPER ('')),
(UPPER ('Tomate'),1,1,UPPER ('')),
(UPPER ('pimenton'),1,1,UPPER ('')),
(UPPER ('Topocho'),1,1,UPPER ('')),
(UPPER ('tripack Salsas'),5,7,UPPER ('')),
(UPPER ('Vinagre'),4,4,UPPER ('')),
(UPPER ('Yuca'),1,1,UPPER ('')),
(UPPER ('Zanahoria'),1,1,UPPER ('')),
(UPPER ('Pañales'),5,3,UPPER (''));"
        );

        DB::insert(
            "INSERT INTO
    `categories` (name)
VALUES (UPPER('Vegetales')),
    (UPPER('Proteinas')),
    (UPPER('Aseo Personal')),
    (UPPER('Seco')),
    (UPPER('Otros')),
    (
        UPPER('Lavanderia y Aseo Casa')
    ),
    (
        UPPER('Salsas y Condimentos')
    ),
    (UPPER('Charcuteria')),
    (UPPER('Jugos')),
    (UPPER('Refrescos')),
    (UPPER('Compotas')),
    (UPPER('Medicamentos'));"
        );

        DB::insert(
            "INSERT INTO
    units (name)
VALUES ('KG'),
    ('GR'),
    ('LTS'),
    ('ML'),
    ('UND');
        
        "
        );
    }
}
