<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index($name)
    {
        $tag = Tag::where('name', $name)->first();

        return view('tag.index', [
            'tag' => $tag,
        ]);
    }
}
