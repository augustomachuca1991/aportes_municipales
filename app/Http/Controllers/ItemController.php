<?php

namespace App\Http\Controllers;

use App\Http\Requests\Item\AddRequest;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    
    public function store(AddRequest $request)
    {
        $item = $request->item;
        $item['dni']= $request->item['cuil']['middle'];
        return $item;
    }
}
