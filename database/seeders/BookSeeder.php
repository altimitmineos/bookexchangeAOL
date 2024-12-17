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
                'PrintWeight' => '0.25',
                'PrintWidth' => '12.7',
                'PrintLength' => '18.8',
                'Page' => 364,
                'Category_id' => 1,
                'Format_id' => 1,
                'Image' => 'RisingShield.jpeg',
                'Stock' => 8,
                'Cost' => 80000
            ],
            [
                'Title' => 'Koloni Rajasa and the Flag Bearer',
                'PublicationDate' => '2024-10-27',
                'Author' => 'Akhmad Fadly',
                'ISBN' => '9786230314810',
                'Publisher' => 'm&c!',
                'PrintWeight' => '0.14',
                'PrintWidth' => '13.2',
                'PrintLength' => '20.0',
                'Page' => 184,
                'Category_id' => 1,
                'Format_id' => 1,
                'Image' => 'Rajasa.jpg',
                'Stock' => 8,
                'Cost' => 35000
            ],
            [
                'Title' => 'Overload Vol 2',
                'PublicationDate' => '2024-10-09',
                'Author' => 'Kinosuke Naito',
                'ISBN' => '9786231024480',
                'Publisher' => 'Phoenix Gramedia Indonesia',
                'PrintWeight' => '0.135',
                'PrintWidth' => '13.0',
                'PrintLength' => '18.0',
                'Page' => 148,
                'Category_id' => 1,
                'Format_id' => 1,
                'Image' => 'Overload.jpeg',
                'Stock' => 8,
                'Cost' => 55000
            ],
            [
                'Title' => 'Cerobong Tua Terus Mendera',
                'PublicationDate' => '2024-12-03',
                'Author' => 'Raudal Tanjung Banua',
                'ISBN' => '9786238678075',
                'Publisher' => 'Shira Media',
                'PrintWeight' => '0.125',
                'PrintWidth' => '13.0',
                'PrintLength' => '19.0',
                'Page' => 146,
                'Category_id' => 2,
                'Format_id' => 1,
                'Image' => 'Cerombong.jpeg',
                'Stock' => 8,
                'Cost' => 65000
            ],
            [
                'Title' => 'Tanpa Rencana',
                'PublicationDate' => '2024-11-12',
                'Author' => 'Dee Lestari',
                'ISBN' => '9786231864383',
                'Publisher' => 'Bentang Pustaka',
                'PrintWeight' => '0.25',
                'PrintWidth' => '20.0',
                'PrintLength' => '13.5',
                'Page' => 220,
                'Category_id' => 2,
                'Format_id' => 2,
                'Image' => 'TanpaRencana.jpeg',
                'Stock' => 8,
                'Cost' => 95000
            ],
            [
                'Title' => 'Cerpen Pilihan Kompas 2002 Jejak Tanah',
                'PublicationDate' => '2024-10-27',
                'Author' => 'Danarto Seno dkk',
                'ISBN' => '9789797090353',
                'Publisher' => 'Penerbit Buku Kompas',
                'PrintWeight' => '0.18',
                'PrintWidth' => '14.0',
                'PrintLength' => '21.0',
                'Page' => 164,
                'Category_id' => 2,
                'Format_id' => 1,
                'Image' => 'Cerpen.jpg',
                'Stock' => 8,
                'Cost' => 23000
            ],
            [
                'Title' => 'Melody Pop Hits : Piano & Gitar',
                'PublicationDate' => '2023-09-06',
                'Author' => 'Eureka Julius Teruna Ryan',
                'ISBN' => '9790902191227',
                'Publisher' => 'Anak Hebat Indonesia',
                'PrintWeight' => '0.215',
                'PrintWidth' => '20.0',
                'PrintLength' => '27.0',
                'Page' => 89,
                'Category_id' => 3,
                'Format_id' => 1,
                'Image' => 'melody.jpeg',
                'Stock' => 8,
                'Cost' => 40000
            ],
            [
                'Title' => 'Moshi Moshi Japan',
                'PublicationDate' => '2023-04-09',
                'Author' => 'Claudia Khansa Okuzumi',
                'ISBN' => '9786234930177',
                'Publisher' => 'Kawah Media',
                'PrintWeight' => '0.24',
                'PrintWidth' => '13.0',
                'PrintLength' => '19.0',
                'Page' => 171,
                'Category_id' => 4,
                'Format_id' => 3,
                'Image' => 'moshi.jpg',
                'Stock' => 8,
                'Cost' => 75000
            ],
            [
                'Title' => 'Annyeong, Korean Fever!',
                'PublicationDate' => '2019-09-04',
                'Author' => 'Syamsul Arifin',
                'ISBN' => '9786025992254',
                'Publisher' => 'C-Klik Media',
                'PrintWeight' => '0.174',
                'PrintWidth' => '20.0',
                'PrintLength' => '14.0',
                'Page' => 141,
                'Category_id' => 4,
                'Format_id' => 1,
                'Image' => 'anyeong.jpeg',
                'Stock' => 8,
                'Cost' => 25000
            ],
            [
                'Title' => 'K-Pop Dictionary Gaul',
                'PublicationDate' => '2019-05-01',
                'Author' => 'Woosung Kang',
                'ISBN' => '9786021201480',
                'Publisher' => 'Renebook',
                'PrintWeight' => '0.2',
                'PrintWidth' => '14.0',
                'PrintLength' => '21.0',
                'Page' => 244,
                'Category_id' => 4,
                'Format_id' => 1,
                'Image' => 'kpop.jpeg',
                'Stock' => 8,
                'Cost' => 20000
            ],
        ];

        DB::table('books')->insert($books);
    }
}
