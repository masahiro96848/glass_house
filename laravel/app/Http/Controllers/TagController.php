<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index($name)
    {
        $tag = Tag::where('name', $name)->first();
        $tag_jobs = Tag::withCount('jobs')->orderBy('jobs_count', 'desc')->take(10)->get();

        return view('tag.index', [
            'tag' => $tag,
            'tag_jobs' => $tag_jobs,
        ]);
    }
}
