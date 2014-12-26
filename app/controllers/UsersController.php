<?php

use \Illuminate\Support\Facades\Hash as Hash;
class UsersController extends BaseController {

	/**
	 * User Repository
	 *
	 * @var User
	 */
	protected $user;

	public function __construct(Users $user)
	{
		$this->user = $user;
	}
    public function login()
    {
        $user = new Users;
        $user->email =  Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        //dd(Input::all());
        if (Auth::attempt(array('email' => Input::get('email'), 'password' =>Input::get('password')))){
            echo "Login Success";
            //return Redirect::intended('dashboard')->with('message','Welcome back, '.$this->user->fisrt_name." ".$this->user->last_name);
        }else{
            echo "Login Failed";
        }


        //$password = Hash::make('secret');
      //  return View::make('users.login');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->user->all();

		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Users::$rules);
		if ($validation->passes())
		{
            $user = new Users;
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->remember_token = str_random(60);

            $redis = new Redis();

            $redis->set('email', json_encode($data));
            $name = $redis->get('email');
            echo $name;
            $job->delete();
            if($user->save()){
                Event::fire('user.register', array($user));
            }
            echo "Register successfully!";
            return Redirect::intended('dashboard')
                ->with('message',"Register successfully!");

		}else{
            echo "Register failed!";
            return Redirect::route('users/login')
                ->with('message',"Login Failed. Please try again.");
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = $this->user->findOrFail($id);

		return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->user->find($id);

		if (is_null($user))
		{
			return Redirect::route('users.index');
		}

		return View::make('users.edit', compact('user'));
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
		$validation = Validator::make($input, User::$rules);

		if ($validation->passes())
		{
			$user = $this->user->find($id);
			$user->update($input);

			return Redirect::route('users.show', $id);
		}

		return Redirect::route('users.edit', $id)
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
		$this->user->find($id)->delete();

		return Redirect::route('users.index');
	}
}
