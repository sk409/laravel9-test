<?php

namespace App\Http\Controllers;

use App\Models\Cat;

class CatController extends Controller
{
    public function index(): string
    {
        $cat = Cat::all()->first();
        $cat->name = "bbb";
        $cat->owner->setName("SSS");
        $cat->owner->setAge(120);
        $cat->save();
        return json_encode($cat);
    }
}
