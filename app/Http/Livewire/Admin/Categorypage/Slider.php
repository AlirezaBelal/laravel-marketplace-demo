<?php

namespace App\Http\Livewire\Admin\Categorypage;

use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Slider extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $img;
    public $title;
    public $link;
    public $c_id;
    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;


    public function categoryForm()
    {
        $slider = DB::connection('mysql-category')->table('category_slider')->insert([
            'title' => $this->title,
            'link' => $this->link,
            'c_id' => $this->c_id,
            'status' => 1,
        ]);
        $slider2 = DB::connection('mysql-category')->table('category_slider')
            ->where('link', $this->link)->first();

        $slider3 = DB::connection('mysql-category')->table('category_slider')
            ->where('id', $slider2->id)->limit($slider2->id);
        if ($this->img) {
            $slider3->update([
                'img' => $this->uploadImage()
            ]);
        }

        $this->title = "";
        $this->link = "";
        $this->img = null;
        $this->c_id = false;
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن اسلایدر' . '-' . $this->title,
            'actionType' => 'ایجاد'
        ]);
        $this->emit('toast', 'success', ' اسلایدر با موفقیت ایجاد شد.');

    }

    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "categorypage/$year/$month";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);
        return "$directory/$name";
    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function deleteCategory($id)
    {
        $slider2 = DB::connection('mysql-category')->table('category_slider')
            ->where('id', $id)->first();
        $slider = DB::connection('mysql-category')->table('category_slider')
            ->where('id', $id)->limit($id);
        Storage::disk('public')->delete("storage", $slider2->img);
        $slider->delete();

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن اسلایدر' . '-' . $slider2->title,
            'actionType' => 'حذف'
        ]);
        $this->emit('toast', 'success', ' اسلایدر با موفقیت حذف شد.');

    }

    public function updateCategoryDisable($id)
    {
        $slider2 = DB::connection('mysql-category')->table('category_slider')
            ->where('id', $id)->first();
        $slider = DB::connection('mysql-category')->table('category_slider')
            ->where('id', $id)->limit($id);

        $slider->update([
            'status' => 0
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن اسلایدر' . '-' . $slider2->title,
            'actionType' => 'غیرفعال'
        ]);
        $this->emit('toast', 'success', 'اسلایدر با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $slider2 = DB::connection('mysql-category')->table('category_slider')
            ->where('id', $id)->first();
        $slider = DB::connection('mysql-category')->table('category_slider')
            ->where('id', $id)->limit($id);
        $slider->update([
            'status' => 1
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن اسلایدر' . '-' . $slider2->title,
            'actionType' => 'فعال'
        ]);
        $this->emit('toast', 'success', 'اسلایدر با موفقیت فعال شد.');
    }

    public function render()
    {

        $sliders = $this->readyToLoad ? DB::connection('mysql-category')->table('category_slider')
            ->where('title', 'LIKE', "%{$this->search}%")->
            orWhere('link', 'LIKE', "%{$this->search}%")->
            orWhere('id', $this->search)->
            latest()->paginate(15) : [];
        return view('livewire.admin.categorypage.slider',compact('sliders'));
    }
}
