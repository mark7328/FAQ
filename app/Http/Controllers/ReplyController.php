<?php

namespace App\Http\Controllers;


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
    public function create(Answer $answer)
    {
        $reply = new Reply;
        $edit = FALSE;
        return view('ReplyForm', ['reply' => $reply,'edit' => $edit,'answer' =>$answer ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Answer $answer)
    {
        $input = $request->validate([
            'body' => 'required|min:5',
        ], [
            'body.required' => 'Body is required',
            'body.min' => 'Body must be at least 5 characters',
        ]);
        $input = request()->all();
        $answer = Answer::find($answer);
        $Reply = new Reply($input);
        $Reply->user()->associate(Auth::user());
        $Reply->answer()->associate($answer);
        $Reply->save();
        return redirect()->route('answer.show',['answer_id' => $answer->id])->with('message', 'Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($answer,$reply)
    {
        $reply = Reply::find($reply);
        return view('answer')->with(['answer' => $answer, 'reply' => $reply]);
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
        $input = $request->validate([
            'body' => 'required|min:5',
        ], [
            'body.required' => 'Body is required',
            'body.min' => 'Body must be at least 5 characters',
        ]);

        $reply = Reply::find($reply);
        $reply->body = $request->body;
        $reply->save();
        return redirect()->route('answers.show',['question_id' => $answer, 'reply_id' => $reply])->with('message', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($answer,$reply)
    {
        $reply = Answer::find($reply);
        $reply->delete();
        return redirect()->route('answer.show',['answer_id' => $answer])->with('message', 'Delete');
    }
}
