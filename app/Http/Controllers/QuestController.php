<?php

namespace App\Http\Controllers;

use App\Models\Quest;

class QuestController extends Controller
{
    protected $questNumber = 1;
    protected $score = 0;

    /**
     * @param int $themeId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getQuest(int $themeId)
    {
        $questions = Quest::where([
            ['theme_id', $themeId],
            ['quest_number', $this->questNumber]
        ])
            ->with('theme')
            ->get();
        return view('quest', ['questions' => $questions]);
    }

    /**
     * @param int $themeId
     * @param int $nextQuestNumber
     * @param string $thisAnswer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getNextQuest(int $themeId, int $nextQuestNumber)
    {
        $nextQuestNumber++;
        $questions = Quest::where([
            ['theme_id', $themeId],
            ['quest_number', $nextQuestNumber]
        ])
            ->with('theme')
            ->get();
        return view('quest', ['questions' => $questions]);
    }
}

