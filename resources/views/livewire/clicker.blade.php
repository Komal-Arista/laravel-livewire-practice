<div class="flex items-center justify-center min-h-screen bg-gray-100 p-4">
    <div class="flex flex-col md:flex-row gap-6 w-full max-w-4xl">
        <!-- Register Form -->
        <div class="w-full md:w-1/2 p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-center text-gray-700 mb-4">Register</h2>
            @if (session('success'))
              <span class="px-3 py-3 bg-green-600 text-white rounded">{{ session('success') }}</span>
            @endif
            <form action="#" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-600 text-sm font-medium mb-2" for="name">Full Name</label>
                    <input wire:model='name' type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600 text-sm font-medium mb-2" for="email">Email</label>
                    <input wire:model='email' type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('email')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600 text-sm font-medium mb-2" for="password">Password</label>
                    <input wire:model='password' type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('password')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <button wire:click.prevent='createUser' type="submit" class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
                    Register
                </button>
            </form>
            <p class="mt-4 text-sm text-gray-600 text-center">Already have an account? <a href="#" class="text-blue-600 hover:underline">Login</a></p>
        </div>

        <!-- User List -->
        <div class="w-full md:w-1/2 p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-center text-gray-700 mb-4">User List</h2>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key=>$user)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ ++$key }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-5">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
