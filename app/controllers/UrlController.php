<?php

class UrlController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /url
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('home.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /url/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /url
	 *
	 * @return Response
	 */
	public function store()
	{
		/* Lets Declare Helpers Vars */
		$url = Input::get('url');
		$record = Url::where('url', '=', $url)->first();

		/* Run data trough validation */
		$validation = Url::validate( array('url' => $url) );
		if($validation !== true) return Redirect::route('home.index')->withErrors($validation->messages()->toArray());

		/* Check if url is been already shortened */
		if( $record ) return View::make('home.result')->with('shortened', $record->shortened);

		/* Create unique url */
		$row = Url::create(array('url' => $url,'shortened' => Url::get_unique_short_url()));

		/* Row correctly inserted */
		if( $row ) return View::make('home.result')->with('shortened', $row->shortened);

		/* Else if Query not successful redirect to home page */
		return View::make('home.error');
	}

	/**
	 * Display the specified resource.
	 * GET /url/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /url/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /url/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /url/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}