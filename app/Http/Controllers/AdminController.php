<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function quizzes()
    {
        $quizzes = Quiz::all();
        return view('admin.quiz', compact('quizzes'));
    }

    public function users()
    {
        return view('admin.user');
    }
    
      public function home()
    {
        $totalUsers = User::count();
        return view('admin.home', compact('totalUsers'));
    }

    public function createQuiz(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Quiz::create($request->only('title'));

        return redirect()->route('admin.quizzes')->with('success', 'Quiz created successfully');
    }

    public function updateQuiz(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $quiz->update($request->only('title'));

        return redirect()->route('admin.quizzes')->with('success', 'Quiz updated successfully');
    }

    public function deleteQuiz(Quiz $quiz)
    {
        $quiz->delete();

        return redirect()->route('admin.quizzes')->with('success', 'Quiz deleted successfully');
    }
}