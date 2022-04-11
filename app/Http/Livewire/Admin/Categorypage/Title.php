<?php

namespace App\Http\Livewire\Admin\Categorypage;

use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Title extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public $title;
    public $link;
    public $c_id;
    public $search;


    protected $queryString = ['search'];

    public $readyToLoad = false;


    public function categoryForm()
    {
        $titles = DB::connection('mysql-category')->table('category_title_swiper')->insert([
            'title' => $this->title,
            'link' => $this->link,
            'c_id' => $this->c_id,
        ]);
        $this->title = "";
        $this->link = "";
        $this->c_id = false;
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن عناوین' . '-' . $this->title,
            'actionType' => 'ایجاد'
        ]);
        $this->emit('toast', 'success', ' عناوین با موفقیت ایجاد شد.');

    }


    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function deleteCategory($id)
    {
        $banner2 = DB::connection('mysql-category')->table('category_title_swiper')
            ->where('id', $id)->first();
        $banner = DB::connection('mysql-category')->table('category_title_swiper')
            ->where('id', $id)->limit($id);
        $banner->delete();

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن عناوین' . '-' . $banner2->title,
            'actionType' => 'حذف'
        ]);
        $this->emit('toast', 'success', ' عناوین با موفقیت حذف شد.');

    }

    public function render()
    {

        $titles = $this->readyToLoad ? DB::connection('mysql-category')->table('category_title_swiper')
            ->where('title', 'LIKE', "%{$this->search}%")->
            orWhere('id', $this->search)->
            latest()->paginate(15) : [];
        return view('livewire.admin.categorypage.title',compact('titles'));
    }
}
