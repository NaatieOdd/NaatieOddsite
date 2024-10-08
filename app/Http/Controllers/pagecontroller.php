<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pagecontroller extends Controller
{
    public function personal()
    {
        $user = auth()->user();
        $schematics= $user->schematics()->get();

        return view('pages.personal', ['schematics' => $schematics]);
    }
    public function about()
    {
        return view('pages.about');
    }

    public  function contact()
    {
        return view('pages.contact');
    }
}
