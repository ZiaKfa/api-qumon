<?php

namespace App\Http\Controllers;

use App\Models\UserAnswer;
use Illuminate\Http\Request;

class UserAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = UserAnswer::all();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diambil',
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = UserAnswer::create([
            'user_id' => $request->user_id,
            'text' => $request->answer_text,
            'quiz_id' => $request->quiz_id,
            'answer_id' => $request->answer_id,
            'is_correct' => $request->is_correct
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserAnswer $userAnswer)
    {
        $data = UserAnswer::find($userAnswer);
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diambil',
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserAnswer $userAnswer)
    {
        $data = UserAnswer::find($userAnswer);
        $data->update([
            'user_id' => $request->user_id,
            'quiz_id' => $request->quiz_id,
            'answer_id' => $request->answer_id,
            'is_correct' => $request->is_correct
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diupdate',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAnswer $userAnswer)
    {
        $data = UserAnswer::find($userAnswer);
        $data->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus',
            'data' => $data
        ]);
    }
}
