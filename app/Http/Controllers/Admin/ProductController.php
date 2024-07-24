<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function getListProduct() {
        $listProduct = Product::paginate(5);
        return view('admin.products.list-product', ['listProduct' => $listProduct]);
    }

    public function addProduct() {
        return view('admin.products.add-product');
    }

    public function submitProduct(Request $request) {
        $linkImage = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            //rename image
            $renameImage = time() . "." . $image->getClientOriginalExtension();
            //send image to folder imageProducts
            $image->move(public_path("imageProducts/"), $renameImage);
            $linkImage = "imageProducts/" . $renameImage;
        }

        if ($request) {
            $product = new Product;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->view = $request->view;
            $product->description = $request->description;
            $product->image = $linkImage;
            $product->save();
        }
        return redirect()->route('admin.products.listProduct')
        ->with(
            ['message' => 'Thêm mới thành công']
        );
    }

    public function editProduct(Request $request) {
        if ($request) {
            $id = $request->id;
            $product = Product::find($id);
            return view('admin.products.edit-product')->with(['product'=>$product]);
        }
    }

    public function updateProduct(Request $request) {
        $linkImage = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            //rename image
            $renameImage = time() . "." . $image->getClientOriginalExtension();
            //send image to folder imageProducts
            $image->move(public_path("imageProducts/"), $renameImage);
            $linkImage = "imageProducts/" . $renameImage;
        }

        if ($request) {
            $product = Product::find($request->id);
            $product->name = $request->name;
            $product->price = $request->price;
            $product->view = $request->view;
            $product->description = $request->description;
            $product->image = $linkImage;
            $product->save();
        }
        return redirect()->route('admin.products.listProduct');
    }

    public function deleteProduct(Request $request) {
        if ($request) {
            $id = $request->id;
            $product = Product::find($id);
            if ($product->image) {
                File::delete(public_path($product->image));
            }
            $product->delete();
            return redirect()->route('admin.products.listProduct')->with(['message'=>'Delete successfully!']);
        }
    }
}
