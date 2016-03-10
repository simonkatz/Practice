<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Article;

class ArticleTest extends TestCase {
	
use DatabaseTransactions;

	/** @test */
	function fetchesTrendingArticles() {
		factory(Article::class, 2)->create();
		factory(Article::class)->create(['reads' => 10]);
		$most_popular = factory(Article::class)->create(['reads' => 20]);
		
		$articles = Article::trending();

		$this->assertEquals($most_popular->id, $articles->first()->id);
		$this->assertCount(4, $articles);
	}
}