<?php

namespace App\Http\Controllers;

use App\Services\TaskArraysService;
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
    public function index(TaskStairsService $taskStairsService, TaskArraysService $taskArraysService)
    {
        $numbers = $taskStairsService->getStructuredNumbersFromInterval(1, 100);
        
        $taskArraysService->setSizeOfArray(5, 7);
        $arrays = $taskArraysService->getStructuredArraysFromInterval(1, 1000);

        return view('index', ['numbers' => $numbers, 'arrays' => $arrays]);
    }
}
