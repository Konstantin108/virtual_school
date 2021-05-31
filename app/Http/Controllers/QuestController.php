<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    protected $questNumber = 1;
    protected $score = 0;
    protected $answer = '';
    protected $correctAnswer = '';

    /**
     * @param int $themeId
     * @param Quest $quest
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getQuest(int $themeId, Quest $quest)
    {
        $questions = Quest::where([
            ['theme_id', $themeId],
            ['quest_number', $this->questNumber]
        ])
            ->with('theme')
            ->get();
        return view('quest', [
            'questions' => $questions,
            'quest' => $quest
        ]);
    }

    /**
     * @param int $themeId
     * @param int $nextQuestNumber
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @return \Illuminate\Http\Response
     */
    public function getNextQuest(Request $request, int $themeId, int $nextQuestNumber)
    {
        $nextQuestNumber++;
        $questions = Quest::where([
            ['theme_id', $themeId],
            ['quest_number', $nextQuestNumber]
        ])
            ->with('theme')
            ->get();
        $thisAnswer = $this->answer = $request->input('answer');
        $thisCorrectAnswer = $this->correctAnswer = $request->input('correctAnswer');
        $score =0;
        if($thisAnswer == $thisCorrectAnswer){
            $score += 1;
        }
//        dd($this->answer . ' ' . $this->correctAnswer . ' ' . $this->score);
        return view('quest', [
            'questions' => $questions,
            'score' => $score
        ]);
    }
}

