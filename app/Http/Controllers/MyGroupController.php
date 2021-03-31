<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Group;
use App\Member;
use App\Feture;
use App\LinkGit;
use Auth;

class MyGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_group () {
        $groups = Group::WhereHas('relation_member')
            ->with('relation_topic')
            ->WhereHas('relation_member', function ($member) {
                $member->where('member_id', '=', Auth::user()->id);
            })
            ->get();

        //return response()->json($groups);
        return view('my_group.my_group', compact('groups'));
    }

    public function link_git($id) {
        $links = LinkGit::all()->where('topic_id', '=', $id);
        return view('my_group.link_git', compact('links'));
    }

    public function index($id)
    {
        $fetures = Feture::all()->where('topic_id', '=', $id);
        return view('my_group.index', compact('fetures', 'id')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('my_group.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $fetures = new Feture($request -> all());
        $fetures->topic_id = $id;
        $fetures->group_id = $id;
        $fetures->title = $request -> get('title');
        $fetures->content = $request -> get('content');
        $fetures->status = $request -> get('status');
        $fetures->date_create = $request -> get('date_create');
        
        if ($request -> file('file_project') !== null) {
            $fetures->image = $request -> file('file_project') -> store('/file_project', 'public');
        }

        $fetures->save();
        return redirect("/group");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fetures = Feture::find($id);
        return view('my_group.edit', compact('fetures'));
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
        $fetures = Feture::find($id);
        $fetures->update($request -> all());
        return redirect("/group");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fetures = Feture::find($id);
        $fetures->delete();
        return redirect("/group");
    }
}
