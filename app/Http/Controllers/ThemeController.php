<?php

namespace App\Http\Controllers;

use App\Enums\ThemeStatusEnum;
use App\Models\Rate;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ThemeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        Session::forget('redirectToCompleted.value');
        Session::forget('redirectToHome.value');
        $ratingItems = [];
        $count = Theme::select()
            ->where('status', ThemeStatusEnum::PUBLISHED)
            ->count();
        if (Auth::user()) {
            $userId = Auth::user()->id;
            $ratingOnUserId = Rate::all()
                ->where('user_id', $userId);
            foreach ($ratingOnUserId as $item) {
                $ratingItems[] = $item->theme_completed_id;
            }
        }
        return view('index', [
            'ratingItems' => $ratingItems,
            'count' => $count
        ])
            ->with('themes', Theme::query()
                ->where('status', ThemeStatusEnum::PUBLISHED)
                ->orderByDesc('created_at')
                ->get());
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function completedThemes()
    {
        Session::forget('redirectToCompleted.value');
        Session::forget('redirectToHome.value');
        Session::push('redirectToCompleted.value', 'data');
        $completedItems = [];
        if (Auth::user()) {
            $userId = Auth::user()->id;
            $ratingOnUserId = Rate::all()->where('user_id', $userId);
            foreach ($ratingOnUserId as $item) {
                $completedItems[] = $item->theme_completed_id;
            }
        }

        return view('completedThemes', [
            'completedItems' => $completedItems
        ])
            ->with('themes', Theme::query()
                ->where('status', ThemeStatusEnum::PUBLISHED)
                ->orderByDesc('created_at')
                ->get());
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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function randomThemes()
    {
        Session::forget('redirectToCompleted.value');
        Session::forget('redirectToHome.value');
        Session::push('redirectToHome.value', 'data');
        $homeItems = [];
        if (Auth::user()) {
            $userId = Auth::user()->id;
            $ratingOnUserId = Rate::all()->where('user_id', $userId);
            foreach ($ratingOnUserId as $item) {
                $homeItems[] = $item->theme_completed_id;
            }
        }
        return view('home', [
            'homeItems' => $homeItems
        ])
            ->with('themes', Theme::query()
                ->where('status', ThemeStatusEnum::PUBLISHED)
                ->inRandomOrder()
                ->take(3)->get());
    }
}
