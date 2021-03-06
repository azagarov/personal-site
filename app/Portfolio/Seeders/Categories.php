<?php

namespace Portfolio\Seeders;

use Illuminate\Database\Seeder;

//use Portfolio\PortfolioCategory;
//use Portfolio\PortfolioCategoryContent;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*
		foreach($this->getCategories() as $slug => $cData) {
			$category = PortfolioCategory::where('slug', $slug)->first();
			if(!$category) {
				$category = new PortfolioCategory();
				$category->slug = $slug;
				$category->status = $this->defaultStatus;
				$category->save();
			}

			$cId = $category->id;
			foreach($cData as $locale => $lData) {
				$content = PortfolioCategoryContent::where('category_id', $cId)
					->where('locale', $locale)
					->first();
				if(!$content) {
					$content = new PortfolioCategoryContent();
					$content->category_id = $cId;
					$content->locale = $locale;
				}
				$content->title = $lData['title'];
				$content->description = $lData['description'];

				$content->save();
			}
		}
*/
    }

//    private $defaultStatus = PortfolioCategory::STATUS_PUBLIC;

    private function getCategories() {
	    return [
		    'development' => [
			    'en' => [
				    'title' => 'Software Development',
				    'description' => '',
			    ],
			    'es' => [
				    'title' => 'Desarollo de Software',
				    'description' => '',
			    ],
			    'ru' => [
				    'title' => 'Разработка ПО',
				    'description' => '',
			    ],
		    ],
		    'diving' => [
			    'en' => [
				    'title' => 'Diving',
				    'description' => '',
			    ],
			    'es' => [
				    'title' => 'Buceo',
				    'description' => '',
			    ],
			    'ru' => [
				    'title' => 'Дайвинг',
				    'description' => '',
			    ],
		    ],
		    'traveling' => [
			    'en' => [
				    'title' => 'Traveling',
				    'description' => '',
			    ],
			    'es' => [
				    'title' => 'Viajar',
				    'description' => '',
			    ],
			    'ru' => [
				    'title' => 'Путешествия',
				    'description' => '',
			    ],
		    ],
		    'living' => [
			    'en' => [
				    'title' => 'Living',
				    'description' => '',
			    ],
			    'es' => [
				    'title' => 'La Vida',
				    'description' => '',
			    ],
			    'ru' => [
				    'title' => 'Жизнь',
				    'description' => '',
			    ],
		    ],
		    'music' => [
			    'en' => [
				    'title' => 'Music',
				    'description' => '',
			    ],
			    'es' => [
				    'title' => 'La Música',
				    'description' => '',
			    ],
			    'ru' => [
				    'title' => 'Музыка',
				    'description' => '',
			    ],
		    ],
		    'global' => [
			    'en' => [
				    'title' => 'Global',
				    'description' => '',
			    ],
			    'es' => [
				    'title' => 'Lo general',
				    'description' => '',
			    ],
			    'ru' => [
				    'title' => 'Общее',
				    'description' => '',
			    ],
		    ],
		    'undefined' => [
			    'en' => [
				    'title' => 'Undefined',
				    'description' => '',
			    ],
			    'es' => [
				    'title' => 'Indefinido',
				    'description' => '',
			    ],
			    'ru' => [
				    'title' => 'Не определено',
				    'description' => '',
			    ],
		    ],
	    ];

    }
}
