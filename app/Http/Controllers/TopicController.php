<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;
use App\LinkGit;
use Auth;

class TopicController extends Controller
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

    public function index($id)
    {
        $topics = Topic::all()
            ->where('user_id', '=', Auth::user()->id)
            ->where('group_id', '=', $id);
        return view('topic.index', compact('topics', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('topic.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $topics = new Topic($request -> all());
        $topics->user_id = Auth::user()->id;
        $topics->group_id = $id;
        $topics->advisor_id = $request -> get('advisor_id');
        $topics->project_name = $request -> get('project_name');
        $topics->date_create = $request -> get('date_create');
        $topics->save();

        $names = $request -> get('name');
        $links = $request -> get('link');

        foreach ($names as $key => $value) {
            $link_gits = new LinkGit();
            $link_gits->topic_id = $topics->id;
            $link_gits->name = $names[$key];
            $link_gits->link = $links[$key];
            $link_gits->save();
        }

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $get_id = $request->get('get_id');
        $topics = Topic::find($id);
        $topics->delete();
        return redirect("/topic/$get_id");
    }
}
