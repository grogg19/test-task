<?php

namespace App\Services;

/**
 * Логика второго задания
 */
class TaskArraysService
{
    private int $rows;
    private int $columns;

    /**
     * @param int $rows
     * @param int $columns
     */
    public function __construct(int $rows, int $columns)
    {
        $this->rows    = $rows;
        $this->columns = $columns;
    }

    /**
     * Метод создает из интервала двухмерный массив из интервала чисел от $firstNumber до $lastNumber
     * и возвращает его с подсчитанными суммами элементов столбцов и суммами элементов строк
     *
     * @param int $firstNumber
     * @param int $lastNumber
     *
     * @return array
     */
    public function getStructuredArraysFromInterval(int $firstNumber, int $lastNumber): array
    {
        // создание массива чисел в интервале от $firstNumber до $lastNumber
        $numbers = range($firstNumber, $lastNumber);

        // Перемешивание элементов
        shuffle($numbers);

        $matrixNumbers = [];

        // Заполнение массива элементами из $numbers
        for ($i = 0; $i < $this->columns; $i++) {
            for ($j = 0; $j < $this->rows; $j++) {
                $matrixNumbers[$i][$j] = array_shift($numbers);
            }
            $matrixNumbers[$i]['sum_row'] = array_sum($matrixNumbers[$i]);
        }

        // Подсчет суммы элементов каждого столбца массива $matrixNumbers
        for ($i = 0; $i < $this->rows; $i++) {
            $matrixNumbers['sum_column'][$i] = array_sum(array_column($matrixNumbers, $i));
        }

        return $matrixNumbers;
    }

}
