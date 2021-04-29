<?php

namespace App\Http\Controllers;

use App\Lists;
use App\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $lists = Lists::where('board_id', $id)->get() ?? [];
        return view('boards.show', ['lists' => $lists]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // validation des inputs
        $data = $request->validate([
            'name' => ['required', 'string'],
        ]);

        $list = new Lists();
        $list->user_id = auth()->user()->id;
        $list->board_id = $id;
        $list->name = $data['name'];
        $list->save();


        return back();
    }
}
