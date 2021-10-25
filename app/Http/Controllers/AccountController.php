<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditAccountRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
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
        return view('account', [
            'user' => $user,
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user-edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditAccountRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditAccountRequest $request)
    {
        $data = $request->only([
            'id',
            'name',
            'email',
            'password',
            'avatar'
        ]);

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $originalExt = $image->getClientOriginalExtension();
            $fileName = uniqid();
            $fileLink = $image->storeAs('users', $fileName . '.' . $originalExt, 'public');
            $data['avatar'] = $fileLink;
        }

        $thisId = $data['id'];
        $user = User::find($thisId);
        $user = $user->fill($data)->save();
        if ($user) {
            return redirect()->route('account.index')
                ->with('success', __('messages.account.update.success'));
        }
        return back()
            ->with('error', __('messages.account.update.fail'));
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
}
