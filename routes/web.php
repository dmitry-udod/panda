<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'ShopController@index')->name('home');
Route::get('/shops', 'ShopController@index')->name('shops');
Route::get('/shops/{id}', 'ShopController@show')->name('shop_details');

//Sitemap
Route::get('/sitemap.xml', function() {
    $sitemap = App::make("sitemap");
    $sitemap->setCache('laravel.sitemap', 600);

    if (!$sitemap->isCached()) {
         $sitemap->add(URL::to('/'), date('Y-m-d H:i:s'), '1.0', 'daily');
         $sitemap->add(URL::to('/uk'), date('Y-m-d H:i:s'), '1.0', 'daily');
         $sitemap->add(URL::to('/shops'), date('Y-m-d H:i:s'), '0.9', 'monthly');

         // add item with translations (url, date, priority, freq, images, title, translations)
        //  $translations = [
        //                    ['language' => 'fr', 'url' => URL::to('pageFr')],
        //                    ['language' => 'de', 'url' => URL::to('pageDe')],
        //                    ['language' => 'bg', 'url' => URL::to('pageBg')],
        //                  ];
        //  $sitemap->add(URL::to('pageEn'), '2015-06-24T14:30:00+02:00', '0.9', 'monthly', [], null, $translations);
         $shops = App\Shop::orderBy('updated_at', 'desc')->get();

         foreach ($shops as $shop) {
            $sitemap->add(route('shop_details', $shop->id), $shop->updated_at, '0.8', 'monthly');
         }
    }

    return $sitemap->render('xml');
});
