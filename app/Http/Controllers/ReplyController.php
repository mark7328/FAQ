<?php

namespace App\Http\Controllers;


use App\Question;
use App\Reply;
use App\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($answer)
    {

        $reply = new Reply;
        $edit = FALSE;
        return view('replyForm', ['reply' => $reply,'edit' => $edit,'answer'=>$answer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $answer)
    {
        $input = $request->validate([
            'body' => 'required|min:5',
        ], [
            'body.required' => 'Body is required',
            'body.min' => 'Body must be at least 5 characters',
        ]);
        $input = request()->all();
        $answer = Answer::find($answer);
        $reply = new Reply($input);
        $reply->user()->associate(Auth::user());
        $reply->answer()->associate($answer);
        $reply->save();
        return redirect()->route('home')->with('message', 'Reply Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        return view('answer')->with('answer', $answer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($answer, $reply)
    {
        $reply = Reply::find($reply);
        $edit = TRUE;
        return view('answerForm', ['answer' => $answer, 'edit' => $edit, 'reply'=>$reply ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $answer, $reply)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($answer,$reply)
    {

    }
}
