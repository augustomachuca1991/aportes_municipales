<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organismo;
use Illuminate\Http\Request;

class OrganismoController extends Controller
{
    public function index()
    {
        return view('admin.organismo.index');
    }


    public function getOrganismos()
    {
        return Organismo::with('jurisdiccion')->paginate(10);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'organismo' => 'required|max:50',
        ]);
        $organismo = Organismo::find($id);
        $organismo->organismo = $request->organismo;
        $organismo->save();
        return $organismo->with(['jurisdiccion'])->first();
    }
}
