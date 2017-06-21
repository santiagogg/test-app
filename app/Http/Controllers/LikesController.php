<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function store(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        return $video->like();
    }
}