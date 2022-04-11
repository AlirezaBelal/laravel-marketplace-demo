<?php

namespace App\Http\Livewire\Admin\Discount;

use App\Models\Discount;
use App\Models\Log;
use Livewire\Component;
use Livewire\WithPagination;

class IndexDiscount extends Component
{
    use WithPagination;

    protected $listeners = [
        'category.added' => '$refresh'
    ];
    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public Discount $discount;

    public function mount()
    {
        $this->discount = new Discount();
    }


    protected $rules = [
        'discount.price' => 'nullable',
        'discount.percent' => 'nullable',
        'discount.product_id' => 'nullable',
        'discount.category_id' => 'nullable',
        'discount.vendor_id' => 'nullable',
        'discount.date_expire' => 'nullable',
        'discount.status' => 'nullable',
    ];

    public function updated($code)
    {
        $this->validateOnly($code);
    }


    public function categoryForm()
    {

        $this->validate();
        $code = mt_rand(1000000000 ,  9999999999999);
        $gift = Discount::query()->create([
            'date_expire' => $this->discount->date_expire,
            'price' => $this->discount->price,
            'percent' => $this->discount->percent,
            'product_id' => $this->discount->product_id,
            'category_id' => $this->discount->category_id,
            'vendor_id' => $this->discount->vendor_id,
            'code' => $code,
            'status' => $this->discount->status ? true:false ,
        ]);
        if ($this->discount->percent !=null) {
            $gift->update([
               'type'=>0
            ]);
        }
        if ($this->discount->price !=null) {
            $gift->update([
               'type'=>1
            ]);
        }


        $this->discount->date_expire = "";
        $this->discount->price = "";
        $this->discount->percent = "";
        $this->discount->product_id = "";
        $this->discount->category_id = "";
        $this->discount->vendor_id = "";
        $this->discount->status = false;

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن کد تخفیف' . '-' . auth()->user()->name,
            'actionType' => 'ایجاد'
        ]);
        $this->emit('toast', 'success', ' کد تخفیف با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }


    public function disableStatus($id)
    {
        $discount = Discount::find($id);

        $discount->update([
           'status'=>0
        ]);
            Log::create([
                'user_id' => auth()->user()->id,
                'url' => 'غیرفعال کردن کد تخفیف' . '-' . $discount->code,
                'actionType' => 'حذف'
            ]);
            $this->emit('toast', 'success', ' کد تخفیف با موفقیت غیرفعال شد.');

    }


    public function enableStatus($id)
    {
        $discount = Discount::find($id);

        $discount->update([
            'status'=>1
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن کد تخفیف' . '-' . $discount->code,
            'actionType' => 'حذف'
        ]);
        $this->emit('toast', 'success', ' کد تخفیف با موفقیت فعال شد.');

    }


    public function deleteGift($id)
    {
        $discount = Discount::find($id);

        $discount->delete();
        $this->emit('toast', 'success', ' کد تخفیف با موفقیت حذف شد.');

    }


    public function render()
    {

        $discounts = $this->readyToLoad ? Discount::where('code', 'LIKE', "%{$this->search}%")->
        orWhere('price', 'LIKE', "%{$this->search}%")->
        orWhere('percent', 'LIKE', "%{$this->search}%")->
        orWhere('product_id', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];
        return view('livewire.admin.discount.index-discount',compact('discounts'));
    }
}
