<?php

class CampaignsController extends BaseController {

	/**
	 * Campaign Repository
	 *
	 * @var Campaign
	 */
	protected $campaign;

	public function __construct(Campaign $campaign)
	{
		$this->campaign = $campaign;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$campaigns = $this->campaign->all();

		return View::make('campaigns.index', compact('campaigns'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('campaigns.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Campaign::$rules);

		if ($validation->passes())
		{
			$this->campaign->create($input);

			return Redirect::route('campaigns.index');
		}

		return Redirect::route('campaigns.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$campaign = $this->campaign->findOrFail($id);

		return View::make('campaigns.show', compact('campaign'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$campaign = $this->campaign->find($id);

		if (is_null($campaign))
		{
			return Redirect::route('campaigns.index');
		}

		return View::make('campaigns.edit', compact('campaign'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Campaign::$rules);

		if ($validation->passes())
		{
			$campaign = $this->campaign->find($id);
			$campaign->update($input);

			return Redirect::route('campaigns.show', $id);
		}

		return Redirect::route('campaigns.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->campaign->find($id)->delete();

		return Redirect::route('campaigns.index');
	}

}
