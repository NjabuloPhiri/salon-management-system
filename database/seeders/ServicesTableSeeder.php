<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        $services = [
            'Manicure' => [
                ['name' => 'Gel Soak Off', 'price' => 40],
                ['name' => 'Acrylic Soak Off', 'price' => 60],
                ['name' => 'Soft Gel Tips Off', 'price' => 50],
                ['name' => 'Gel Hands Overlay', 'price' => 150],
                ['name' => 'Acrylic Overlay', 'price' => 170],
                ['name' => 'Buff/Cut/File Only', 'price' => 100],
                ['name' => 'Plain Acrylic Tips', 'price' => 220],
                ['name' => 'Acrylic Tips & Gel Polish', 'price' => 250],
                ['name' => 'Acrylic Tips & Art', 'price' => 250],
                ['name' => 'Plain Acrylic Refill', 'price' => 160],
                ['name' => 'Acrylic & Gel Polish Refill', 'price' => 180],
                ['name' => 'Plain Soft Gel Tips', 'price' => 180],
                ['name' => 'Plain Polygel Tips', 'price' => 250],
                ['name' => 'Polygel Tips & Gel O/L', 'price' => 300],
                ['name' => 'Polygel fill', 'price' => 170],
                ['name' => 'Polygel fill & Gel Polish', 'price' => 200],
                ['name' => 'Full Manicure & Gel O/L', 'price' => 280],
            ],
            'Pedicure' => [
                ['name' => 'Gel Soak Off', 'price' => 30],
                ['name' => 'Acrylic Soak Off', 'price' => 50],
                ['name' => 'Gel Feet Overlay', 'price' => 110],
                ['name' => 'Plain Acrylic Feet', 'price' => 180],
                ['name' => 'Acrylic Feet & Gel O/L', 'price' => 230],
                ['name' => 'Buff/Cut/File Only', 'price' => 100],
                ['name' => 'Soft Gel Tips & Gel O/L', 'price' => 200],
                ['name' => 'Plain Acrylic Refill', 'price' => 150],
                ['name' => 'Acrylic & Gel Polish Refill', 'price' => 150],
            ],
            'Hair Installation' => [
                ['name' => 'Installation (only)', 'price' => 250],
                ['name' => '+ Style', 'price' => 350],
                ['name' => '+ Cornrow', 'price' => 400],
                ['name' => '+ Wig wash', 'price' => 140],
                ['name' => '+ Wig treatment', 'price' => 170],
            ],
            'Natural Hair Service' => [
                ['name' => 'Relax (Dark & Lovely)', 'price' => 120],
                ['name' => 'Hair treatment', 'price' => 70],
                ['name' => 'Hair wash', 'price' => 60],
                ['name' => 'Wig rows', 'price' => 80],
                ['name' => 'Wig rows + fibre', 'price' => 130],
                ['name' => 'Pony Tail', 'price' => 120],
                ['name' => 'Pony Tail + wash', 'price' => 180],
                ['name' => 'Pony Tail + relax', 'price' => 229],
            ],
            'Braids' => [
                ['name' => 'Knotless Braids', 'price' => 500],
                ['name' => 'Goddess Braids', 'price' => 680],
            ],
            'Extras' => [
                ['name' => 'French Tips', 'price' => 10],
                ['name' => 'Nail', 'price' => '15-30'],
                ['name' => 'Chrome Powder', 'price' => 50],
                ['name' => 'Extra Length', 'price' => 60],
                ['name' => 'Stones/Stickers', 'price' => 10],
                ['name' => 'Nail Fix', 'price' => 20],
            ],
        ];

        foreach ($services as $category => $items) {
            foreach ($items as $item) {
                DB::table('services')->insert([
                    'category' => $category,
                    'name' => $item['name'],
                    'price' => $item['price'],
                ]);
            }
        }
    }
}
