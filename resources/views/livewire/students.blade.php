<div>
    <h1>Student Management System</h1>

    <hr><br>

    <h2>{{ $message }}</h2>

    <br>

    <input
        type="text"
        wire:model.live="name"
        placeholder="Enter your name">

    <br><br>

    <h3>Hello, {{ $name }}!</h3>

    <hr><br>

    <h2>Counter: {{ $count }}</h2>

    <button wire:click="increment">
        +
    </button>

    <button wire:click="decrement">
        -
    </button>
</div>