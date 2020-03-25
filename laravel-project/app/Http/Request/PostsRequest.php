<?php


namespace App\Http\Request;


class PostsRequest
{
    public static function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required|min:10'];
    }
}
