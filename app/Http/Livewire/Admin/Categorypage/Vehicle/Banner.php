<?php

namespace App\Http\Livewire\Admin\Categorypage\Vehicle;

use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Banner extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $img;

    public $title;

    public $link;

    public $type;

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public function categoryForm()
    {
        $banner = DB::connection('mysql-vehicle')->table('category_vehicle_banner')->insert([
            'title' => $this->title,
            'link' => $this->link,
            'type' => $this->type,
        ]);
        $banner2 = DB::connection('mysql-vehicle')->table('category_vehicle_banner')
            ->where('link', $this->link)->first();

        $banner3 = DB::connection('mysql-vehicle')->table('category_vehicle_banner')
            ->where('id', $banner2->id)->limit($banner2->id);

        if ($this->img) {
            $banner3->update([
                'img' => $this->uploadImage(),
            ]);
        }

        $this->title = '';
        $this->link = '';
        $this->type = false;
        $this->img = null;
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن بنر'.'-'.$this->title,
            'actionType' => 'ایجاد',
        ]);
        $this->emit('toast', 'success', ' بنر با موفقیت ایجاد شد.');

    }

    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "categorypage/vehicle/$year/$month";
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
        $banner2 = DB::connection('mysql-vehicle')->table('category_vehicle_banner')
            ->where('id', $id)->first();
        $banner = DB::connection('mysql-vehicle')->table('category_vehicle_banner')
            ->where('id', $id)->limit($id);
        Storage::disk('public')->delete('storage', $banner2->img);
        $banner->delete();

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن بنر'.'-'.$banner2->title,
            'actionType' => 'حذف',
        ]);
        $this->emit('toast', 'success', ' بنر با موفقیت حذف شد.');

    }

    public function render()
    {

        $banners = $this->readyToLoad ? DB::connection('mysql-vehicle')->table('category_vehicle_banner')
            ->where('title', 'LIKE', "%{$this->search}%")->
            orWhere('link', 'LIKE', "%{$this->search}%")->
            orWhere('id', $this->search)->
            latest()->paginate(15) : [];

        return view('livewire.admin.categorypage.vehicle.banner', compact('banners'));
    }
}
