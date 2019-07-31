<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Portfolio\PortfolioItem;
use Portfolio\PortfolioItemContent;

class ImportPortfolio extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:portfolio';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    	$filePath = storage_path("app/portfolio.csv");
        $fp = fopen($filePath, 'r');
	    if(!$fp) {
	    	$this->error("Can't open {$filePath} for Reading");
	    	return;
	    }

	    $this->info("Input file has been opened.");
	    $this->info("Truncating DB tables ...");

	    PortfolioItemContent::truncate();
	    PortfolioItem::truncate();

//	    $x = DB::query("TRUNCATE TABLE portfolio_item_contents");
//	    var_dump($x);
//	    $x = DB::query("TRUNCATE TABLE portfolio_items");
//	    var_dump($x);
	    $this->info("Truncated OK.");
//die();
	    $headArr = fgetcsv($fp);

	    while($rowArr = fgetcsv($fp)) {
	    	$row = array_combine($headArr, $rowArr);

	    	$item = new PortfolioItem();
	    	$item->order = 0;
	    	$item->views_total = 0;
	    	$item->views_unique = 0;
	    	$item->shares_count = 0;

		    foreach($this->itemFields as $f) {
		    	if(isset($row[$f])) {
				    $item->$f = $row[$f];
			    }
		    }

	    	$item->save();

		    $content = new PortfolioItemContent();
	        $content->item_id = $item->id;
	        $content->locale = 'en';

		    foreach($this->contentFields as $f) {
			    if(isset($row[$f])) {
				    $content->$f = $row[$f];
			    }
		    }

		    $content->save();

	    }
//dd($headArr);

        fclose($fp);
    }

    private $itemFields = ['url', 'slug', 'client_name', 'platform', 'role', 'time_period', 'duration',
	    'key_technologies', 'other_technologies', 'third_party', 'license', 'keywords',
    ];

    private $contentFields = ['title', 'short_description', 'extended_description', 'key_features', 'other_features', ];
}

/*
url	slug	client_name	platform	role	time_period	duration	key_technologies	other_technologies	third_party	license	keywords	title	short_description	extended_description	key_features	other_features
 *
 */
