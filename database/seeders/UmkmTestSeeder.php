<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\LikeUMKM;
use App\Models\ReviewUmkm;
use App\Models\ViewUmkm;
use App\Models\ListUMKM;
use Faker\Factory as Faker;

class UmkmTestSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            $latitude = $faker->latitude;
            $longitude = $faker->longitude;
            $description = $faker->text(250);
            $title = $faker->text(20);
            $image = $faker->imageUrl(360, 360);

            ListUMKM::create([
                'image' => $image,
                'title' => $title,
                'view' => 0,
                'rating' => 0,
                'review' => 0,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'description' => $description
            ]);
        }

        // ListUMKM::create([
        //     'image' => 'https://firebasestorage.googleapis.com/v0/b/bwave-app.appspot.com/o/dataumkm%2F2%2Fumkm%20seblak%201.png?alt=media&token=c00d499a-1a77-4170-9aa2-960321404caa',
        //     'title' => 'Seblak Gacor',
        //     'view' => 0,
        //     'rating' => 0,
        //     'review' =>0,
        //     'description' => 'LOREM IPSUM BLA BLA'
        // ]);

        $yodha = User::create([
            'username' => 'Yodha Nabiha Rafif',
            'photoUri' => 'https://firebasestorage.googleapis.com/v0/b/bwave-app.appspot.com/o/profileUser%2F1%2Fphoto?alt=media&token=d9e36c53-bd31-4886-8597-7e525e6e75b4',
            'photoUriBg' => 'https://firebasestorage.googleapis.com/v0/b/bwave-app.appspot.com/o/profileUser%2F1%2Fbackground?alt=media&token=7a5c14ec-83a4-4ddc-9351-5a776951e1ac',
            'bio' => 'cuek vtgcgcjvgvhjttyvuy',
            'email' => 'yodhanabiha2@gmail.com',
            'number' => '+6285710293943',
            'password' => '$2y$10$K.i6/czbaUZFU0zG.Q4LZ.xN5G6y8asYrnV5id4CYEqwPKXEo53ju'
        ]);
        
        $yodha -> assignRole('user');

    }
}
