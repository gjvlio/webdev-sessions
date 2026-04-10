<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index(){
        return "REMOVE USER";
    }

    public function userInputID($id){
        $inputParameter = $id;
        return "The input parameter is: " . $inputParameter;
    }

    public function userInputParam($id, $name){
        $inputParameter = $id;
        return $name . ", ". "the input parameter is: " . $inputParameter; 
    }

    public function userEditIDName($id, $name){
        return "<a href='" . route('userDisplay', [$id, $name]) . "'>Edit User</a>";
    }

    public function userEditID($id){
        return "<a href = '". route('userID', [$id]) . "' > Edit ID Only </a>";
    }
    
    public function userDisplayPic(){
        $imagePath = base_path("resources/images/dog.jpg");
        return response()->file($imagePath);
    }


}

