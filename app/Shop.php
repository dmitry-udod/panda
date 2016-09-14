<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['shop_name_full'];

    /**
     * Get short shop name
     *
     * @return string
     */
    public function name()
    {
        $data = explode(',', $this->shop_name_full);

        return empty($data) ? '' : $data[0];
    }

    /**
     * Get shop owner
     *
     * @return string
     */
    public function owner()
    {
        $data = explode(',', $this->shop_name_full);

        return empty($data[2]) ? '' : $data[2];
    }

    /**
     * Get correct open hour
     *
     * @return string
     */
    public function openAt()
    {
        return empty($this->open_at) ? trans('shop.work_24_hours') : $this->open_at;
    }

    /**
     * Get correct close hour
     *
     * @return string
     */
    public function closeAt()
    {
        return empty($this->close_at) ? trans('shop.work_24_hours') : $this->close_at;
    }

    /**
     * Return shop address without city prefix
     *
     * @return string
     */
    public function shortAddress()
    {
        return str_replace('м. ЧЕРКАСИ,', '', $this->address);
    }

    /**
     * Get shop data for seo search keywords
     *
     * @return string
     */
    public function seo()
    {
        return str_replace('"', '', $this->shop_name_full);
    }

    /**
     * Get shop short name for seo description
     *
     * @return mixed
     */
    public function seoName()
    {
        return str_replace('"', '', $this->name());
    }
}
