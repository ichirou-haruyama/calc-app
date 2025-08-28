<?php

namespace App\Livewire;

use Livewire\Component;

class Calc extends Component
{
    public $value1;
    public $operator;
    public $value2;
    public $result;

    public function mount($value1, $operator_symbol, $value2, $result)
    {
        $this->value1 = $value1;
        $this->operator = $operator_symbol;
        $this->value2 = $value2;
        $this->result = $result;
    }

    public function render()
    {
        return view('livewire.calc');
    }
}
