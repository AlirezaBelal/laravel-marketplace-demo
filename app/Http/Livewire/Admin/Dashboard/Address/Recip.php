<?php

namespace App\Http\Livewire\Admin\Dashboard\Address;

use App\Models\Log;
use App\Models\ReceiptCenter;
use Livewire\Component;
use Livewire\WithPagination;

class Recip extends Component
{
    use WithPagination;

    protected $listeners = [
        'category.added' => '$refresh',
    ];

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public ReceiptCenter $receiptCenter;

    public function mount()
    {
        $this->receiptCenter = new ReceiptCenter();
    }

    protected $rules = [
        'receiptCenter.address' => 'required|min:3',
        'receiptCenter.status' => 'nullable',
    ];

    public function updated($address)
    {
        $this->validateOnly($address);
    }

    public function categoryForm()
    {

        $this->validate();

        ReceiptCenter::query()->create([
            'address' => $this->receiptCenter->address,
            'status' => $this->receiptCenter->status ? true : false,
        ]);

        $this->receiptCenter->address = '';
        $this->receiptCenter->status = false;

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن آدرس'.'-'.$this->receiptCenter->address,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' آدرس با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function updateCategoryDisable($id)
    {
        $receiptCenter = ReceiptCenter::find($id);
        $receiptCenter->update([
            'status' => 0,
        ]);
        $this->emit('toast', 'success', 'وضعیت آدرس انبار با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $receiptCenter = ReceiptCenter::find($id);
        $receiptCenter->update([
            'status' => 1,
        ]);

        $this->emit('toast', 'success', 'وضعیت آدرس انبار با موفقیت فعال شد.');
    }

    public function deleteCategory($id)
    {
        $receiptCenter = ReceiptCenter::find($id);
        $receiptCenter->delete();
        $this->emit('toast', 'success', ' آدرس با موفقیت حذف شد.');

    }

    public function render()
    {

        $receiptCenters = $this->readyToLoad ? ReceiptCenter::where('address', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.dashboard.address.recip', compact('receiptCenters'));
    }
}
