<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Category;
use App\Models\Log;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ReturnReason extends Component
{
    use WithPagination;

    protected $listeners = [
        'category.added' => '$refresh'
    ];
    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public \App\Models\ReturnReason $returnReason;

    public function mount()
    {
        $this->returnReason = new \App\Models\ReturnReason();
    }



    protected $rules = [
        'returnReason.reason' => 'nullable',
    ];

    public function updated($reason)
    {
        $this->validateOnly($reason);
    }


    public function categoryForm()
    {

        $this->validate();

         \App\Models\ReturnReason::query()->create([
            'reason' => $this->returnReason->reason,
        ]);


        $this->returnReason->reason = "";

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن دلیل مرجوعی' .'-'. $this->returnReason->reason,
            'actionType' => 'ایجاد'
        ]);
        $this->emit('toast', 'success', ' دلیل مرجوعی با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function deleteCategory($id)
    {
        $reason = \App\Models\ReturnReason::find($id);
        $reason->delete();
            $this->emit('toast', 'success', ' دلیل مرجوعی با موفقیت حذف شد.');

    }


    public function render()
    {

        $returnReasons = $this->readyToLoad ? \App\Models\ReturnReason::where('reason', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.order.return-reason',compact('returnReasons'));
    }
}
