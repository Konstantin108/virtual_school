<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('index')->with('themes', Theme::query()->orderByDesc('created_at')->paginate(6));
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $theme = Theme::findOrFail($id);
        return view('theme', ['theme' => $theme]);
    }

    public function randomThemes()
    {
        return view('home')->with('themes', Theme::query()->inRandomOrder()->take(3)->get());
    }

}
