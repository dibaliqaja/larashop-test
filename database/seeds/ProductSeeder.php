<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Meja Belajar',
            'desc' => 'Ini adalah meja belajar, digunakan sebagai tatakan buku atau disaat sedang belajar',
            'price' => 50000
        ]);

        Product::create([
            'name' => 'Kursi Belajar',
            'desc' => 'Ini adalah kursi belajar, digunakan sebagai dudukan seseorang yang lagi belajar',
            'price' => 25000
        ]);

        Product::create([
            'name' => 'Kursi Belajar',
            'desc' => 'Ini adalah kursi belajar, digunakan sebagai dudukan seseorang yang lagi belajar',
            'price' => 25000
        ]);

        Product::create([
            'name' => 'Tas Ransel',
            'desc' => 'Ini adalah tas ransel, digunakan sebagai penyimpan barang bawaan',
            'price' => 25000
        ]);

        Product::create([
            'name' => 'Tas Ransel',
            'desc' => 'Ini adalah tas ransel, digunakan sebagai penyimpan barang bawaan',
            'price' => 25000
        ]);

        Product::create([
            'name' => 'Tas Ransel',
            'desc' => 'Ini adalah tas ransel, digunakan sebagai penyimpan barang bawaan',
            'price' => 25000
        ]);
    }
}
