<?php

namespace App\Http\Controllers;

use App\Forms\VideoForm;
use App\Video;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:play-video', ['only' => ['show']]);
        $this->middleware('permission:add-edit-video', ['only' => ['create','store','edit','update']]);
        $this->middleware('permission:delete-video', ['only' => ['destroy']]);
    }

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
     * Show the profile for the given user.
     *
     * @param  Video  $video
     * @return Response
     */
    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
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
        //Todo: Confirm Video Type allowed
        $this->validate($request, [
            'title' => 'required',
            'file' => 'required | mimetypes:video/x-m4v'
        ]);
        $file = $request->file('file')->store('public');


        $video = new Video;
        $video->file = $file;
        $video->title = $request->get('title');

        //Todo: This could be remove
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
        //Todo: Confirm Video Type allowed
        $this->validate($request, [
            'title' => 'required',
            'file' => 'mimetypes:video/x-m4v'
        ]);

        if($request->hasFile('file')) {
            $video->file = $request->file('file')->store('public');
        }
        $video->title = $request->get('title');

        //Todo: This could be remove
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
