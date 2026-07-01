<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class Students extends Component
{
    public string $name = '';
    public string $course = '';
    public int $age = 18;

    protected $rules = [
        'name' => 'required|min:3',
        'course' => 'required',
        'age' => 'required|integer|min:18|max:100',
    ];

    public function save()
    {
        $this->validate();

        Student::create([
            'name' => $this->name,
            'course' => $this->course,
            'age' => $this->age,
        ]);

        $this->reset(['name', 'course']);
        $this->age = 18;

        session()->flash('success', 'Student added successfully!');
    }

    public function delete($id)
    {
        Student::findOrFail($id)->delete();

        session()->flash('success', 'Student deleted successfully!');
    }

    public function render()
    {
        return view('livewire.students', [
            'students' => Student::latest()->get(),
        ]);
    }
}