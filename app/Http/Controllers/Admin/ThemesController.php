<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateThemeRequest;
use App\Http\Requests\EditThemeRequest;
use App\Models\Quest;
use App\Models\Theme;

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
        $count = Theme::select()->count();
        $questions = Quest::all()->push();
        return view('admin.themes', [
            'themes' => $themes,
            'count' => $count,
            'questions' => $questions
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateThemeRequest $request)
    {
        $data = $request->only([
            'title',
            'text',
            'status'
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
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\EditThemeRequest $request
     * @param Theme $theme
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditThemeRequest $request, Theme $theme)
    {
        $data = $request->validated();
        $theme = $theme->fill($data);
        if ($theme->save()) {
            return redirect()->route('admin.themes.index')
                ->with('success', __('messages.admin.themes.update.success'));
        }
        return back()
            ->with('error', __('messages.admin.themes.update.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param Theme $theme
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        $questions = Quest::all()->push();
        return view('admin.show-del-window', [
            'theme' => $theme,
            'questions' => $questions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Theme $theme
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        $questions = Quest::all()->push();
        return view('admin.edit-theme', [
            'theme' => $theme,
            'questions' => $questions
        ]);
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

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteTheme($id)
    {
        $theme = Theme::findOrFail($id);
        $theme->delete();
        if ($theme) {
            return redirect()->route('admin.themes.index')
                ->with('success', __('messages.admin.themes.delete.success'));
        }
        return back()
            ->with('error', __('messages.admin.themes.delete.fail'));
    }
}
