<?php

namespace App\Services;

/**
 * Логика первого задания
 */
class TaskStairsService
{
    /**
     * Метод возвращает массив чисел в диапазоне от $firstNumber до $lastNumber, распределенных в виде "лесенки"
     *
     * @param int $firstNumber
     * @param int $lastNumber
     *
     * @return array
     */
    public function getStructuredNumbersFromInterval(int $firstNumber, int $lastNumber): array
    {
        $listNumbers = range($firstNumber, $lastNumber); // Список элементов из диапазона от $firstNumber до $lastNumber

        $startElementSlice      = 0;    // Параметр стартового элемента среза
        $quantitySlicesElements = 1;    // Параметр количества срезаемых элементов в массиве

        do {
            // $structuredNumbers - массив, в который добавляются срезаемый элементы из массива чисел $listNumbers
            $structuredNumbers[] = array_slice($listNumbers, $startElementSlice, $quantitySlicesElements);

            if (($startElementSlice !== 0) && (in_array($lastNumber, $structuredNumbers[$quantitySlicesElements - 1], true))) {
                break;
            }

            $quantitySlicesElements++;
            $startElementSlice += $quantitySlicesElements - 1;
        } while (1);

        return $structuredNumbers;
    }
}
