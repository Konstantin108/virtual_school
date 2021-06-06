<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\User;

class RatingController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function rating()
    {
        $count = Theme::select()->count();
        return view('rating', [
            'count' => $count
        ])->with('users', User::query()
            ->orderByDesc('rating')
            ->get());
    }
}
