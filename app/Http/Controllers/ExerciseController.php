<?php

namespace App\Http\Controllers;

use App\Services\TaskStairsService;

/**
 *  Контроллер главной страницы
 */
class ExerciseController extends Controller
{
    /**
     * @param TaskStairsService $taskStairsService
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(TaskStairsService $taskStairsService)
    {
        $numbers = $taskStairsService->getStructuredNumbersFromInterval(1, 1000);

        return view('index', ['numbers' => $numbers]);
    }
}
