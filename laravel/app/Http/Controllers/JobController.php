<?php

namespace App\Http\Controllers;

use App\User;
use App\Job;
use App\Offer;
use App\Message;
use App\Matching;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')->paginate(15);
        $tags = Tag::withCount('jobs')->orderBy('jobs_count', 'desc')->take(10)->get();

        return view('job.index', [
            'jobs' => $jobs,
            'tags' => $tags,
        ]);
    }

    public function show($id)
    {
        $job = Job::where('id', $id)->first();
        return view('job.show', [
            'job' => $job,
        ]);
    }

    public function new()
    {
        $allTagNames = Tag::all()->map(function($tag) {
            return ['text' => $tag->name];
        });

        return view('job.new' , [
            'allTagNames' => $allTagNames,
        ]);
    }
    
    public function create(JobRequest $request)
    {
        $user = Auth::user();
        $job = Job::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'user_id' => $request->user()->id
        ]);

        $request->tags->each(function ($tagName) use ($job) {
            $tag = Tag::firstOrCreate([
                'name' => $tagName,
            ]);
            $job->tags()->attach($tag);
        });
        $request->session()->flash('flash_message', 'テーマを投稿しました');
        return redirect()->route('job.index');
    }

    public function edit($id)
    {
        $job = Job::find($id);
        // JobPolicyでアクセス制限
        $this->authorize('update', $job);
        $tagNames = $job->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });
        return view('job.edit', [
            'job' => $job,
            'tagNames' => $tagNames,
        ]);
    }

    public function update(JobRequest $request, $id)
    {
        $job = Job::find($id);
        // JobPolicyでアクセス制限
        $this->authorize('update', $job);
        $job->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'user_id' => $request->user()->id,
        ]);

        $job->tags()->detach();
        $request->tags->each(function ($tagNames) use ($job) {
            $tag = Tag::firstOrCreate([
                'name' => $tagNames,
            ]);
            $job->tags()->attach($tag);
        });

        return redirect()->route('job.show', [
            'id' => $job->id,
        ])->with('flash_message', 'テーマを編集しました！');  ;
    }

    public function delete($id)
    {
        $job = Job::find($id);
        // JobPolicyでアクセス制限
        $this->authorize('delete', $job);
        $job->delete();

        return redirect()->route('mypage.job',['id' => $job->id])->with('flash_message', 'テーマを削除しました');
    }
}
