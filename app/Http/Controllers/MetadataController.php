<?php

namespace App\Http\Controllers;

use App\Forms\MetadataForm;
use App\Video;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class MetadataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:add-edit-video');
    }

    /**
     * Show the form for editing the Metadata.
     *
     * @param  int $id
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function edit($id, FormBuilder $formBuilder)
    {
        $video = Video::findOrFail($id);
        $form = $formBuilder->create(
            MetadataForm::class, [
            'method' => 'POST',
            'url' => route('videos.metadata.update', $id),
            'model' => $video]
        );

        $formTitle = "Metadata for video: {$video->title}";

        return view('videos.form', compact('form', 'formTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $video = Video::findOrFail($id);
        $video->location_id = $request->get('location');
        $video->tags()->sync($request->get('tags'));
        $video->save();

        return redirect(route('videos.index'));
    }
}
