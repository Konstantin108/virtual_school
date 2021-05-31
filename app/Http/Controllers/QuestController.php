<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestController extends Controller
{
    protected $questNumber = 1;

    /**
     * @param int $themeId
     * @param Quest $quest
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getQuest(int $themeId, Quest $quest)
    {
        Session::forget('quest.score');
        Session::forget('quest.questions');
        Session::push('quest.score', 'data');
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
        $thisAnswer = $request->input('answer');
        $thisCorrectAnswer = $request->input('correctAnswer');
        if($thisAnswer == $thisCorrectAnswer){
            $request->session()->push('quest.score', $thisAnswer);
        }
        $request->session()->push('quest.questions', 'quest');
        $value = count(Session::get('quest.score')) - 1;
        $colOfQuestions = count(Session::get('quest.questions'));
        return view('quest', [
            'questions' => $questions,
            'value' => $value,
            'colOfQuestions' => $colOfQuestions
        ]);
    }
}

