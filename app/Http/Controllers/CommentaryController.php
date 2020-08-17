<?php

namespace App\Http\Controllers;

use App\Models\Commentary;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentaryController extends Controller
{
    public function index(Profile $profile)
    {

    }

    public function create(Profile $profile)
    {
        return view('comment.create', compact('profile'));
    }

    public function store(Request $request, Profile $profile)
    {
        $data = $this->getData($request);
        $profile->comments()->create($data);
        return redirect(route('profile', $profile));
    }

    private function getData(Request $request)
    {
        $data = $request->all();
        $data['author_id'] = auth()->user()->id;
        return $this->validator($data)->validate();
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'content' => ['nullable', 'string', 'max:255'],
            'mark' => ['numeric', 'min:1', 'max:5', 'required'],
            'author_id' => ['numeric', 'min:1'],
        ]);
    }
}
