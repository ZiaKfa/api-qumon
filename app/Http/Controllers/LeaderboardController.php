<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Answer;
use App\Models\UserAnswer;


class LeaderboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $correct_answers = UserAnswer::where('is_correct', 1)
            ->get();
    
        $data = $correct_answers->groupBy('user_id')->map(function ($answers, $userId) {
            return [
            'user' => $answers->first()->user->name,
            'total_correct_answer' => $answers->count()
            ];
        })->values()->sortByDesc('total_correct_answer')->values();
    
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diambil',
            'data' => $data
        ]);
    }

    public function weekly(){
        $correct_answers = UserAnswer::where('is_correct', 1)
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->get();
    
        $data = $correct_answers->groupBy('user_id')->map(function ($answers, $userId) {
            return [
                'user' => $answers->first()->user->name,
                'total_correct_answer' => $answers->count()
            ];
        })->values()->sortByDesc('total_correct_answer')->values();
    
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diambil',
            'data' => $data
        ]);
    }
    
}
