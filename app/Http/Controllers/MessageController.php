<?php

namespace App\Http\Controllers;

use App\Enums\ThemeStatusEnum;
use App\Http\Requests\MessageRequest;
use App\Http\Requests\UserMessageUpdateRequest;
use App\Models\Message;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function message()
    {
        $themes = Theme::all()
            ->where('status', ThemeStatusEnum::PUBLISHED)
            ->push();
        return view('message', [
            'themes' => $themes
        ]);
    }

    /**
     * @param MessageRequest $request
     */
    public function store(MessageRequest $request)
    {

        $data = $request->validated();
        $message = Message::create($data);
        if ($message) {
            return redirect()->route('themes')
                ->with('success', __('messages.messages.create.success'));
        }
        return back()
            ->with('error', __('messages.messages.create.fail'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function userMessageEdit($id)
    {
        $message = Message::findOrFail($id);
        $user = Auth::user();
        $userId = $user->id;
        $messages = Message::all()
            ->where('user_id', $userId)
            ->push();
        $count = $messages->count();
        $ready = $messages
            ->where('status', 'закрыто')
            ->count();
        $in_waiting = $messages
            ->where('status', 'ожидание')
            ->count();
        $in_process = $messages
            ->where('status', 'в работе')
            ->count();
        $is_done = $messages
            ->where('status', 'выполнено')
            ->count();
        $is_back = $messages
            ->where('status', 'отозвано')
            ->count();
        return view('message-edit', [
            'message' => $message,
            'messages' => $messages,
            'count' => $count,
            'ready' => $ready,
            'in_process' => $in_process,
            'in_waiting' => $in_waiting,
            'is_done' => $is_done,
            'is_back' => $is_back
        ]);
    }

    /**
     * @param UserMessageUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userMessageUpdate(UserMessageUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $message = Message::findOrFail($id);
        $message = $message->fill($data);
        if ($message->save()) {
            return redirect()->route('account.index')
                ->with('success', __('messages.messages.update.success'));
        }
        return back()
            ->with('error', __('messages.messages.update.fail'));
    }
}
