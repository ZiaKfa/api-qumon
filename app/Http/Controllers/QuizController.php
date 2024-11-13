<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Answer;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quiz = Quiz::where('is_private', 0)->inRandomOrder()->get();
        $data = $quiz->map(function ($q) {
            $user = User::find($q->user_id);
            $answer = Answer::where('quiz_id', $q->id)->first();
            $category = Category::find($q->category_id);
            return [
                'id' => $q->id,
                'question' => $q->question,
                'user' => $user->name,
                'answer' => $answer->answer_text,
                'category' => $category->name
            ];
        });
        return new PostResource(true, 'Data berhasil diambil', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Quiz::create([
            'question' => $request->question,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'is_private' => $request->is_private
        ]);

        return new PostResource(true, 'Data berhasil ditambahkan', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        $data = Quiz::find($quiz);
        return new PostResource(true, 'Data berhasil diambil', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        $data = Quiz::find($quiz);
        $data->update([
            'question' => $request->question,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'answer_id' => $request->answer_id,
            'is_private' => $request->is_private
        ]);

        return new PostResource(true, 'Data berhasil diupdate', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        $data = Quiz::find($quiz);
        $data->delete();
        return new PostResource(true, 'Data berhasil dihapus', $data);
    }

    public function findQuizByCategory($category_id)
    {
        $data = Quiz::where('category_id', $category_id)->get();
        return new PostResource(true, 'Data berhasil diambil', $data);
    }

    public function findQuizByUser($user_id)
    {
        $data = Quiz::where('user_id', $user_id)->get();
        return new PostResource(true, 'Data berhasil diambil', $data);
    }
}
