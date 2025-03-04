<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\User;
use Illuminate\View\View;

class ExerciseController extends Controller
{
    public function index(): View
    {
        $exercisesGroups = Exercise::orderBy('id')->get()
            ->groupBy(function (Exercise $exercise) {
                return substr($exercise->path, 0, 1);
            });
        return view('exercise.index', compact('exercisesGroups'));
    }

    public function show(Exercise $exercise): View
    {
        $exercise->load('chapter', 'users');
        $authUser = auth()->user() ?? new User();
        $userCompletedExercise = $authUser->completedExercises()
            ->where('exercise_id', $exercise->id)
            ->exists();

        $previousExercise = Exercise::whereId($exercise->id - 1)->firstOrNew([]);
        $nextExercise = Exercise::whereId($exercise->id + 1)->firstOrNew([]);

        $userSolutions = $authUser->solutions()
            ->where('exercise_id', $exercise->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('exercise.show', compact(
            'exercise',
            'userCompletedExercise',
            'authUser',
            'previousExercise',
            'nextExercise',
            'userSolutions'
        ));
    }
}
