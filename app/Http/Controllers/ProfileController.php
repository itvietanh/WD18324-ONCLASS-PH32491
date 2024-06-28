<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function profile() {
        $info = [
            [
                'id' => 1,
                'name' => 'Vũ Việt Anh',
                'address' => 'Hưng Yên',
                'birthday' => '2004',
                'mssv' => 'PH32491'
            ],
        ];
        return view('profile', ['info' => $info]);    
    }
}
