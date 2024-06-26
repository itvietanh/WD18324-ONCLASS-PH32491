<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Termwind\render;

class ProductController extends Controller
{
    //
    public function listProduct() {  
        $products = [
            [
                'id' => 1,
                'name' => 'IPHONE 1',
                'birthday' => '2004',
                'mssv' => 'PH32491'
            ],
        ];
        return view('list-product', ['products' => $products]);                                                                                                                                             
    }

    public function findOne($id) {
        echo $id;
    }

    public function updateProduct(Request $request) {
        echo $request -> id;
    }
}
