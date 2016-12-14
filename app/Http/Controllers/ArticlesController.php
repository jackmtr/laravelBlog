<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Auth;
use App\Tag;
//use Illuminate\Http\Request;
//use Carbon\Carbon;



//mainly, a controller is mostly responsible for recieving some request, delegating as needed to get request done, and then returning a response.

//most controller methods are only a couple of lines, as they are delegated elsewhere
class ArticlesController extends Controller
{

    //middleware is like an onion, peel off one layer at a time    
    /**
    * Create a new articles controller instance.
    */
    public function __construct(){
        $this->middleware('auth', ['except' => 'index', 'show']);
    }

    /**
    *
    * Show all articles.
    *
    * @return Response
    *
    */
    public function index(){

    	$articles = Article::latest('published_at')->published()->get();

    	return view('articles.index', compact('articles'));
    }

    /**
    *
    * Create a new article
    *
    */
    public function create(){
        /*
        if (\Auth::guest()){
            return redirect('articles');
        }
        */
        $tags = Tag::pluck('name', 'id');

    	return view('articles.create', compact('tags'));
    }

    /**
    *
    *
    *
    */
    public function store(ArticleRequest $request){
        //dd($request);
        $this->createArticle($request);
        //$article = \Auth::user()->articles()->create($request->all());

        //$this->syncTags($article, $request->input('tag_list'));
        //$article->tags()->attach($request->input('tag_list'));
        
        //\Session::flash('flash_message', 'Your article has been created.');

        //$this->validate($request, ['title' => 'required']); also works
        //do this when doing small validation that doesnt warrent new class

        //$article = new Article($request->all());
        //\Auth::user()->articles()->save($article); //user_id auto applied when entering to articles through the user
        //session flash is temp, session put is permanent
        //\Session::flash('flash_message', 'Your article has been created.');
        //session()->flash('flash_message', 'Your article has been created.');
        //session()->flash('flash_message_important', true);

        //\Flash::success()
        flash()->overlay('Your article has been successfully created', 'Good Job');

        return redirect('articles');

        /*
            return redirect('articles')->with([
                    'flash_message' => 'Your article has been created',
                    'flash_message_important' => true
                ]);
        */
    }

    /**
    *
    * @param Article $article
    * @return Response
    *
    */
    //public function show($id){
    public function show(Article $article){

    	return view('articles.show', compact('article'));
    }

    /**
    *
    *
    *
    *
    */
    //public function edit($id){
    public function edit(Article $article){
        //$article = Article::findOrFail($id);

        $tags = Tag::pluck('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
    }

    /**
    *
    *
    *
    *
    */
    //public function update($id, ArticleRequest $request){
    public function update(Article $article, ArticleRequest $request){    

        //$article = Article::findOrFail($id);

        $article->update($request->all());

        //$article->tags()->sync($request->input('tag_list'));

        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');
    }    


   /**
    *
    * Sync up the list of tags in the database.
    *
    * @param Article $article
    * @param array $tags
    *
    */
    private function syncTags(Article $article, array $tags){

        $article->tags()->sync($tags);
    }

   /**
    *
    * Save a new article.
    *
    * @param ArticleRequest $request
    * @return mixed
    *
    */
    private function createArticle(ArticleRequest $request){

        $article = \Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;        
    }
}
