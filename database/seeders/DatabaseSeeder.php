<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'admin1',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => null,
                'level' => 2,
                'description' => null,

                'company_name' => 'TNHH ABC',
                'country' => 'Việt Nam',
                'street_address' => 'Trâu quỳ, gia lâm, HN',
                'postcode_zip' =>'',
                'town_city' => 'Hà nội',
                'phone' => '0987654321',
            ],
        ]);
    
        DB::table('users')->insert([
            [
                'id' => 2,
                'name' => 'admin2',
                'email' => 'admin2@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => null,
                'level' => 0,
                'description' => null,
            ],
            [
                'id' => 3,
                'name' => 'Nguyen Van Tien',
                'email' => 'tien@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-0.png',
                'level' => 1,
                'description' => 'very important person'
            ],
            [
                'id' => 4,
                'name' => 'Ngo Thi Ngoc Anh',
                'email' => 'anh@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-1.png',
                'level' => 1,
                'description' => 'the girl like technology',
            ],
            [
                'id' => 5,
                'name' => 'Le Minh Thinh',
                'email' => 'thinh@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-2.png',
                'level' => 1,
                'description' => 'love pink and hate lies',
            ],
            [
                'id' => 6,
                'name' => 'Nguyen Quang Huy',
                'email' => 'huy@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-3.png',
                'level' => 1,
                'description' => 'so sad',
            ],
        ]);

        DB::table('blogs')->insert([
            [
                'user_id' => 3,
                'title' => 'Loremmm',
                'image' => 'blog-1.jpg',
                'category' => 'Smartphone',
                'content' => '',
            ],
            [
                'user_id' => 4,
                'title' => 'Loremmm',
                'image' => 'blog-2.jpg',
                'category' => 'Laptop',
                'content' => '',
            ],
            [
                'user_id' => 5,
                'title' => 'Loremmm',
                'image' => 'blog-3.jpg',
                'category' => 'Headphone',
                'content' => '',
            ],
            [
                'user_id' => 6,
                'title' => 'Loremmm',
                'image' => 'blog-4.jpg',
                'category' => 'Accessory',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Loremmm',
                'image' => 'blog-5.jpg',
                'category' => 'Headphone',
                'content' => '',
            ],
            [
                'user_id' => 4,
                'title' => 'Loremmm',
                'image' => 'blog-6.jpg',
                'category' => 'SmartWatch',
                'content' => '',
            ],
        ]);

        DB::table('trademarks')->insert([
            [
                'name' => 'SamSung',
            ],
            [
                'name' => 'Apple',
            ],
            [
                'name' => 'Oppo',
            ],
            [
                'name' => 'Xiaomi',
            ],
            [
                'name' => 'MacBook',
            ],
            [
                'name' => 'Hp',
            ],
            [
                'name' => 'Lenovo',
            ],
            [
                'name' => 'Acer',
            ],
            [
                'name' => 'Dell',
            ],
            [
                'name' => 'Iphone',
            ],
            [
                'name' => 'Casio',
            ],
            [
                'name' => 'G-Shock',
            ],
        ]);

        DB::table('product_categories')->insert([
            [
                'name' => 'Smartphone',
            ],
            [
                'name' => 'Laptop',
            ],
            [
                'name' => 'Smartwatch',
            ],
            [
                'name' => 'Headphone',
            ],
            [
                'name' => 'Accessory',
            ],
        ]);

        DB::table('products')->insert([
            [
                'id' => 1,
                'trademark_id' => 10,
                'product_category_id' => 1,
                'name' => 'Iphone 14 Plus',
                'description' => 'Lorem ipsum dolor sit',
                'content' => '',
                'price' => 27999000,
                'qty' => 20,
                'discount' => 26999000,
                'weight' => null,
                'sku' => 'SM IP 1401',
                'featured' => true,
                'tag' => 'Smartphone',
            ],
            [
                'id' => 2,
                'trademark_id' => 10,
                'product_category_id' => 1,
                'name' => 'Iphone 14 Pro',
                'description' => 'Lorem ipsum dolor sit',
                'content' => '',
                'price' => 30990000,
                'qty' => 20,
                'discount' => 30490000,
                'weight' => null,
                'sku' => 'SM IP 1402',
                'featured' => true,
                'tag' => 'Smartphone',
            ],
            [
                'id' => 3,
                'trademark_id' => 10,
                'product_category_id' => 1,
                'name' => 'Iphone 14 Pro Max',
                'description' => 'Lorem ipsum dolor sit',
                'content' => '',
                'price' => 33990000,
                'qty' => 20,
                'discount' => null,
                'weight' => null,
                'sku' => 'SM IP 1403',
                'featured' => true,
                'tag' => 'Smartphone',
            ],
            [
                'id' => 4,
                'trademark_id' => 5,
                'product_category_id' => 2,
                'name' => 'MacBook Air M1 2020',
                'description' => 'Lorem ipsum dolor sit',
                'content' => '',
                'price' => 33490000,
                'qty' => 20,
                'discount' => 30490000,
                'weight' => null,
                'sku' => 'LT MB 01',
                'featured' => true,
                'tag' => 'Laptop',
            ],
            [
                'id' => 5,
                'trademark_id' => 5,
                'product_category_id' => 2,
                'name' => 'MacBook Pro M2 2022',
                'description' => 'Lorem ipsum dolor sit',
                'content' => '',
                'price' => 35490000,
                'qty' => 20,
                'discount' => 30490000,
                'weight' => null,
                'sku' => 'LT MB 02',
                'featured' => true,
                'tag' => 'Laptop',
            ],
            [
                'id' => 6,
                'trademark_id' => 5,
                'product_category_id' => 2,
                'name' => 'MacBook Pro 16 M1 Max 2021',
                'description' => 'Lorem ipsum dolor sit',
                'content' => '',
                'price' => 85490000,
                'qty' => 20,
                'discount' => 82490000,
                'weight' => null,
                'sku' => 'LT MB 02',
                'featured' => true,
                'tag' => 'Laptop',
            ],
            [
                'id' => 7,
                'trademark_id' => 2,
                'product_category_id' => 4,
                'name' => 'Tai nghe Bluetooth AirPods Pro',
                'description' => 'Lorem ipsum dolor sit',
                'content' => '',
                'price' => 6990000,
                'qty' => 20,
                'discount' => null,
                'weight' => null,
                'sku' => 'HP A 01',
                'featured' => true,
                'tag' => 'Headphone',
            ],
            [
                'id' => 8,
                'trademark_id' => 2,
                'product_category_id' => 4,
                'name' => 'Tai nghe Bluetooth AirPods 2',
                'description' => 'Lorem ipsum dolor sit',
                'content' => '',
                'price' => 4000000,
                'qty' => 20,
                'discount' => 2300000,
                'weight' => null,
                'sku' => 'HP A 02',
                'featured' => true,
                'tag' => 'Headphone',
            ],
            [
                'id' => 9,
                'trademark_id' => 2,
                'product_category_id' => 4,
                'name' => 'Tai nghe Bluetooth AirPods 3',
                'description' => 'Lorem ipsum dolor sit',
                'content' => '',
                'price' => 5400000,
                'qty' => 20,
                'discount' => 4890000,
                'weight' => null,
                'sku' => 'HP A 03',
                'featured' => true,
                'tag' => 'Headphone',
            ],
            [
                'id' => 10,
                'trademark_id' => 2,
                'product_category_id' => 3,
                'name' => 'Apple Watch S8',
                'description' => 'Lorem ipsum dolor sit',
                'content' => '',
                'price' => 11990000,
                'qty' => 20,
                'discount' => null,
                'weight' => null,
                'sku' => 'SW A 01',
                'featured' => true,
                'tag' => 'SmartWatch',
            ],
            [
                'id' => 11,
                'trademark_id' => 2,
                'product_category_id' => 3,
                'name' => 'Apple Watch S7',
                'description' => 'Lorem ipsum dolor sit',
                'content' => '',
                'price' => 12000000,
                'qty' => 20,
                'discount' => 9990000,
                'weight' => null,
                'sku' => 'SW A 02',
                'featured' => true,
                'tag' => 'SmartWatch',
            ],
            [
                'id' => 12,
                'trademark_id' => 2,
                'product_category_id' => 3,
                'name' => 'Apple Watch SE 2022',
                'description' => 'Lorem ipsum dolor sit',
                'content' => '',
                'price' => 7490000,
                'qty' => 20,
                'discount' => null,
                'weight' => null,
                'sku' => 'SW A 02',
                'featured' => true,
                'tag' => 'SmartWatch',
            ],
            [
                'id' => 13,
                'trademark_id' => 2,
                'product_category_id' => 5,
                'name' => 'Apple MagSafe Battery Pack',
                'description' => 'Lorem ipsum dolor sit',
                'content' => '',
                'price' => 2990000,
                'qty' => 20,
                'discount' => 2390000,
                'weight' => null,
                'sku' => 'A A 01',
                'featured' => true,
                'tag' => 'Accessory',
            ],
        ]);

        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'path' => '1.jpg',
            ],
            [
                'product_id' => 1,
                'path' => '1.1.jpg',
            ],
            [
                'product_id' => 1,
                'path' => '1.2.jpg',
            ],
            [
                'product_id' => 1,
                'path' => '1.3.jpg',
            ],
            [
                'product_id' => 2,
                'path' => '2.jpg',
            ],
            [
                'product_id' => 2,
                'path' => '2.1.jpg',
            ],
            [
                'product_id' => 2,
                'path' => '2.2.jpg',
            ],
            [
                'product_id' => 2,
                'path' => '2.3.jpg',
            ],
            [
                'product_id' => 3,
                'path' => '3.png',
            ],
            [
                'product_id' => 3,
                'path' => '3.1.png',
            ],
            [
                'product_id' => 3,
                'path' => '3.2.png',
            ],
            [
                'product_id' => 3,
                'path' => '3.3.png',
            ],
            [
                'product_id' => 4,
                'path' => '4.jpg',
            ],
            [
                'product_id' => 5,
                'path' => '5.jpg',
            ],
            [
                'product_id' => 6,
                'path' => '6.jpg',
            ],
            [
                'product_id' => 7,
                'path' => '7.jpeg',
            ],
            [
                'product_id' => 8,
                'path' => '8.jpg',
            ],
            [
                'product_id' => 9,
                'path' => '9.jpeg',
            ],
            [
                'product_id' => 10,
                'path' => '10.jpeg',
            ],
            [
                'product_id' => 11,
                'path' => '11.jpg',
            ],
            [
                'product_id' => 12,
                'path' => '12.jpg',
            ],
            [
                'product_id' => 13,
                'path' => '13.jpg',
            ],
        ]);

        DB::table('product_details')->insert([
            [
                'product_id' => 1,
                'color' => 'red',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'white',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'blue',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'black',
                'qty' => 5,
            ],
            [
                'product_id' => 2,
                'color' => 'red',
                'qty' => 5,
            ],
            [
                'product_id' => 2,
                'color' => 'white',
                'qty' => 5,
            ],
            [
                'product_id' => 2,
                'color' => 'blue',
                'qty' => 5,
            ],
            [
                'product_id' => 2,
                'color' => 'black',
                'qty' => 5,
            ],
            [
                'product_id' => 3,
                'color' => 'black',
                'qty' => 5,
            ],
            [
                'product_id' => 3,
                'color' => 'gray',
                'qty' => 5,
            ],
            [
                'product_id' => 3,
                'color' => 'yellow',
                'qty' => 5,
            ],
            [
                'product_id' => 3,
                'color' => 'white',
                'qty' => 5,
            ],
        ]);

        DB::table('product_comments')->insert([
            [
                'product_id' => 1,
                'user_id' => 5,
                'email' => 'thinh@gmail.com',
                'name' => 'Minh Thinh',
                'messages' => 'Nice !',
                'rating' => 4,
            ],
            [
                'product_id' => 1,
                'user_id' => 6,
                'email' => 'huy@gmail.com',
                'name' => 'Quang Huy',
                'messages' => 'Good !',
                'rating' => 4,
            ],
        ]);
    }
}

