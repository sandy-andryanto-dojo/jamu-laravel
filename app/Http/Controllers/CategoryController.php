<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Category;

class CategoryController extends Controller{

	public function index(){
		$q = \Input::get('search');
		$result = Category::where('name', 'LIKE', '%' . $q . '%')
			->orWhere('description', 'LIKE', '%' . $q . '%')
			->orderBy('id', 'desc')
			->paginate(10);

		$result->appends(['search' => $q]);

    	return view('category.index', compact('result'));
	}

	public function create(){
		return view('category.create');
	}

	public function store(Request $request){
		Category::create([
			"name"=>$request->get('name'),
			"description"=>$request->get('description')
		]);
		\Session::flash('message', 'Your item has been saved.');
		return redirect()->route('category.index');
	}

	public function show($id){
		$category = Category::findOrFail($id);
		return view('category.show', compact('category'));
	}

	public function edit($id){
		$category = Category::findOrFail($id);
		return view('category.edit', compact('category'));
	}

	public function update(Request $request, $id){
		$category = Category::findOrFail($id);
		$category->name = $request->get('name');
		$category->description = $request->get('description');
		$category->save();
		\Session::flash('message', 'Your item has been updated.');
		return redirect()->route('category.index');
	}

	public function destroy($id){
		Category::findOrFail($id)->delete();
		\Session::flash('message', 'Your item has been deleted.');
		return redirect()->route('category.index');
	}

}