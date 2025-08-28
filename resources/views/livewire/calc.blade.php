<?php

use function Livewire\Volt\{state, mount};

state([
    'value1' => 0,
    'value2' => 0,
    'operator' => '',
    'result' => 0,
]);

$calculate = function () {
    switch($this->operator) {
        case 'addition':
            $this->result = $this->value1 + $this->value2;
            break;
        case 'subtraction':
            $this->result = $this->value1 - $this->value2;
            break;
        case 'multiplication':
            $this->result = $this->value1 * $this->value2;
            break;
        case 'division':
            $this->result = $this->value2 != 0
                ? $this->value1 / $this->value2
                : '割り算エラー';
            break;
        default:
            $this->result = '不明な演算子';
    }
};

// URL パラメータを受け取って初期化
mount(function($value1, $operator, $value2) use ($calculate) {
    $this->value1 = (float)$value1;
    $this->value2 = (float)$value2;
    $this->operator = $operator;
    $calculate();
});


?>

<div>
    <h1>計算結果</h1>

    <p>{{ $value1 }} {{ $operator }} {{ $value2 }} = {{ $result }}</p>
    </p>
    
</div>
