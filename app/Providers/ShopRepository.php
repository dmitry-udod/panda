<?php

namespace App\Providers;

use App\Shop;
use Illuminate\Database\Eloquent\Model;

class ShopRepository
{
    /**
     * Create shop entity from CSV row
     *
     * @param array $data
     */
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

    /**
     * Get query builder for shops list
     *
     * @return Model
     */
    public function all()
    {
        return Shop::orderBy('created_at', 'DESC');
    }

    /**
     * Find shop by id
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Shop::findOrFail($id);
    }
}