<?php

namespace App\Http\Controllers;

use App\Models\UserAnswer;
use Illuminate\Http\Request;
use App\Models\User;


class LeaderboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $correct_answer = UserAnswer::where('is_correct', 1)->get();
        $grouped_answer = $correct_answer->groupBy('user_id');
        $data = $grouped_answer->map(function ($item) {
            $user = User::find($item[0]->user_id);
            return [
                'user' => $user->name,
                'total_correct_answer' => count($item)
            ];
        });
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diambil',
            'data' => $data
        ]);
    }
}
