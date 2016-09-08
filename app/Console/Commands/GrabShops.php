<?php

namespace App\Console\Commands;

use App\Providers\ShopRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GrabShops extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grab:shops';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get shops data from remote server';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ShopRepository $shop)
    {
        parent::__construct();

        $this->shop = $shop;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = env('SOURCE_SHOPS_URL');

        $this->info('Start processing');

        $this->info('Start downloading file');
        $contents = file_get_contents($url);

        if ($contents === false) {
            $m = 'Couldn\'t fetch the file from: ' . $url;
            $this->error($m);
            \Log::error($m);
            return ;
        }

        $this->info('Download complete');

        $fileName = 'shops_' . date('Ymmhis') . '.csv';
        Storage::put($fileName, $contents);

        $this->info('Save data to disk. Filename - ' . $fileName);

        $this->info('Start Process shops');
        $shops = array_map('str_getcsv', file(storage_path() . '/app'. DIRECTORY_SEPARATOR .$fileName));

        $bar = $this->output->createProgressBar(count($shops));

        foreach ($shops as $index => $shop) {

            if ($index > 0) {
                $this->shop->saveFromCsv($shop);
            }

            $bar->advance();
        }

        $bar->finish();
    }
}
