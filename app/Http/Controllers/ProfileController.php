<?php

namespace App\Http\Controllers;

use App\Dto\CommentDto;
use App\Dto\ProductInfoDto;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function show(Profile $profile)
    {
        $comments = $this->getComments($profile);
        return view('profile.show', compact('profile', 'comments'));
    }

    public function edit(Profile $profile)
    {
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $data = $this->validator($request->all())->validate();

        $file = $request->file('image_path');
        $image_path = $this->storeImg($file);
        $data['image_path'] = $image_path;

        $profile->update($data);
        return redirect(route('profile', $profile));
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'description' => ['string', 'max:255', 'nullable'],
            'phone' => ['string', 'max:50', 'nullable'],
            'image_path' => ['image', 'nullable'],
        ]);
    }

    private function storeImg($file)
    {
        $originalName = $file->getClientOriginalName();
        $name = hash('md5', $originalName);
        $extension = pathinfo($originalName)['extension'];
        $fullName = "$name.$extension";
        $path = public_path()."/storage/images/profile/";
        $file->move($path, $fullName);
        return $fullName;
    }

    private function getComments(Profile $profile)
    {
        $result = array();
        foreach ($profile->comments as $comment)
        {
            $commentDto = new CommentDto($comment);
            array_push($result, $commentDto);
        }
        return array_reverse($result);
    }
}
