<?php namespace App\Controllers;


class test extends BaseController
{
	public function index()
	{
		return $this->viewPerser();
	}
	public function view()
	{
		$data = [
	        'title'   => 'My title',
	        'heading' => 'My Heading',
	        'message' => 'My Message'
		];
		return view('home_view', $data);
	}

	public function viewPerser()
	{
		$parser = \Config\Services::parser();
		$data = [
	        'title'   => 'My title',
	        'heading' => 'My Heading',
	        'message' => 'My Message',
	        'entries' => [
                ['name' => 'Title 1', 'body' => 'Body 1'],
                ['name' => 'Title 2', 'body' => 'Body 2'],
                ['name' => 'Title 3', 'body' => 'Body 3'],
                ['name' => 'Title 4', 'body' => 'Body 4'],
                ['name' => 'Title 5', 'body' => 'Body 5']
            ],
            'status' => true,
	        'number' => '01832816748'
		];
		$parser->setData($data);
		return $parser->render('home_view');
	}
	
}
