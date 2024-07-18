<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function listUser()
    {
        $listUser = DB::table("users")
            ->join('phongban', 'users.phongban_id', '=', 'phongban.id')
            ->select('users.id', 'users.name', 'users.email', 'users.tuoi', 'phongban.ten_donvi')->get();
        return view("users/list-user", ['listUser' => $listUser]);
    }

    public function addUser()
    {
        $phongban = DB::table("phongban")->select("id", "ten_donvi")->get();
        return view('users/add-user', ['phongban' => $phongban]);
    }

    public function handlerSubmitForm(Request $request)
    {
        // if (isset($_POST['btnSubmit'])) 

        $newUser = [
            'name' => $request->name,
            'email' => $request->email,
            'phongban_id' => $request->phongban_id,
            'tuoi' => $request->tuoi,
            'created_at' => Carbon::now()
        ];

        DB::table("users")->insert($newUser);

        // }

        return redirect()->route('users.listUser');

    }

    public function handlerUpdateUser(Request $request)
    {
        $id = $request->id;

        $user = DB::table("users")
            ->join('phongban', 'users.phongban_id', '=', 'phongban.id')
            ->where('users.id', '=', $id)
            ->select('users.id', 'users.name', 'users.email', 'users.tuoi', 'phongban.ten_donvi', 'phongban.id as pb_id')->first();

        $phongban = DB::table("phongban")->select("id", "ten_donvi")->get();

        return view("users/edit-user", ['user' => $user, 'phongban' => $phongban]);
    }

    public function handlerUpdate(Request $request)
    {
        $id = $request->id;
        $dataUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'phongban_id' => $request->phongban_id,
            'tuoi' => $request->tuoi,
            'updated_at' => Carbon::now(),
        ];

        DB::table("users")->where('id', '=', $id)->update($dataUpdate);

        return redirect()->route('users.listUser');
    }

    public function handlerDeleteUser(Request $request)
    {
        $id = $request->id;
        DB::table("users")->where('id', '=', $id)->delete();
        return redirect()->route('users.listUser');
    }

    public function test() {
        return view('admin.products.list-product', []);
    }
}
