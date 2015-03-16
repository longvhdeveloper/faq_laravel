<?php

class Category extends Eloquent 
{
	protected $fillable = array('title');

    public function questions()
    {
        return $this->hasMany('Question', 'cate_id');
    }
}

?>