<?php


use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\back\stocks;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        stocks::create([
            'barang'            => 'barang-1',
            'stock'             => '1',
            'tgl_kadaluarsa'    => '2000-01-01',
            'keterangan'        => 'Barang baru'
        ]);
    }
}
