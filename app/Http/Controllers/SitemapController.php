<?php

namespace App\Http\Controllers;

use App\Providers\ShopRepository;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    /**
     * Build sitemap file`
     *
     * @return \Illuminate\Http\Response
     */
    public function sitemap()
    {
      $sitemap = \App::make("sitemap");
      $sitemap->setCache('laravel.sitemap', 600);

      if (!$sitemap->isCached()) {
           $sitemap->add(\URL::to('/'), date('Y-m-d H:i:s'), '1.0', 'daily');
           $sitemap->add(\URL::to('/uk'), date('Y-m-d H:i:s'), '1.0', 'daily');
           $sitemap->add(\URL::to('/shops'), date('Y-m-d H:i:s'), '0.9', 'monthly');

           // add item with translations (url, date, priority, freq, images, title, translations)
          //  $translations = [
          //                    ['language' => 'fr', 'url' => URL::to('pageFr')],
          //                    ['language' => 'de', 'url' => URL::to('pageDe')],
          //                    ['language' => 'bg', 'url' => URL::to('pageBg')],
          //                  ];
          //  $sitemap->add(URL::to('pageEn'), '2015-06-24T14:30:00+02:00', '0.9', 'monthly', [], null, $translations);
           $shops = \App\Shop::orderBy('updated_at', 'desc')->get();

           foreach ($shops as $shop) {
              $sitemap->add(route('shop_details', $shop->id), $shop->updated_at, '0.8', 'monthly');
           }
      }

      return $sitemap->render('xml');
    }
}
