<?php

namespace App\Livewire;

use Livewire\Component;

class Students extends Component
{
    public string $message = "Hello Livewire!";
    public string $name = "";
    public int $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function render()
    {
        return view('livewire.students');
    }
}