<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            [
                'Title' => 'Light Novel The Rising Shield Hero 01',
                'PublicationDate' => '2024-12-03',
                'Author' => 'Aneko Yusagi',
                'ISBN' => '9786231049070',
                'Publisher' => 'Phoenix Gramedia Indonesia',
                'PrintWeight' => '0.25 kg',
                'PrintWidth' => '12.7 cm',
                'PrintLength' => '18.8 cm',
                'Page' => 364,
                'Category_id' => 1,
                'Formats_id' => 1,
                'Image' => 'images/RisingShield.jpeg',
                'Stock' => 8,
                'Cost' => 'Rp. 80.000',
                'is_new_release' => true,   
                'is_best_seller' => false 
            ],
            [
                'Title' => 'Koloni Rajasa and the Flag Bearer',
                'PublicationDate' => '2024-10-27',
                'Author' => 'Akhmad Fadly',
                'ISBN' => '9786230314810',
                'Publisher' => 'm&c!',
                'PrintWeight' => '0.14 kg',
                'PrintWidth' => '13.2 cm',
                'PrintLength' => '20.0 cm',
                'Page' => 184,
                'Category_id' => 1,
                'Formats_id' => 1,
                'Image' => 'images/Rajasa.jpg',
                'Stock' => 8,
                'Cost' => 'Rp. 35.000',
                'is_new_release' => true,    
                'is_best_seller' => false 
            ],
            [
                'Title' => 'Overload Vol 2',
                'PublicationDate' => '2024-10-09',
                'Author' => 'Kinosuke Naito',
                'ISBN' => '9786231024480',
                'Publisher' => 'Phoenix Gramedia Indonesia',
                'PrintWeight' => '0.135 kg',
                'PrintWidth' => '13.0 cm',
                'PrintLength' => '18.0 cm',
                'Page' => 148,
                'Category_id' => 1,
                'Formats_id' => 1,
                'Image' => 'images/Overload.jpeg',
                'Stock' => 8,
                'Cost' => 'Rp. 55.000',
                'is_new_release' => true,  // Tambahkan kolom baru  
                'is_best_seller' => false 
            ],
            [
                'Title' => 'Cerobong Tua Terus Mendera',
                'PublicationDate' => '2024-12-03',
                'Author' => 'Raudal Tanjung Banua',
                'ISBN' => '9786238678075',
                'Publisher' => 'Shira Media',
                'PrintWeight' => '0.125 kg',
                'PrintWidth' => '13.0 cm',
                'PrintLength' => '19.0 cm',
                'Page' => 146,
                'Category_id' => 2,
                'Formats_id' => 1,
                'Image' => 'images/Cerombong.jpeg',
                'Stock' => 8,
                'Cost' => 'Rp. 65.000',
                'is_new_release' => false,  
                'is_best_seller' => true  
            ],
            [
                'Title' => 'Tanpa Rencana',
                'PublicationDate' => '2024-11-12',
                'Author' => 'Dee Lestari',
                'ISBN' => '9786231864383',
                'Publisher' => 'Bentang Pustaka',
                'PrintWeight' => '0.25 kg',
                'PrintWidth' => '20.0 cm',
                'PrintLength' => '13.5 cm',
                'Page' => 220,
                'Category_id' => 2,
                'Formats_id' => 2,
                'Image' => 'images/TanpaRencana.jpeg',
                'Stock' => 8,
                'Cost' => 'Rp. 95.000',
                'is_new_release' => false,  
                'is_best_seller' => true  
            ],
            [
                'Title' => 'Cerpen Pilihan Kompas 2002 Jejak Tanah',
                'PublicationDate' => '2024-10-27',
                'Author' => 'Danarto Seno dkk',
                'ISBN' => '9789797090353',
                'Publisher' => 'Penerbit Buku Kompas',
                'PrintWeight' => '0.18 kg',
                'PrintWidth' => '14.0 cm',
                'PrintLength' => '21.0 cm',
                'Page' => 164,
                'Category_id' => 2,
                'Formats_id' => 1,
                'Image' => 'images/Cerpen.jpg',
                'Stock' => 8,
                'Cost' => 'Rp. 23.000',
                'is_new_release' => false,  
                'is_best_seller' => true  
            ],
            [
                'Title' => 'Melody Pop Hits : Piano & Gitar',
                'PublicationDate' => '2023-09-06',
                'Author' => 'Eureka Julius Teruna Ryan',
                'ISBN' => '9790902191227',
                'Publisher' => 'Anak Hebat Indonesia',
                'PrintWeight' => '0.215 kg',
                'PrintWidth' => '20.0 cm',
                'PrintLength' => '27.0 cm',
                'Page' => 89,
                'Category_id' => 3,
                'Formats_id' => 1,
                'Image' => 'images/melody.jpeg',
                'Stock' => 8,
                'Cost' => 'Rp. 40.000',
                'is_new_release' => false,  
                'is_best_seller' => true  
            ],
            [
                'Title' => 'Moshi Moshi Japan',
                'PublicationDate' => '2023-04-09',
                'Author' => 'Claudia Khansa Okuzumi',
                'ISBN' => '9786234930177',
                'Publisher' => 'Kawah Media',
                'PrintWeight' => '0.24 kg',
                'PrintWidth' => '13.0 cm',
                'PrintLength' => '19.0 cm',
                'Page' => 171,
                'Category_id' => 4,
                'Formats_id' => 3,
                'Image' => 'images/moshi.jpg',
                'Stock' => 8,
                'Cost' => 'Rp. 75.000',
                'is_new_release' => false,  
                'is_best_seller' => true 
            ],
            [
                'Title' => 'Annyeong, Korean Fever!',
                'PublicationDate' => '2019-09-04',
                'Author' => 'Syamsul Arifin',
                'ISBN' => '9786025992254',
                'Publisher' => 'C-Klik Media',
                'PrintWeight' => '0.174 kg',
                'PrintWidth' => '20.0 cm',
                'PrintLength' => '14.0 cm',
                'Page' => 141,
                'Category_id' => 4,
                'Formats_id' => 1,
                'Image' => 'images/anyeong.jpeg',
                'Stock' => 8,
                'Cost' => 'Rp. 25.000',
                'is_new_release' => false,  
                'is_best_seller' => true  
            ],
            [
                'Title' => 'K-Pop Dictionary Gaul',
                'PublicationDate' => '2019-05-01',
                'Author' => 'Woosung Kang',
                'ISBN' => '9786021201480',
                'Publisher' => 'Renebook',
                'PrintWeight' => '0.2 kg',
                'PrintWidth' => '14.0 cm',
                'PrintLength' => '21.0 cm',
                'Page' => 244,
                'Category_id' => 4,
                'Formats_id' => 1,
                'Image' => 'images/kpop.jpeg',
                'Stock' => 8,
                'Cost' => 'Rp. 20000',
                'is_new_release' => false,  
                'is_best_seller' => true 
                
            ],
        ];

        DB::table('books')->insert($books);
    }
}
