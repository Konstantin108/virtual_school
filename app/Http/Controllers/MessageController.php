<?php

namespace App\Http\Controllers;

use App\Enums\ThemeStatusEnum;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\Theme;

class MessageController extends Controller
{
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
}
