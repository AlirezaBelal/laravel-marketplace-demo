<?php

namespace App\Http\Livewire\Admin\Product;

use App\Mail\ProductUpdateNotification;
use App\Models\Category;
use App\Models\Email;
use App\Models\Log;
use App\Models\Product;
use App\Models\SMS;
use Illuminate\Support\Facades\Mail;
use Kavenegar\KavenegarApi;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $img;

    public Product $product;

    protected $rules = [
        'product.title' => 'required|min:3',
        'product.name' => 'required',
        'product.link' => 'required',
        'product.vendor_id' => 'nullable',
        'product.category_id' => 'nullable',
        'product.status_product' => 'nullable',
        'product.subcategory_id' => 'nullable',
        'product.childcategory_id' => 'nullable',
        'product.categorylevel4_id' => 'nullable',
        'product.color_id' => 'nullable',
        'product.brand_id' => 'nullable',
        'product.tags' => 'nullable',
        'product.body' => 'nullable',
        'product.description' => 'nullable',
        'product.price' => 'nullable',
        'product.discount_price' => 'nullable',
        'product.number' => 'nullable',
        'product.weight' => 'nullable',
        'product.view' => 'nullable',
        'product.shipment' => 'nullable',
        'product.publish_product' => 'nullable',
        'product.gift' => 'nullable',
        'product.original' => 'nullable',
        'product.order_count' => 'nullable',
        'product.special' => 'nullable',
    ];

    public function categoryForm()
    {

        $this->validate();
        if ($this->img) {
            $this->product->img = $this->uploadImage();
        }
        $this->product->update($this->validate());
        if ($this->product->publish_product == 1) {
            $notifications = \App\Models\Notification::where('product_id', $this->product->id)->get();
            foreach ($notifications as $notification) {
                if ($notification->system == 1) {
                    $notification->update([
                        'type' => 1,
                    ]);
                }
                if ($notification->sms == 1) {

                    $client = new KavenegarApi(env('KAVENEGAR_CLIENT_API'));
                    $client->send(env('SENDER_MOBILE'), $notification->user->mobile,
                        'کالای شما موجود شد');
                    //                        "کالای شما موجود شد : $notification->product->title");
                    SMS::create([
                        'code' => $notification->user_id,
                        'type' => 'کالای مورد نظر موجود شد:'.$notification->product->title,
                        'user_id' => $notification->user_id,
                    ]);

                }
                if ($notification->email == 1) {
                    Mail::to($notification->user->email)
                        ->send(new ProductUpdateNotification($notification));

                    Email::create([
                        'user_id' => $notification->user->id,
                        'user_email' => $notification->user->email,
                        'user_name' => $notification->user->name,
                        'user_mobile' => $notification->user->mobile,
                        'title' => 'کالای مورد نظر شما موجود شد | '.env('APP_NAME'),
                        'text' => $notification->product->title,
                    ]);
                }
            }

        }

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'آپدیت محصول'.'-'.$this->product->title,
            'actionType' => 'آپدیت',
        ]);
        //        alert()->success(' با موفقیت آپدیت شد.', 'محصول مورد نظر با موفقیت آپدیت شد.');

        return redirect(route('product.index'));

    }

    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "product/$year/$month";
        $name = $this->img->getClientOriginalName();
        $this->img->storeAs($directory, $name);

        return "$directory/$name";
    }

    public Category $category;

    public function render()
    {
        if ($this->product->status_product == 1) {
            $this->product->status_product = true;
        } else {
            $this->product->status_product = false;
        }
        if ($this->product->publish_product == 1) {
            $this->product->publish_product = true;
        } else {
            $this->product->publish_product = false;
        }
        if ($this->product->gift == 1) {
            $this->product->gift = true;
        } else {
            $this->product->gift = false;
        }
        if ($this->product->original == 1) {
            $this->product->original = true;
        } else {
            $this->product->original = false;
        }
        if ($this->product->special == 1) {
            $this->product->special = true;
        } else {
            $this->product->special = false;
        }

        $product = $this->product;

        return view('livewire.admin.product.update', compact('product'));
    }
}
