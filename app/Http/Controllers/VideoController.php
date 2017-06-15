<?php

namespace App\Http\Controllers;

use App\Forms\VideoForm;
use App\Video;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Todo: Paginate Videos
        $videos = Video::all();
        return view('videos.index', compact('videos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(VideoForm::class, [
            'method' => 'POST',
            'url' => route('videos.store')
        ]);

        return view('videos.form', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Todo: Add Validation
        $video = new Video;

        if ($request->hasFile('file')) {
            $video->file = $request->file('file')->store('video-files');
        }
        $video->title = $request->get('title');

        $video->updateFileInfo();
        $video->save();

        return redirect(route('videos.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Video $video
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(VideoForm::class, [
            'method' => 'PUT',
            'url' => route('videos.update', $video->id),
            'model' => $video
        ]);

        return view('videos.form', compact('form', 'video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Video $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //Todo: Add Validation

        if ($request->hasFile('file')) {
            $video->file = $request->file('file')->store('video-files');
        }
        $video->title = $request->get('title');

        $video->updateFileInfo();
        $video->save();

        return redirect(route('videos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Video $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
        $video->delete();
        return redirect(route('videos.index'));
    }
}
