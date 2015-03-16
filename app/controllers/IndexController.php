<?php
class IndexController extends BaseController
{
    public function index()
    {
        return View::make('site.index.index')->with('titlepage', 'Home page');
    }
}