<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Product extends Component
{
    use WithFileUploads;
    
    public $products, $categories;
    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|exists:categories,id')]
    public $category;

    #[Validate('required|numeric|min:0')]
    public $price;

    #[Validate('nullable|string|max:1000')]
    public $description;

    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240')]
    public $image;

    public function mount() {
        $this->products = \App\Models\Product::with('category')->get();
        $this->categories = Category::all();
    }

    public function save()
    {
        $imagePath = '';
        if ($this->image) {
            $imagePath = $this->image->store('products', 'public');
        }

        \App\Models\Product::create([
            'name' => $this->name,
            'category_id' => $this->category,
            'description' => $this->description,
            'price' => $this->price,
            'image_path' => $imagePath
        ]);

        session()->flash('message', 'Product added successfully.');
        return $this->redirect('/dashboard/products');
    }

    public function update()
    {
        $imagePath = $this->image ? $this->image->store('products', 'public') : $this->image;

        $product = Product::find($this->productId);
        if ($product) {
            $product->name = $this->name;
            $product->category_id = $this->category;
            $product->price = $this->price;
            $product->description = $this->description;
            $product->image_path = $imagePath;

            $product->save();

            session()->flash('message', 'Product updated successfully.');
            $this->resetFields();
            $this->dispatchBrowserEvent('closeEditProductModal');
            $this->products = Product::with('category')->get();
        }
    }

    public function delete($id)
    {
        if (Auth::user()->role !== 'admin') return session()->flash('error', 'You do not have permission to perform this action.');

        $product = \App\Models\Product::find($id);

        if ($product) {
            $product->delete();
            session()->flash('message', 'Product deleted successfully.');

            $this->products = \App\Models\Product::with('category')->get();
        } else {
            session()->flash('error', 'Product not found.');
        }
    }

    public function render()
    {
        return view('livewire.admin.product')->layout('components.layouts.dashboard');;
    }
}
