<div>
    @if (session('error'))
        <div class="p-4 mt-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">{{ session('error') }}</span>
        </div>
    @endif

    @if (session('success'))
        <div class="p-4 mt-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="container content py-6 mx-auto">
        <div class="mx-auto">
            @include('livewire.todos.create')
        </div>
    </div>
    <div>
        @include('livewire.todos.search')
    </div>
    <div id="todos-list">
        @foreach ($todos as $todo)
            @include('livewire.todos.list')
        @endforeach
        <div class="my-2">
            {{ $todos->links() }}
        </div>
    </div>
</div>
