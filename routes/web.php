<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calcs/{value1}/{operator}/{value2}', function ($value1, $operator, $value2) {
    // 四則演算のロジック
    $result = 0;
    $operator_symbol = '';

    switch ($operator) {
        case 'addition':
            $result = $value1 + $value2;
            $operator_symbol = '+';
            break;
        case 'subtraction':
            $result = $value1 - $value2;
            $operator_symbol = '-';
            break;
        case 'multiplication':
            $result = $value1 * $value2;
            $operator_symbol = '×';
            break;
        case 'division':
            // ゼロ除算のチェック
            if ($value2 == 0) {
                return '0で割ることはできません。';
            }
            $result = $value1 / $value2;
            $operator_symbol = '÷';
            break;
        default:
            return '無効な演算子です。';
    }

    return view('calcs.show', compact('value1', 'operator_symbol', 'value2', 'result'));
});
