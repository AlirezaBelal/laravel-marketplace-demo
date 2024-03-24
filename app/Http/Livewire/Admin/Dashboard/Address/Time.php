<?php

namespace App\Http\Livewire\Admin\Dashboard\Address;

use App\Models\AddressTime;
use Livewire\Component;
use Livewire\WithPagination;

class Time extends Component
{
    use WithPagination;

    protected $listeners = [
        'category.added' => '$refresh',
    ];

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public AddressTime $addressTime;

    public function mount()
    {
        $this->addressTime = new AddressTime();
    }

    protected $rules = [
        'addressTime.day' => 'nullable',
        'addressTime.date' => 'nullable',
        'addressTime.time' => 'nullable',
        'addressTime.price' => 'nullable',
    ];

    public function updated($day)
    {
        $this->validateOnly($day);
    }

    public function categoryForm()
    {

        $this->validate();

        AddressTime::query()->create([
            'day' => $this->addressTime->day,
            'time' => $this->addressTime->time,
            'date' => $this->addressTime->date,
            'price' => $this->addressTime->price,
        ]);

        $this->addressTime->day = '';
        $this->addressTime->time = '';
        $this->addressTime->date = '';
        $this->addressTime->price = '';
        $this->emit('toast', 'success', ' زمان ارسال با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function deleteCategory($id)
    {
        $times = AddressTime::find($id);
        $times->delete();
        $this->emit('toast', 'success', ' زمان ارسال با موفقیت حذف شد.');

    }

    public function render()
    {

        $addressTimes = $this->readyToLoad ? AddressTime::where('day', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.dashboard.address.time', compact('addressTimes'));
    }
}
