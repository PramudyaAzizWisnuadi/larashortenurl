<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function index()
    {
        return view('p');
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url'
        ]);

        $shortCode = Str::random(6);
        Link::create([
            'original_url' => $request->original_url,
            'short_code' => $shortCode
        ]);

        return view('p', ['shortCode' => $shortCode]);
        // return view('welcome');
    }

    public function redirect($shortCode)
    {
        $link = Link::where('short_code', $shortCode)->firstOrFail();
        return redirect($link->original_url);
    }
}
