<?php

namespace App\Http\Controllers;

use App\Services\TaskArraysService;
use App\Services\TaskFrontService;
use App\Services\TaskStairsService;

/**
 *  Контроллер главной страницы
 */
class ExerciseController extends Controller
{
    /**
     * Метод возвращает представление главной страницы
     *
     * @param TaskStairsService $taskStairsService
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(TaskStairsService $taskStairsService, TaskArraysService $taskArraysService, TaskFrontService $taskFrontService)
    {
        $numbers = $taskStairsService->getStructuredNumbersFromInterval(1, 100);

        $taskArraysService->setSizeOfArray(5, 7);
        $arrays      = $taskArraysService->getStructuredArraysFromInterval(1, 1000);
        $phoneNumber = $taskFrontService->getPhoneNumberByCity();

        return view('index', ['numbers' => $numbers, 'arrays' => $arrays, 'phone_number' => $phoneNumber]);
    }
}
