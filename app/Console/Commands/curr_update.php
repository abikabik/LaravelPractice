<?php

namespace App\Console\Commands;

use App\currenciesModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class curr_update extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'curr_update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates currencies from XML';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $xml = simplexml_load_file("https://nationalbank.kz/rss/rates_all.xml?switch=russian");
        foreach ($xml->channel->item as $item) {
        $result=array(
            'name' => (string) $item->title,
            'rate' => (string) $item->description,
            'date' => (string) date('Y-m-d', strtotime($item->pubDate)),
        );
            $curr= new currenciesModel;
            $curr->name=$result['name'];
            $curr->rate=$result['rate'];
            $curr->date=$result['date'];
            $curr->save();

        }
        $this->info("Updated successfully ");

    }
}
