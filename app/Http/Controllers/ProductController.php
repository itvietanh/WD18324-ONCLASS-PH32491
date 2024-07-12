<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use function Laravel\Prompts\table;
use function Termwind\render;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getListProduct(Request $request)
    {
        if ($request -> kyw) {
            $query = $request->kyw;

            $products = DB::table('product')
                ->join('category', 'product.category_id', '=', 'category.id')
                ->select('product.id', 'product.name', 'category.name as catName', 'product.price', 'product.view')
                ->where('product.name', 'LIKE', "%{$query}%")
                ->get();

            return view('list-product', ['products' => $products]);
        }

        $products = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->select('product.id', 'product.name', 'category.name as catName', 'product.price', 'product.view')
            ->orderBy('product.view', 'asc')
            ->get();
        return view('list-product', ['products' => $products]);
    }

    public function addProduct(Request $request)
    {


        $danhMuc = DB::table('category')->get();
        return view('add-product', ["danhMuc" => $danhMuc]);
    }

    public function submitProduct(Request $request)
    {
        $newProduct = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'view' => $request->view
        ];

        DB::table("product")->insert($newProduct);
        return redirect()->route('products.listProduct');
    }

    public function handlerDeleteProduct(Request $request)
    {
        DB::table('product')->where('id', '=', $request->id)->delete();
        return redirect()->route('products.listProduct');
    }

    public function handlerUpdateProduct(Request $request)
    {
        $id = $request->id;

        $product = DB::table("product")
            ->join('category', 'product.category_id', '=', 'category.id')
            ->where('product.id', '=', $id)
            ->select('product.id', 'product.name', 'category.name as catName', 'product.price', 'product.view')->first();

            $danhMuc = DB::table('category')->get();


        return view("edit-product", ['product' => $product, 'danhMuc' => $danhMuc]);
    }

    public function handlerUpdate(Request $request)
    {
        $id = $request->id;
        $dataUpdate = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'view' => $request->view,
            'update_at' => Carbon::now()
        ];

        DB::table("product")->where('id', '=', $id)->update($dataUpdate);

        return redirect()->route('products.listProduct');

    }

}
