<?php 

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use App\Article;

class NavigationComposer{
	
	public function __construct(){
		
	}

	public function compose($view){

		$view->with('latest', Article::latest()->first());
	}
}