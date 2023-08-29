<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $counter = 1;

    public function decrease()
    {
        if($this->counter < 1){
            $this->counter = 1;
        }

        $this->counter--;
    }
    public function increase()
    {
        $this->counter++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
