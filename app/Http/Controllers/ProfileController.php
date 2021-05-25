<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return (view('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $userinfo = User::find($id);
      if(empty($request->profileAvatarCropp)){
        if(!empty($request->name)){
          $request->validate([
              'name' => 'string|max:255',
          ]);
          $userinfo->name = $request->name;
        }
        elseif(!empty($request->email)){
          $request->validate([
              'email' => 'string|email|max:255|unique:users',
          ]);
          $userinfo->email = $request->email;
        }
        $userinfo->birth_date = "2011-11-12";
        $userinfo->save();
        return ;
        // dd(gettype($request->birthDate))
      }
      else{
        $cropper = json_decode($request->profileAvatarCropp);
        $userinfo->avatar_original = $request->file('profileAvatarInput')->store("avatars_original", 'public');
        $userinfo->avatar = $request->file('profileAvatarInput')->store("avatars", 'public');
        Image::make(Storage::disk('public')->path($userinfo->avatar))->crop($cropper->width, $cropper->height, $cropper->x, $cropper->y)->save();
        $userinfo->avatar_original = "storage/". $userinfo->avatar_original;
        $userinfo->avatar = "storage/". $userinfo->avatar;
      }
      $userinfo->save();

      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
