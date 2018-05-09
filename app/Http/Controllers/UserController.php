<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->only(['ban', 'unban', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(6);

        return view('modules.user.index', compact('users'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($param)
    {
        $viewinguser = User::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();

        return view('modules.user.show', compact('viewinguser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Ban a user from making comments
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function ban(Request $request)
    {
        // ban a user from posting content
        Validator::make($request->all(), [
            'user_id' => 'required|exists:users'
        ]);

        $user = User::findOrFail($request->user_id);
        $user->banned = true;
        $user->save();

        return back()->with('message', 'User ' . $user->name . ' has been banned from making comments.');
    }

    /**
     * Unban a user from making comments
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unban(Request $request)
    {
        // ban a user from posting content
        Validator::make($request->all(), [
            'user_id' => 'required|exists:users'
        ]);

        $user = User::findOrFail($request->user_id);
        $user->banned = false;
        $user->save();

        return back()->with('message', 'User ' . $user->name . ' has been banned from making comments.');
    }

    /**
     * Grant or remove admin privileges.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function admin(Request $request)
    {
        // ban a user from posting content
        Validator::make($request->all(), [
            'user_id' => 'required|exists:users',
            'action' => 'required|boolean'
        ]);

        $user = User::findOrFail($request->user_id);

        if ($request->action == true) {
            $user->admin = true;
            $user->save();
            return back()->with('message', 'User ' . $user->name . ' has been made an admin.');

        }

        $user->admin = false;
        $user->save();
        return back()->with('message', 'User ' . $user->name . ' has been removed as an admin.');
    }
}
