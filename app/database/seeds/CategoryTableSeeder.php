<?php
class CategoryTableSeeder extends Seeder
{
	public function run()
	{
		$categories = [
			['title' => 'PHP basic'],
			['title' => 'PHP advanced'],
			['title' => 'Laravel Framework'],
			['title' => 'Zend Framework']
		];
		
		DB::table('categories')->insert($categories);
	}
}

?>