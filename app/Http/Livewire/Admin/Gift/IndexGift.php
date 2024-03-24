<?php

namespace App\Http\Livewire\Admin\Gift;

use App\Models\Log;
use Livewire\Component;
use Livewire\WithPagination;

class IndexGift extends Component
{
    use WithPagination;

    protected $listeners = [
        'category.added' => '$refresh',
    ];

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public \App\Models\Gift $gift;

    public function mount()
    {
        $this->gift = new \App\Models\Gift();
    }

    protected $rules = [
        'gift.date_expire' => 'nullable',
        'gift.price' => 'nullable',
    ];

    public function updated($code)
    {
        $this->validateOnly($code);
    }

    public function categoryForm()
    {

        $this->validate();
        $code = mt_rand(1000000000, 9999999999999);
        $gift = \App\Models\Gift::query()->create([
            'date_expire' => $this->gift->date_expire,
            'price' => $this->gift->price,
            'value_price' => $this->gift->price,
            'code' => $code,
            'type' => 0,
        ]);

        $this->gift->date_expire = '';
        $this->gift->price = '';

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن کارت هدیه'.'-'.auth()->user()->name,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' کارت هدیه با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function deleteGift($id)
    {
        $gift = \App\Models\Gift::find($id);
        if ($gift->type == 1) {
            $this->emit('toast', 'success', ' امکان حذف وجود ندارد زیرا کارت هدیه توسط کاربر استفاده شده است!');

        } else {
            $gift->delete();
            Log::create([
                'user_id' => auth()->user()->id,
                'url' => 'حذف کردن کارت هدیه'.'-'.$gift->code,
                'actionType' => 'حذف',
            ]);
            $this->emit('toast', 'success', ' کارت هدیه با موفقیت حذف شد.');
        }

    }

    public function render()
    {

        $gifts = $this->readyToLoad ? \App\Models\Gift::where('code', 'LIKE', "%{$this->search}%")->
        orWhere('price', 'LIKE', "%{$this->search}%")->
        orWhere('value_price', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.gift.index-gift', compact('gifts'));
    }
}
