<?php

namespace App\Http\Controllers;

/**
 *  Контроллер главной страницы
 */
class ExerciseController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('index');
    }
}
