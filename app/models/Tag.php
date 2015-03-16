<?php
/**
 * Created by PhpStorm.
 * User: longvo
 * Date: 3/16/15
 * Time: 7:51 PM
 */

class Tag extends Eloquent
{
    protected $fillable = array('tag', 'alias');

    public function questions()
    {
        return $this->belongsToMany('Question', 'question_tag')->withTimestamps();
    }
} 