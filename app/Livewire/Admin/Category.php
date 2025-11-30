<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Category extends Component
{
    public $categories;

    public function mount() {
        $this->categories = \App\Models\Category::withCount('products')->get();
    }

    public function delete($id)
    {
        if (Auth::user()->role !== 'admin') return session()->flash('error', 'You do not have permission to perform this action.');

        $product = \App\Models\Category::find($id);

        if ($product) {
            $product->delete();
            session()->flash('message', 'Category deleted successfully.');

            $this->redirect('/dashboard/categories');
        } else {
            session()->flash('error', 'Category not found.');
        }
    }

    public function render()
    {
        return view('livewire.admin.category')->layout('components.layouts.dashboard');
    }
}
