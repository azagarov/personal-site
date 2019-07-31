<?php

namespace Portfolio\Controllers;

use App\Http\Controllers\Controller;

use Portfolio\Contracts\PortfolioService;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{

	public function __construct(PortfolioService $portfolio) {
		$this->portfolio = $portfolio;
	}

	public function main() {
		return view('portfolio.main')->with([
			'fullList' => $this->portfolio->GetList(),
		]);
	}

	/**
	 * @var PortfolioService
	 */
	private $portfolio;

	public function ShowSingleItem($slug) {
	    $item = $this->portfolio->GetItem($slug, false); //false for testing!!!

	    if(!$item) {
	    	die("<h2>NO ITEM FOUND</h2>");
		    return;
	    }

	    return view('portfolio.single_item')->with([
	    	'item' => $item,
		    'fullList' => $this->portfolio->GetList(),
	    ]);

    }
}
