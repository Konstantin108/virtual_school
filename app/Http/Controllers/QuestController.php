<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class QuestController extends Controller
{
    protected $questNumber = 1;
    protected $savedResult = ['data'];

    /**
     * @param int $themeId
     * @param Quest $quest
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getQuest(int $themeId, Quest $quest)
    {
        Session::forget('quest.score');
        Session::forget('quest.questions');
        Session::forget('quest.mistakeQuestions');
        Session::push('quest.score', 'data');
        Session::push('theme.themeIsCompletedId', 'data');
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
        $thisText = $request->input('text');
        $thisThemeId = $themeId;
        if ($thisAnswer == $thisCorrectAnswer) {
            $request->session()->push('quest.score', $thisAnswer);
        } else {
            $request->session()->push('quest.mistakeQuestions', [$thisText, 'Ваш ответ: ' . $thisAnswer]);
        }
        $request->session()->push('quest.questions', 'data');
        $value = count(Session::get('quest.score')) - 1;
        $colOfQuestions = count(Session::get('quest.questions'));
        $mistakeQuestions = Session::get('quest.mistakeQuestions');
        //$themeIsCompletedId = Session::get('theme.themeIsCompletedId');
        if (Auth::user()) {
            $user = Auth::user();
            $rating = Auth::user()->rating;
            // dd($this->saveResult());
            if (!in_array($thisThemeId, $this->saveResult())) {
                if ($value === count($questions) && !$mistakeQuestions) {
                    Session::push('theme.themeIsCompletedId', $thisThemeId);
                    $rating += 1;
                    $data['rating'] = $rating;
                    $user->fill($data);
                    $user->save();
                }
            } elseif (in_array($thisThemeId, $this->savedResult)) {
                $data['rating'] = $rating;
                $user->fill($data);
                $user->save();
            }
        }
        return view('quest', [
            'questions' => $questions,
            'value' => $value,
            'colOfQuestions' => $colOfQuestions,
            'mistakeQuestions' => $mistakeQuestions
        ]);
    }

    /**
     * @param Request $request
     */
    public function clearSession(Request $request)
    {
        $request->session()->flush();
    }

    /**
     * @param Request $request
     */
    public function showSession(Request $request)
    {
        dd($request->session()->all());
    }

    public function saveResult(): array
    {
        $dump = Session::get('theme.themeIsCompletedId');
        foreach ($dump as $item) {
            $this->savedResult[] = $item;
        }
        return $this->savedResult;
    }

    public function showSavedResult()
    {
        dd($this->saveResult());
    }

    /**
     * @return mixed
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showRating()
    {
        $rating = Rate::select([
            'theme_completed_id'
        ])
            ->get();
        return view('rateTest', [
            'rating' => $rating
        ]);
    }
}

