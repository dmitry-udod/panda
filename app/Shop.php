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
     * Get short description of what is going on in this place
     *
     * @return string
     */
    public function whatTodo()
    {
        $data = explode(',', $this->shop_name_full);

        return empty($data[1]) ? '' : $data[1];
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
        return empty($this->open_at) ? '00:00' : str_replace('.', ':', $this->open_at);
    }

    /**
     * Get correct close hour
     *
     * @return string
     */
    public function closeAt()
    {
        return empty($this->close_at) ? '00:00' : str_replace('.', ':', $this->close_at);
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

    /**
     * Get correct phone number
     *
     * @return string
     */
    public function contacts()
    {
        return strlen($this->contacts) === 9 ? "0" . $this->contacts : $this->contacts;
    }
}
