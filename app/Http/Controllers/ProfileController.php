<?php namespace moschi\Http\Controllers;

use moschi\User;
use moschi\Products;
use moschi\Http\Requests;
use moschi\Http\Controllers\Controller;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use Redirect;
use Input;
use Auth;

class ProfileController extends Controller {

	protected $auth;

	public function __construct(Guard $auth){
		$this->middleware('auth');
		$this->auth = $auth;
		$this->id = Auth::user()->id;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Products::where('user_id', $this->id)->latest()->get();
		return view('profile.index', compact('products'));
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
	public function show(User $user)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(User $user)
	{
		return view('profile.edit', compact('user'));
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
		return Redirect::route('user.index')->withErrors(User::errors());
	}

}
