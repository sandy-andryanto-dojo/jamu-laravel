<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Category;
use App\Brand;

class ProductController extends Controller{

	public function index(){
		$q = \Input::get('search');
		$result = Product::where('products.code', 'LIKE', '%' . $q . '%')
			->orWhere('products.name', 'LIKE', '%' . $q . '%')
			->orWhere('products.price', 'LIKE', '%' . $q . '%')
			->orWhere('products.expired', 'LIKE', '%' . $q . '%')
			->orWhere('brands.name', 'LIKE', '%' . $q . '%')
			->orderBy('products.id', 'desc')
			->join('brands', function($join) {
            	$join->on('products.brand_id', '=', 'brands.id');
        	})
			->paginate(10);

		$result->appends(['search' => $q]);
    	return view('product.index', compact('result'));
	}

	public function create(){
		$data = array(
			"brand"=>Brand::all(),
			"category"=>Category::all()
		);
		return view('product.create',$data);
	}

	public function store(Request $request){
		$newData = Product::create([
			"code"=>$request->get('code'),
			"name"=>$request->get('name'),
			"price"=>$request->get('price'),
			"expired"=>$request->get('expired'),
			"brand_id"=>$request->get('brand_id'),
		]);
		$image = $request->file('file');
		if($image){
			 $imageName = time().'.'.$image->getClientOriginalExtension();
	 		 $destinationPath = public_path('/uploads');
		 	 $image->move($destinationPath, $imageName);
		 	 $product = Product::findOrFail($newData->id);
		 	 $product->photos =  $imageName;
		 	 $product->save();
		}

		if($request->get("category")){
			$product->categories()->sync($request->get("category"));
		}
		\Session::flash('message', 'Your item has been saved.');
		return redirect()->route('product.index');
		
	}

	public function show($id){
		$product = Product::findOrFail($id);
		return view('product.show', compact('product'));
	}

	public function edit($id){
		$data  = array(
			"product"=>Product::findOrFail($id),
			"category"=>Category::all(),
			"brand"=>Brand::all(),
		);
		return view('product.edit', $data);
	}

	public function update(Request $request, $id){
		$product = Product::findOrFail($id);
		$product->name = $request->get('name');
		$product->price = $request->get('price');
		$product->expired = $request->get('expired');
		$product->brand_id = $request->get('brand_id');
		$product->save();

		if($request->get("category")){
			$product->categories()->sync($request->get("category"));
		}

		\Session::flash('message', 'Your item has been updated.');
		return redirect()->route('product.index');
	}

	public function destroy($id){
		Product::findOrFail($id)->delete();
		\Session::flash('message', 'Your item has been deleted.');
		return redirect()->route('product.index');
	}

}