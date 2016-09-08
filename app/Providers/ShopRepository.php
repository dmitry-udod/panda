<?php

namespace App\Providers;

use App\Shop;

class ShopRepository
{
    public function saveFromCsv(array $data)
    {
        $shop = Shop::firstOrNew(['shop_name_full' => $data[2]]);

        $shop->foreign_id = 0;
        $shop->city = $data[0];
        $shop->object_type = $data[1];
        $shop->shop_name_full = $data[2];
        $shop->open_at = $data[3];
        $shop->close_at = $data[4];
        $shop->always_open = $data[5];
        $shop->address = $data[6];
        $shop->contacts = $data[7];
        $shop->lat = '';
        $shop->lnt = '';

        try {
            $shop->save();
        } catch(\Exception $e){
           Log::error('Cant save shop data', [$e]);
        }
    }

    public function all()
    {
        return Shop::orderBy('created_at', 'DESC');
    }
}