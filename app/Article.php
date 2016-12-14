<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    //allows for mass assignement
    protected $fillable = [
	    'title', 
	    'body',
	    'published_at',
    ]; //Article::create($array) will only allow changes to whats above

    //allows more columns to be a carbon instances
    protected $dates = ['published_at'];
    //allows for more columns to be interactd as carbon instances
    //$article->published_at->format('Y-m')
    //carbon instances are objects, which allows for more interactions than strings

    //query scope
    public function scopePublished($query){
    	$query->where('published_at', '<=', Carbon::now());
    }
    //allows us to assign names to WHERE clauses
    //typically used if we make the same where clause constantly in app
    //Article::published()
    //if want parameter, Article::published($value) => scopePublished($query, $value)

    //mutator (can also do similar for accessor)
    //naming convention is set - name of attribute - Attribute
    public function setPublishedAtAttribute($date)
    {
    	$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);

    }

    public function getPublishedAtAttribute($date){

        return new Carbon($date);
    }

    /**
    *
    * An article is owned by a user.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    *
    */
    public function user(){
        //this is a has many relationship
        return $this->belongsTo('App\User');
    } //$article->user


    /**
    *
    * Get the tags associated with the given article.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    *
    */
    public function tags(){

        return $this->belongsToMany('App\Tag')->withTimeStamps();
    }

    /**
    *
    * Get a list of tag ids associated with current article
    *
    * @return array
    */
    public function getTagListAttribute(){

        return $this->tags->pluck('id')->toArray();
    }    
}
