<?php

namespace App\Http\Controllers;

use App\Classes\DataProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {
        $things = DataProvider::getData();
        Storage::disk('local')->put('data.txt', serialize($things));
        return view('admin')->with('things', $things);
    }

    public function hide($id)
    {
        $things = DataProvider::getData();
        foreach($things as $key=>$thing)
        {
            if($thing->getId() == $id)
            {
                unset($things[$key]);
                Storage::disk('local')->put('data.txt', serialize($things));
                return view('admin')->with('things', $things);
            }
        }
    }

    /*public function edit($personId, $newname) {
        $values = ['personId' => $personId, 'newname' => $newname];
        return view('admin', $values);
        //return view('admin')->with('values', $values);
    }*/
}
