<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateQuestRequest;
use App\Http\Requests\SaveCorrectAnswerRequest;
use App\Models\Quest;
use App\Models\Theme;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Quest::select()->get();
        $themes = Theme::all()->push();
        $count = Quest::select()->count();
        return view('admin.questions', [
            'questions' => $questions,
            'themes' => $themes,
            'count' => $count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themes = Theme::all()->push();
        $questions = Quest::all()->push();
        return view('admin.add-quest', [
            'themes' => $themes,
            'questions' => $questions
        ]);
    }

    /**
     * @param int $id
     */
    public function addCorrectAnswer(int $id)
    {
        $questions = Quest::all()->push();
        $quest = Quest::findOrFail($id);
        return view('admin.add-correct-answer', [
            'quest' => $quest,
            'questions' => $questions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\CreateQuestRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateQuestRequest $request)
    {
        $data = $request->only([
            'theme_id',
            'text',
            'answer_1',
            'answer_2',
            'answer_3',
            'answer_4',
            'quest_number',
            'correct_answer'
        ]);
        $quest = Quest::create($data);
        if ($quest) {
            return redirect()->route('addCorrectAnswer', [
                'id' => $quest->id
            ]);
        }
        return back();
    }

    /**
     * @param SaveCorrectAnswerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveCorrectAnswer(SaveCorrectAnswerRequest $request)
    {
        $data = $request->only([
            'id',
            'theme_id',
            'text',
            'answer_1',
            'answer_2',
            'answer_3',
            'answer_4',
            'quest_number',
            'correct_answer'
        ]);
        $thisId = $data['id'];
        $quest = Quest::find($thisId);
        $quest = $quest->fill($data)->save();
        if ($quest) {
            return redirect()->route('admin.questions.index')
                ->with('success', __('messages.admin.questions.create.success'));;
        }
        return back()
            ->with('error', __('messages.questions.themes.create.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteQuest($id)
    {
        $quest = Quest::findOrFail($id);
        $quest->delete();
        if ($quest) {
            return redirect()->route('admin.questions.index')
                ->with('success', __('messages.admin.questions.delete.success'));
        }
        return back()
            ->with('error', __('messages.admin.questions.delete.fail'));
    }
}
