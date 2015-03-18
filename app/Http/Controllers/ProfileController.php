<?php namespace moschi\Http\Controllers;

use moschi\User;
use moschi\Http\Requests;
use moschi\Http\Controllers\Controller;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use Redirect;
use Input;

class ProfileController extends Controller {

	protected $auth;

	public function __construct(Guard $auth){
		$this->auth = $auth;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(User $user)
	{
		if ( is_null($user) ) {
			return abort(404);
		}
		return view('profile.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return "show $id";
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(User $user)
	{
		if ($user) {
			return view('profile.edit', compact('user'));
		}

		return abort(404);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(User $user)
	{
		$input = array_except(Input::all(), ['_method', '_token']);
		$user = $user->update($input);
		if ($user) {
			return Redirect::route('user.index');
		}
		return Redirect::route('user.edit')->withInput()->withErrors(User::errors());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(User $user)
	{
		$delete = $user->delete();
		if ($delete) {
			return Redirect::to('/');
		}
		return Redirect::route('user.index')->with('message', 'Error to delete user');
	}

}
