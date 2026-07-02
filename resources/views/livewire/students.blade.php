<div>
    <h1>Student Management System</h1>

    @if (session()->has('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <form wire:submit="{{ $editingStudent ? 'update' : 'save' }}">

        <p>Name</p>
        <input type="text" wire:model="name">

        @error('name')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br>

        <p>Course</p>
        <input type="text" wire:model="course">

        @error('course')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br>

        <p>Age</p>
        <input type="number" wire:model="age">

        @error('age')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">
            {{ $editingStudent ? 'Update Student' : 'Save Student' }}
        </button>

        @if ($editingStudent)
            <button type="button" wire:click="cancel">
                Cancel
            </button>
        @endif

    </form>

    <br><br>

    <p>Search Student</p>

    <input
        type="text"
        wire:model.live="search"
        placeholder="Search by name...">


    <hr>

    <h2>Students</h2>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->course }}</td>
                    <td>{{ $student->age }}</td>
                    <td>
                        <button wire:click="edit({{ $student->id }})">
                            Edit
                        </button>

                        <button
                            wire:click="delete({{ $student->id }})"
                            wire:confirm="Are you sure you want to delete this student?">
                            Delete
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <br>

    {{ $students->links() }}
    
</div>