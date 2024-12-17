<?php

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        Transaction::create([
            'user_id' => 1,
            'book_title' => 'Laravel for Beginners',
            'amount' => 150000,
            'status' => 'completed',
        ]);

        Transaction::create([
            'user_id' => 1,
            'book_title' => 'Mastering PHP',
            'amount' => 200000,
            'status' => 'pending',
        ]);
    }
}

