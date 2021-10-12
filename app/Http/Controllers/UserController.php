<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\User;

class UserController extends Controller{

	public function index(){

		$q = \Input::get('search');

        $result = User::where('username', 'LIKE', '%' . $q . '%')
            ->orWhere('email', 'LIKE', '%' . $q . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        $result->appends(['search' => $q]);

        return view('user.index', compact('result'));
	}

	public function create(){
		return view('user.create');
	}

	public function store(Request $request){
		$rules = [
            'username' => 'required|alpha_dash|unique:users',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {
            $newUser = new User;
            $newUser->username = $request->get("username");
            $newUser->email = $request->get("email");
            $newUser->password = bcrypt($request->get('password'));
            $newUser->save();
            \Session::flash('message', 'Your item has been saved.');
           return redirect()->route('user.index');
        }
	}

	public function show($id){
		$user = User::findOrFail($id);
		return view('user.show', compact('user'));
	}

	public function edit($id){
		$user = User::findOrFail($id);
		return view('user.edit', compact('user'));
	}

	public function update(Request $request, $id){
		$rules = [
            'username' => 'required|alpha_dash|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
        ];
        if ($request->get("password")) {
            $rules["password"] = 'required|string|min:6';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {
            $editUser = User::findOrFail($id);
            $editUser->username = $request->get("username");
            $editUser->email = $request->get("email");
            if ($request->get("password")) {
            	$editUser->password = bcrypt($request->get('password'));
            }
            $editUser->save();
            \Session::flash('message', 'Your item has been updated.');
            return redirect()->route('user.index');
        }
	}

	public function destroy($id){
		User::findOrFail($id)->delete();
        \Session::flash('message', 'Your item has been deleted.');
		return redirect()->route('user.index');
	}

}