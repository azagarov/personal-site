<?php

namespace Portfolio;

use Illuminate\Database\Eloquent\Model;

class PortfolioItemContent extends Model
{
    public function item() {
    	return $this->belongsTo('Portfolio\PortfolioItem');
    }
}
