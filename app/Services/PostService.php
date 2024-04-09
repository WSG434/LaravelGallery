<?php

namespace App\Services;

use App\Exceptions\EmptyFileUploadException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function all()
    {
        $posts= DB::table('images')
            ->select('*')
            ->get();
        return $posts->all();
    }

    public function one($id)
    {
        return DB::table('images')
            ->select('*')
            ->where('id', $id)->first();
    }

    public function delete($id)
    {
        $post = self::one($id);
        Storage::delete($post->image);

        DB::table('images')->where('id', '=', $id)->delete();
    }

    public function add($file)
    {
        if (is_null($file)) {
            throw new EmptyFileUploadException();
        }

        $filename = $file->store('images');
        DB::table('images')->insert([
            'image' => $filename
        ]);
        return $filename;
    }

    public function update($id, $file)
    {
        Storage::delete(self::one($id)->image);
        DB::table('images')
            ->where('id', $id)
            ->update(['image' => $file->store('images')]);
    }

}
