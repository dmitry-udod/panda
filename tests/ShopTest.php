<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShopTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Get all shops
     *
     * @return void
     */
    public function testGetAllShops()
    {
        $shops = factory(App\Shop::class, 3)->create();

        $repo = new App\Providers\ShopRepository();

        $shopsCount = $repo->all()->count();

        $this->assertEquals(3, $shopsCount);
    }

    /**
     * Test search
     *
     * @return void
     */
    public function testSearch()
    {
        $shops = factory(App\Shop::class, 3)->create();

        $shops[] = factory(App\Shop::class)->create(["shop_name_full" => "My Favorite Shop"]);

        $repo = new App\Providers\ShopRepository();

        $shopsCount = $repo->all(['q' => 'favori'])->count();

        $this->assertEquals(1, $shopsCount);
    }
}
