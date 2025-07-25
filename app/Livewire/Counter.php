<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 10;
    public $inputValue;

    public function updatedInputValue($value)
    {
        // Đảm bảo chỉ xử lý nếu input là số
        if (is_numeric($value)) {
            $this->count -= $value;
            $this->inputValue = 0;
        }
    }

    public function render()
    {
        return view('livewire.counter');
    }

    public function increment($step)
    {
        $this->count = $this->count + $step;
    }

    public function decrement()
    {
//        $step = request()->input('value', 1);
        $this->count--;
    }
}
