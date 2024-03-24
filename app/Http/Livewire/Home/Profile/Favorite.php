<?php

namespace App\Http\Livewire\Home\Profile;

use App\Models\FavList;
use Illuminate\Support\Str;
use Livewire\Component;

class Favorite extends Component
{
    public FavList $favList;

    public function mount()
    {
        $this->favList = new FavList();
    }

    protected $rules = [
        'favList.title' => 'required',
        'favList.description' => 'nullable',
    ];

    public function updated($title)
    {
        $this->validateOnly($title);
    }

    public function favlistForm()
    {

        $this->validate();

        $favList = FavList::create([
            'title' => $this->favList->title,
            'description' => $this->favList->description,
            'link' => Str::random('6'),
            'user_id' => auth()->user()->id,
        ]);
        $this->emit('toast', 'success', ' لیست اضافه شد!');

        return $this->redirect(request()->header('Referer'));
    }

    public function deleteFavorite($id)
    {

        $favorites = \App\Models\Favorite::where('id', $id)->first();
        $favorites->delete();
        $this->emit('toast', 'success', 'محصول از لیست علاقه مندی های شما حذف شد.');
    }

    public function deleteObserved($id)
    {
        $observed = \App\Models\Observed::where('id', $id)->first();
        $observed->delete();
        $this->emit('toast', 'success', 'محصول از لیست اطلاع رسانی های شما حذف شد.');
    }

    public function render()
    {
        return view('livewire.home.profile.favorite')->layout('layouts.home');
    }
}
