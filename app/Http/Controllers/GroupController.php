<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Group;
use App\Member;
use Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all()->where('user_id', '=', Auth::user()->id);
        return view('group.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $groups = new Group($request -> all());
        $groups->user_id = Auth::user()->id;
        $groups->save();
        return redirect('/group');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groups = Group::find($id);
        // $users = User::find(1)->with('relation_member')->with('relation_group')->get();
        $users = User::find(Auth::user()->id)
            ->where('id', '=', Auth::user()->id)
            ->with('relation_group')
            ->get();

        $members = Member::where('user_id', '=', Auth::user()->id)
            ->where('group_id', '=', $id)
            ->with('relation_users')->get();
        
        // return response()->json($members);
        return view('group.show', compact('groups', 'users', 'members'));
    }

    public function add_users(Request $request, $id)
    {
        if (isset($_POST['add_method'])) {
            $users = User::all()->where('email', '=', $request -> get('add_field'));
            $data = array();
            foreach ($users as $key => $value) {
                array_push($data, $users[$key]);
            }
            $members = new Member();
            $members->user_id = Auth::user()->id;
            $members->member_id = $data[0]->id;
            $members->group_id = $id;
            $members->save();
            return redirect("/group/$id");
        }
    }

    public function delete_users(Request $request, $id) {
        if (isset($_POST['delete_method'])) {
            $get_id = $request -> get('get_id');
            $members = Member::find($get_id);
            $members->delete();
            return redirect("/group/$members->group_id");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = Group::find($id);
        return view('group.edit', compact('groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $groups = Group::find($id);
        $groups->user_id = Auth::user()->id;
        $groups->update($request -> all());
        return redirect('/group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groups = Group::find($id);
        $groups->delete();
        return redirect('/group');
    }
}
