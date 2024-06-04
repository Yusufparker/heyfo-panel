<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\User;
use App\Models\Ingredient;
use App\Models\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name'=>'Administrator',
                'email'=> 'administrator@gmail.com',
                'password'=> bcrypt('administrator'),
                'role'=>'administrator'
            ],
            [
                'name'=>'Admin1',
                'email'=> 'admin1@gmail.com',
                'password'=> bcrypt('admin1'),
                'role'=>'admin'
            ],
            [
                'name'=>'Admin2',
                'email'=> 'admin2@gmail.com',
                'password'=> bcrypt('admin2'),
                'role'=>'admin'
            ],
        ];


        $permissions = [
            'add-foods',
            'add-articles'
        ];



        foreach ($users as $user) {
            User::create([
                'uuid'=> Str::uuid(),
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'role' => $user['role']
            ]);
        }


        foreach ($permissions as $p) {
            Permission::create([
                'name' => $p
            ]);
        }


        $data_bahan = [
            "jagung",
            "kentang",
            "kol",
            "semangka",
            "tomat",
            "wortel",
            "bayam",
            "kangkung",
            "kacang panjang",
            "buncis",
            "mentimun",
            "terong",
            "ubi",
            "daun bawang",
            "jamur",
            "seledri",
            "labu siam",
            "sawi",
            "pare",
            "petai",
            "jengkol",
            "cabe",
            "bawang merah",
            "bawang putih",
            "ketimun",
            "telur",
            "daging ayam",
            
        ];


        foreach ($data_bahan as $data) {
            Ingredient::create(
                [
                    "uuid" => Str::uuid(),
                    "name" => $data
                ]
            );
        }












        // $data_bahan = [
        //     'ayam',
        //     'jagung',
        //     'kentang',
        //     'kol',
        //     'semangka',
        //     'tomat',
        // ];

        // $data_makanan = [
        //     [
        //         'name' => 'Makanan 1',
        //         'image' => 'https://images.tokopedia.net/img/KRMmCm/2022/7/13/be1f5715-32af-4c66-bec7-8c8c3b57d6a2.jpg',
        //         'desc' => 'lorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum du'
        //     ],
        //     [
        //         'name' => 'Makanan 2',
        //         'image' => 'https://www.masakapahariini.com/wp-content/uploads/2018/08/resep-makanan-sehat-MAHI-1.jpg',
        //         'desc' => 'lorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum du'
        //     ],
        //     [
        //         'name' => 'Makanan 3',
        //         'image' => 'https://images.tokopedia.net/blog-tokopedia-com/uploads/2019/11/7.-Buah-Alpukat.jpg',
        //         'desc' => 'lorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum du'
        //     ],
        //     [
        //         'name' => 'Makanan 4',
        //         'image' => 'https://www.sasa.co.id/medias/page_medias/resep_makanan_sehat_.jpg',
        //         'desc' => 'lorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum dulorem ipsum du'
        //     ],
        // ];


        // foreach ($data_bahan as $bahan) {
        //     Ingredient::create([
        //         'uuid'=> Str::uuid(),
        //         'name' => $bahan,
        //         'image' => 'empty'
        //     ]);
        // }

        // foreach ($data_makanan as $data) {
        //     Food::create([
        //         'uuid' => Str::uuid(),
        //         'name' => $data['name'],
        //         'image' => $data['image'],
        //         'desc' => $data['desc']
        //     ]);
        // }
    }
}
