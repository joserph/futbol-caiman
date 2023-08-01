<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public function render()
    {
        $categories = Category::get();
        //dd($categories);
        return view('livewire.category-component', compact('categories'));
    }
}
