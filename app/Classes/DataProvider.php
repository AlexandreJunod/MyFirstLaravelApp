<?php

namespace App\Classes;
use Illuminate\Support\Facades\Storage;

class DataProvider
{
    static function getData()
    {
        /*return [
            new Thing(1,"thing 1",3,"bleu"),
            new Thing(2,"thing 2",3,"violet"),
            new Thing(3,"thing 3",4,"rouge"),
            new Thing(4,"thing 3",7,"orange")
        ];*/

        return unserialize(Storage::disk('local')->get('data.txt'));
    }
}
