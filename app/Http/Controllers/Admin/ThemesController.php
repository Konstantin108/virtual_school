<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateThemeRequest;
use App\Models\Theme;
use Illuminate\Http\Request;

class ThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::select()->get();
        return view('admin.themes', [
            'themes' => $themes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-theme');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateThemeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateThemeRequest $request)
    {
        $data = $request->only([
            'title',
            'text'
        ]);
        $theme = Theme::create($data);
        if ($theme) {
            return redirect()->route('admin.themes.index')
                ->with('success', __('messages.admin.themes.create.success'));
        }
        return back()
            ->with('error', __('messages.admin.themes.create.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return '<h1>edit</h1>';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
