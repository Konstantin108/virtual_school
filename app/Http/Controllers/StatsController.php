<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;

class StatsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function stats()
    {
        $id = Auth::user()->id;
        $name = Auth::user()->name;
        $count = Theme::select()->count();
        $rate = Rate::where([
            ['user_id', $id]
        ])
            ->count();

        $allRate = Rate::all()->push();

        $themeNames = [];
        $ratingOnUserId = Rate::all()
            ->where('user_id', $id);
        foreach ($ratingOnUserId as $item) {
            $themeNames[] = $item->theme_completed_id;
        }

        return view('stats', [
            'count' => $count,
            'rate' => $rate,
            'name' => $name,
            'themeNames' => $themeNames,
            'allRate' => $allRate
        ])
            ->with('themes', Theme::query()
                ->get());
    }
}
