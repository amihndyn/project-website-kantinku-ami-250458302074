<div>
    <livewire:components.header />

    <livewire:components.sidebar />

    <!-- Main Content -->
    <main id="main-content" class="pt-24 pl-64 smooth-transition min-h-screen">
        <div class="p-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                <h2 class="text-2xl font-bold dark:text-white">Categories Management</h2>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 smooth-transition w-full sm:w-auto justify-center" onclick="openAddCategoryModal()">
                    <i class="fa-solid fa-plus"></i>
                    Add Category
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($categories as $category)
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 smooth-transition card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ $category->products_count }} Products</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $category->name }}</h3>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mb-4">{{ $category->slug }}</p>
                    <div class="flex space-x-3">
                        <button onclick="if(!confirm('Are you sure you want to delete this category?')) return;" wire:click="delete({{ $category->id }})" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 text-sm smooth-transition">Delete</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</div>