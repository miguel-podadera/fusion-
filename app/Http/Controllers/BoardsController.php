<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Board;
use App\Lists;
use App\Ticket;

class BoardsController extends Controller
{
    public function show($id)
    {
        $board = Board::where('id', $id)->first();
        $lists = Lists::where('board_id', $id)->get();
        $tickets = Ticket::where('list_id', $id)->get();
        return view('boards.show', ['board' => $board, 'lists' => $lists, 'tickets' => $tickets]);
    }

    public function store(Request $request) // creer dans base de données
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'url_picture' => ['required', 'string']
        ]);

        $board = new Board();
        $board->user_id = auth()->user()->id;
        $board->name = $data['name'];
        $board->url_picture = $data['url_picture'];

        $board->save();

        return back();
    }
}
