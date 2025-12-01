<div>
    <livewire:components.header />

    <livewire:components.sidebar />

    <!-- Main Content -->
    <main id="main-content" 
    class="pt-24 pl-64 smooth-transition min-h-screen">
        <div class="p-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-2xl font-bold 
                    dark:text-white mb-8">
                    Profile Settings
                </h2>

                <!-- Profile Information -->
                <form class="bg-white dark:bg-gray-800 
                    rounded-xl shadow-sm border border-gray-100 
                    dark:border-gray-700 p-8 smooth-transition mb-8" wire:submit.prevent="update">
                    <div class="flex items-center space-x-6 mb-8">
                        <div class="relative">
                            <div class="w-24 h-24 rounded-full 
                                bg-blue-100 dark:bg-blue-900 flex 
                                items-center justify-center">
                                <span class="text-blue-600 dark:text-blue-400 
                                font-bold text-2xl">
                                {{ $initials }}
                            </span>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-semibold text-gray-900 
                            dark:text-white">
                                {{ $user->name }}
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400">
                                {{ $user->nim }} ({{ ucfirst($user->role) }})
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                        <div>
                            <label class="block text-sm font-medium 
                                text-gray-700 dark:text-gray-300 mb-2">
                                Name
                            </label>
                            <input type="text" wire:model="name" value="{{ $user->name }}" 
                            class="w-full px-4 py-3 border border-gray-300 
                                dark:border-gray-600 rounded-lg bg-white 
                                dark:bg-gray-700 text-gray-900 dark:text-white 
                                smooth-transition focus:ring-2 focus:ring-blue-500 
                                focus:border-transparent">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 
                            dark:text-gray-300 mb-2">
                                Email
                            </label>
                            <input type="email" 
                            wire:model="email"
                            value="{{ $user->email }}" 
                            class="w-full px-4 py-3 border border-gray-300 
                                dark:border-gray-600 rounded-lg bg-white 
                                dark:bg-gray-700 text-gray-900 dark:text-white 
                                smooth-transition focus:ring-2 focus:ring-blue-500 
                                focus:border-transparent">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 
                                dark:text-gray-300 mb-2">
                                    Phone
                                </label>
                            <input type="tel"
                            wire:model="phone_number" 
                            value="{{ $user->phone_number }}" 
                            class="w-full px-4 py-3 border border-gray-300 
                                dark:border-gray-600 rounded-lg bg-white 
                                dark:bg-gray-700 text-gray-900 dark:text-white 
                                smooth-transition focus:ring-2 focus:ring-blue-500 
                                focus:border-transparent">
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 mt-8">
                        <button class="px-6 py-3 bg-blue-600 hover:bg-blue-700 
                            text-white rounded-lg smooth-transition" type="submit">
                                Save Changes
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>