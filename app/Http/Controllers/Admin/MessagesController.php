<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditMessageRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::select()->get();
        $count = Message::select()->count();
        return view('admin.messages', [
            'messages' => $messages,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param Message $message
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        $arr = [];
        $admins = User::all()
            ->where('is_admin', 1)
            ->push();
        foreach ($admins as $admin){
            $arr[] = $admin->id;
        }
        $curator = Auth::user();
        return view('admin.edit-message', [
            'message' => $message,
            'curator' => $curator,
            'arr' => $arr,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditMessageRequest $request
     * @param Message $message
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditMessageRequest $request, Message $message)
    {
        $data = $request->validated();
        $message = $message->fill($data);
        if ($message->save()) {
            return redirect()->route('admin.messages.index')
                ->with('success', __('messages.admin.messages.update.success'));
        }
        return back()
            ->with('error', __('messages.admin.messages.update.fail'));
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
    public function deleteMessage($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        if ($message) {
            return redirect()->route('admin.messages.index')
                ->with('success', __('messages.admin.messages.delete.success'));
        }
        return back()
            ->with('error', __('messages.admin.messages.delete.fail'));
    }
}
