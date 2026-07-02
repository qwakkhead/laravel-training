<?php

namespace App\Livewire;

use Livewire\WithPagination;
use App\Models\Student;
use Livewire\Component;

class Students extends Component
{
    use WithPagination;

    public ?Student $editingStudent = null;
    public string $search = '';
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

        $this->resetForm();

        session()->flash('success', 'Student added successfully!');
    }

    public function edit($id)
    {
        $this->editingStudent = Student::findOrFail($id);

        $this->name = $this->editingStudent->name;
        $this->course = $this->editingStudent->course;
        $this->age = $this->editingStudent->age;
    }

    public function update()
    {
        $this->validate();

        $this->editingStudent->update([
            'name' => $this->name,
            'course' => $this->course,
            'age' => $this->age,
        ]);

        session()->flash('success', 'Student updated successfully!');

        $this->cancel();
    }

    public function delete($id)
    {
        Student::findOrFail($id)->delete();

        session()->flash('success', 'Student deleted successfully!');
    }

    public function cancel()
    {
        $this->editingStudent = null;

        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset([
            'name',
            'course',
        ]);

        $this->age = 18;
    }

    public function render()
    {
        $students = Student::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('course', 'like', '%' . $this->search . '%')
                    ->orWhere('age', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.students', [
            'students' => $students,
        ]);
    }
}