<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $ratingItems = [];
        if (Auth::user()) {
            $userId = Auth::user()->id;
            $ratingOnUserId = Rate::all()->where('user_id', $userId);
            foreach ($ratingOnUserId as $item) {
                $ratingItems[] = $item->theme_completed_id;
            }
        }
        return view('index', [
            'ratingItems' => $ratingItems
        ])
            ->with('themes', Theme::query()
                ->orderByDesc('created_at')
                ->paginate(6));
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
        return view('home')
            ->with('themes', Theme::query()
                ->inRandomOrder()
                ->take(3)->get());
    }
}
