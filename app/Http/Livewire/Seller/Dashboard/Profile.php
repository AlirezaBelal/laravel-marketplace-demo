<?php

namespace App\Http\Livewire\Seller\Dashboard;

use App\Models\Seller;
use App\Models\SellerDoc;
use App\Models\Store;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use function Symfony\Component\DomCrawler\first;

class Profile extends Component
{

    use WithFileUploads;

    public $aboutUs;
    public $website;
    public $store_name;
    public $store_state;
    public $store_city;
    public $store_address;
    public $store_code;
    public $store_telephone;
    public $address;
    public $docType;
    public $docImage;


    public function form_seller()
    {
        $user = auth()->user()->mobile;
        $seller = Seller::where('mobile', $user)->first();
        $seller->update([
            'about' => $this->aboutUs,
            'website' => $this->website,
            'address' => $this->address,
        ]);
        $store = Store::where('user_id', auth()->user()->id)->first();
        $store->update([
            'store_name' => $this->store_name,
            'store_state' => $this->store_state,
            'store_city' => $this->store_city,
            'store_address' => $this->store_address,
            'store_code' => $this->store_code,
            'store_telephone' => $this->store_telephone,
        ]);
        $sellerDoc = SellerDoc::create([
            'type' => $this->docType,
            'status' => 0,
            'user_id' => auth()->user()->id,
            'date_expire' => Carbon::now(),
        ]);
        if ($this->docImage) {
            $sellerDoc->update([
                'img' => $this->uploadImageDoc()
            ]);
        }

    }

    public function uploadImageDoc()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "docseller/$year/$month";
        $name = $this->docImage->getClientOriginalName();
        $this->docImage->storeAs($directory, $name);
        return "$directory/$name";
    }

    public function updateRet($id)
    {
        $store = Store::where('user_id', $id)->first();
        if ($store) {
            if ($store->store_back == 1) {
                $store->update([
                    'store_back' => 0
                ]);
            } else {
                $store->update([
                    'store_back' => 1
                ]);
            }

        } else {
            Store::create([
                'personal' => 1,
                'user_id' => $id,
                'store_back' => 1
            ]);
        }

    }

    public function addToLearning($id)
    {
        $seller = Seller::where('id', $id)->first();
        $seller->update([
            'learning_status' => 0
        ]);
    }

    public function deleteDoc($id)
    {
        $doc = SellerDoc::find($id);
        $doc->forceDelete();
    }

    public function render()
    {
        $user = auth()->user()->mobile;
        $seller = Seller::where('mobile', $user)->first();

        $aboutUs = $this->aboutUs;
        return view('livewire.seller.dashboard.profile', compact('seller', 'aboutUs'))
            ->layout('layouts.seller_dashboard');
    }
}
