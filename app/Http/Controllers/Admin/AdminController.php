<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditAdminRequest;
use App\Models\Message;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function adminAccount($id)
    {
        $previous = $_SERVER['HTTP_REFERER'];
        $user = User::find($id);
        $id = $user->id;
        $countInProcess = Message::where([
            ['curator_id', $id],
            ['status', 'в работе']
        ])
            ->count();
        $countReady = Message::where([
            ['curator_id', $id],
            ['status', 'закрыто']
        ])
            ->count();
        return view('admin.admin', [
            'user' => $user,
            'countInProcess' => $countInProcess,
            'countReady' => $countReady,
            'previous' => $previous
        ]);
    }

    public function adminEdit($id)
    {
        $previous = $_SERVER['HTTP_REFERER'];
        $user = User::find($id);
        return view('admin.edit-admin', [
            'user' => $user,
            'previous' => $previous
        ]);
    }

    /**
     * @param EditAdminRequest $request
     * @param $id
     */
    public function adminUpdate(EditAdminRequest $request, $id)
    {
        $user = User::find($id);
        $data = $request->validated();
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $originalExt = $image->getClientOriginalExtension();
            $fileName = uniqid();
            $fileLink = $image->storeAs('users', $fileName . '.' . $originalExt, 'public');
            $data['avatar'] = $fileLink;
        }
        $user = $user->fill($data);
        if ($user->save()) {
            return redirect()->route('admin.users.index')
                ->with('success', __('messages.admin.admins.update.success'));
        }
        return back()
            ->with('error', __('messages.admin.admins.update.fail'));
    }
}
