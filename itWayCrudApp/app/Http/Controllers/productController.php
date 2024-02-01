<?php

namespace App\Http\Controllers;

use App\Models\category;;

use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function  addCategoryPage()
    {
        return view('product.addCategory');
    }
    public function  addProductPage()
    {
        $category = category::all();

        return view('product.addProduct', compact('category'));
    }
    public function  displayProductPage()
    {

        $product = product::all();


        return view('product.displayProduct', compact('product'));
    }

    public function addNewCatagory(Request $request)
    {


        $request->validate([
            'catagoryName' => 'required',

        ]);
        category::create(
            [
                'catagoryName' => $request->input('catagoryName')
            ]
        );

        return redirect()->back();
    }

    public function addNewProduct(Request $request)
    {


        $request->validate([
            'productName' => 'required',
            'catagory' => 'required',
            'shortDetails' => 'required',
            'longDetails' => 'required',
            'productImg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'productPrice' => 'required',
            'productQuantity' => 'required',
        ]);
        if ($request->hasFile('productImg')) {
            $image = $request->file('productImg');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('public/product_images', $imageName);
        } else {
            $imageName = null;
        }
        product::create([
            'productName' => $request->input('productName'),
            'catagory' => $request->input('catagory'),
            'shortDetails' => $request->input('shortDetails'),
            'longDetails' => $request->input('longDetails'),
            'productImg' => $imageName,
            'productPrice' => $request->input('productPrice'),
            'productQuantity' => $request->input('productQuantity'),
        ]);

        return redirect()->back();
    }
}
