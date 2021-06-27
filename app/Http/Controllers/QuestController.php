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
        Session::forget('theme.themeIsCompletedId');
        Session::forget('quest.mistakeQuestionsCount');
        Session::push('quest.mistakeQuestionsCount', 'data');
        Session::push('theme.themeIsCompletedId', 'data');
        Session::forget('user.userId');
        Session::push('user.userId', 'data');
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
        $ratingItems = [];

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
            $request->session()->push('quest.mistakeQuestionsCount', 'data');
        }
        $request->session()->push('quest.questions', 'data');
        $value = count(Session::get('quest.score')) - 1;
        $colOfQuestions = count(Session::get('quest.questions'));
        $mistakeQuestions = Session::get('quest.mistakeQuestions');
        $mistakeQuestionsCount = count(Session::get('quest.mistakeQuestionsCount'));
        if (Auth::user()) {

            $user = Auth::user();
            $userId = Auth::user()->id;

            $ratingOnUserId = Rate::all()->where('user_id', $userId);
            foreach ($ratingOnUserId as $item) {
                $ratingItems[] = $item->theme_completed_id;
            }
            if (in_array($thisThemeId, $ratingItems)) {
            } else {
                if ($mistakeQuestionsCount > 1) {
                    Session::push('theme.themeIsCompletedId', 0);
                    Session::push('user.userId', 0);
                    $rateDef = 0;
                    $rating = Rate::select()
                        ->where('user_id', $userId)
                        ->count();
                    $rateData = $rateDef + $rating;
                    $data['rating'] = $rateData;
                    $user->fill($data);
                    $user->save();
                } elseif ($value == count($questions) && $mistakeQuestionsCount < 2) {

                    Session::push('theme.themeIsCompletedId', $thisThemeId);
                    Session::push('user.userId', $userId);
                    $rateDef = 1;
                    $rating = Rate::select()
                        ->where('user_id', $userId)
                        ->count();
                    $rateData = $rateDef + $rating;
                    $data['rating'] = $rateData;
                    $user->fill($data);
                    $user->save();
                }
            }
        }
        return view('quest', ['questions' => $questions,
            'value' => $value,
            'colOfQuestions' => $colOfQuestions,
            'mistakeQuestions' => $mistakeQuestions]);
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

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveResult()
    {
        $dataTime = now();
        $redirectCompletedVal = Session::get('redirectToCompleted.value');
        $redirectHomeVal = Session::get('redirectToHome.value');
        $data = 0;
        $dump = Session::get('theme.themeIsCompletedId');
        for ($i = 0; $i < count($dump); $i++) {
            $data = $dump[$i];
        }

        $dataId = 0;
        $dumpDataId = Session::get('user.userId');
        for ($i = 0; $i < count($dumpDataId); $i++) {
            $dataId = $dumpDataId[$i];
        }

        if ($data === 'data') {
        } else {
            $dataItems = [];
            $ratingOnUserId = Rate::all()->where('user_id', $dataId);
            foreach ($ratingOnUserId as $item) {
                $dataItems[] = $item->theme_completed_id;
            }
            if (!in_array($data, $dataItems)) {
                Rate::insert(array(
                    'theme_completed_id' => $data,
                    'user_id' => $dataId,
                    'created_at' => $dataTime
                ));
            }
        }
        if (Auth::user() && !$redirectCompletedVal && !$redirectHomeVal) {
            return redirect()->route('themes');
        } elseif (Auth::user() && $redirectCompletedVal && !$redirectHomeVal) {
            return redirect()->route('completedThemes');
        } elseif (Auth::user() && !$redirectCompletedVal && $redirectHomeVal) {
            return redirect()->route('home');
        } else {
            return redirect()->route('home');
        }
    }
}

