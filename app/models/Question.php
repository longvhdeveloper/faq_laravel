<?php
/**
 * Created by PhpStorm.
 * User: longvo
 * Date: 3/16/15
 * Time: 7:39 PM
 */

class Question extends Eloquent
{
    protected $fillable = array('title', 'content', 'view', 'vote', 'user_id', 'cate_id');

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('Category', 'cate_id');
    }

    public function tags()
    {
        return $this->belongsToMany('Tag', 'questions_tags')->withTimestamps();
    }


} 