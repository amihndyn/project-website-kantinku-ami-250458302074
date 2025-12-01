<div>
    <livewire:components.header />

    <livewire:components.sidebar />

    <!-- Main Content -->
    <main id="main-content" 
    class="pt-24 pl-64 smooth-transition min-h-screen">
        <div class="p-6">
            <div class="flex flex-col sm:flex-row 
                justify-between items-start sm:items-center 
                gap-4 mb-8">
                <h2 class="text-2xl font-bold dark:text-white">
                    Users Management
                </h2>
            </div>

            <div class="bg-white dark:bg-gray-800 
                rounded-xl shadow-sm border border-gray-100 
                dark:border-gray-700 overflow-hidden smooth-transition">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-4 text-left 
                                    text-sm font-medium text-gray-500 
                                    dark:text-gray-300 uppercase tracking-wider">
                                        User
                                    </th>
                                <th class="px-6 py-4 text-left 
                                    text-sm font-medium text-gray-500 
                                    dark:text-gray-300 uppercase tracking-wider">
                                        Email
                                    </th>
                                
                                <th class="px-6 py-4 text-left text-sm 
                                    font-medium text-gray-500 
                                    dark:text-gray-300 uppercase tracking-wider">
                                        Telp
                                    </th>
                                <th class="px-6 py-4 text-left 
                                    text-sm font-medium text-gray-500 
                                    dark:text-gray-300 uppercase tracking-wider">
                                        Role
                                    </th>
                                <th class="px-6 py-4 text-left text-sm 
                                    font-medium text-gray-500 
                                    dark:text-gray-300 uppercase tracking-wider">
                                        Actions
                                    </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 
                            dark:divide-gray-600">
                            @foreach ($users as $user)
                            <tr class="hover:bg-gray-50 
                                dark:hover:bg-gray-700 smooth-transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0 
                                            bg-blue-100 rounded-full flex 
                                            items-center justify-center">
                                            <span class="text-blue-600 
                                                font-semibold text-sm">
                                                {{ strtoupper(substr(
                                                    $user->name, 0, 1) . substr(
                                                        explode(' ', 
                                                        $user->name)[1] ?? '', 0, 1)) }}
                                            </span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium 
                                                text-gray-900 dark:text-white">
                                                    {{ $user->name }}
                                                </div>
                                            <div class="text-sm text-gray-500 
                                                dark:text-gray-400">
                                                    {{ $user->nim }}
                                                </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm 
                                    text-gray-500 dark:text-gray-400">
                                        {{ $user->email }}
                                    </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm 
                                    text-gray-500 dark:text-gray-400">
                                        {{ $user->phone_number }}
                                    </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm 
                                    text-gray-900 dark:text-white">
                                        {{ ucfirst($user->role) }}
                                    </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button onclick="if(!confirm('Are you sure you want to delete this user?')) 
                                    return;" wire:click="delete({{ $user->id }})" 
                                    class="text-red-600 hover:text-red-900 dark:text-red-400 
                                        dark:hover:text-red-300 smooth-transition"
                                            >Delete
                                        </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>