<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use App\Models\Todo as ModelsTodo;
use Exception;

class Todo extends Component
{
    use WithPagination;

    #[Validate('required|min:3|max:50')]
    public $name;

    public $search = "";

    public $editTodoId;

    #[Validate('required|min:3|max:50', as: 'Todo')]
    public $editTodoName;

    public function create() {

        $validated = $this->validateOnly('name');

        ModelsTodo::create($validated);

        $this->reset('name');

        $this->resetPage();

        session()->flash('success' , 'Todo created successfully.');
    }

    public function delete(ModelsTodo $todo) {
        try{
            $todo->delete();
            session()->flash('success' , 'Todo deleted successfully.');
        } catch( Exception $e) {
            session()->flash('error', 'Failed to delete todo: ' . $e->getMessage());
        }
    }

    public function toggleTodo(ModelsTodo $todo) {
        try{
            $todo->completed = !$todo->completed;
            $todo->save();
        } catch( Exception $e) {
            session()->flash('error', 'Failed to toggle todo: ' . $e->getMessage());
        }

    }

    public function edit (ModelsTodo $todo) {
        try{
            $this->editTodoId = $todo->id;
            $this->editTodoName = $todo->name;
        } catch( Exception $e) {
            session()->flash('error', 'Failed to update todo: ' . $e->getMessage());
        }

    }

    public function cancel() {
        $this->reset('editTodoId', 'editTodoName');
    }

    public function update() {
        $validated = $this->validateOnly('editTodoName');
        ModelsTodo::find($this->editTodoId)->update([
            'name' => $this->editTodoName,
        ]);

        $this->cancel();
    }

    public function render()
    {
        return view('livewire.todos.main', [
            'todos' => ModelsTodo::latest()->where('name', 'like', "%{$this->search}%")->paginate(5),
        ]);
    }
}
