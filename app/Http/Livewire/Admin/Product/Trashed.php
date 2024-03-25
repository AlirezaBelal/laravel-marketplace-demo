<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Log;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Trashed extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function deleteCategory($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        Storage::disk('public')->delete('storage', $product->img);
        $product->forceDelete();
        $this->emit('toast', 'success', ' محصول به صورت کامل با موفقیت حذف شد.');
    }

    public function trashedProduct($id)
    {
        $product = Product::withTrashed()->where('id', $id)->first();
        $product->restore();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'بازیابی محصول'.'-'.$product->title,
            'actionType' => 'بازیابی',
        ]);
        $this->emit('toast', 'success', ' محصول با موفقیت بازیابی شد.');
    }

    public function render()
    {

        $products = $this->readyToLoad ? DB::table('products')
            ->whereNotNull('deleted_at')->
            latest()->paginate(15) : [];

        return view('livewire.admin.product.trashed', compact('products'));
    }
}
