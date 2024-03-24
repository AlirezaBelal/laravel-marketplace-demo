<?php

namespace App\Http\Livewire\Admin\Product\ProductVendor;

use App\Mail\OrderSubmit;
use App\Models\Log;
use App\Models\Notification;
use App\Models\Product;
use App\Models\ProductSeller;
use App\Models\ProductSellTest;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $img;
    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public ProductSeller $productSeller;

    public function mount()
    {
        $this->productSeller = new ProductSeller();
    }


    protected $rules = [
        'productSeller.product_id' => 'nullable',
        'productSeller.vendor_id' => 'required',
        'productSeller.time' => 'required',
        'productSeller.warranty_id' => 'required',
        'productSeller.price' => 'required',
        'productSeller.discount_price' => 'required',
        'productSeller.color_id' => 'required',
        'productSeller.product_count' => 'required',
        'productSeller.limit_order' => 'required',
        'productSeller.status' => 'nullable',
        'productSeller.anbar' => 'nullable',
    ];

    public function updated($title)
    {
        $this->validateOnly($title);
    }


    public function categoryForm()
    {
        $this->validate();
        $this->productSeller->save();
        if (!$this->productSeller->status) {
            $this->productSeller->update([
                'status' => 0
            ]);
        }
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن تنوع قیمت محصول' . '-' . $this->productSeller->product_id,
            'actionType' => 'ایجاد'
        ]);
        $this->emit('toast', 'success', ' تنوع قیمت محصول با موفقیت ایجاد شد.');

    }

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function updateCategoryDisable($id)
    {
        $productSeller = ProductSeller::find($id);
        $productSeller->update([
            'status' => 0
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن وضعیت تنوع قیمت محصول' . '-' . $this->productSeller->product_id,
            'actionType' => 'غیرفعال'
        ]);
        $this->emit('toast', 'success', 'وضعیت تنوع قیمت محصول با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $productSeller = ProductSeller::find($id);
        $productSeller->update([
            'status' => 1
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن وضعیت تنوع قیمت محصول' . '-' . $this->productSeller->product_id,
            'actionType' => 'فعال'
        ]);
        $this->emit('toast', 'success', 'وضعیت تنوع قیمت محصول با موفقیت فعال شد.');
    }

    public function updateAnbarDisable($id)
    {
        $productSeller = ProductSeller::find($id);
        $productSeller->update([
            'anbar' => 0
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'غیرفعال کردن موجودی انبار فروشنده در تنوع قیمت محصول' . '-' . $this->productSeller->product_id,
            'actionType' => 'غیرفعال'
        ]);
        $this->emit('toast', 'success', 'موجودی انبار فروشنده در تنوع قیمت محصول با موفقیت غیرفعال شد.');
    }

    public function updateAnbarEnable($id)
    {
        $productSeller = ProductSeller::find($id);
        $productSeller->update([
            'anbar' => 1
        ]);
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'فعال کردن موجودی انبار فروشنده در تنوع قیمت محصول' . '-' . $this->productSeller->product_id,
            'actionType' => 'فعال'
        ]);
        $this->emit('toast', 'success', 'موجودی انبار فروشنده در تنوع قیمت محصول با موفقیت فعال شد.');
    }

    public function OkNewProduct($id)
    {
        $pro = ProductSellTest::find($id);
        $product = Product::create([
            'title' => $pro->title,
            'name' => $pro->ename,
            'link' => $pro->ename,
            'vendor_id' => $pro->user_id,
            'category_id' => $pro->cat_id,
            'subcategory_id' => $pro->cat2_id,
            'childcategory_id' => $pro->cat3_id,
            'categorylevel4_id' => $pro->cat4_id,
            'brand_id' => $pro->brand_id,
            'status_product' => 0,
            'body' => $pro->detail_product,
            'original' => $pro->original,
            'weight' => $pro->weight,
            'img' => $pro->img,
            'number' => 1,
        ]);
        $type = 'سفارش شما ثبت شد';
        Notification::create([
            'user_id' => $pro->user_id,
            'product_id' => $product->id,
            'type' => $type,
            'sms' => 1,
            'email' => 1,
            'system' => 1,
            'text' => $product->id,
        ]);
        $email = \App\Models\Email::create([
            'user_id' => $pro->user_id,
            'user_email' => $pro->user->email,
            'user_mobile' => $pro->user->mobile,
            'title' => 'محصول ارسالی شما پذیرفته شد',
            'text' => 'محصول ارسالی شما در دیجی کالا پذیرفته شد',
            'code' => 'محصول شما پذیرفته  شد',
        ]);

        Mail::to($pro->user->email)->send(new OrderSubmit($email));

        $pro->delete();
        $this->emit('toast', 'success', 'محصول با موفقیت ساخته شد .');

    }


    public function deleteCategory($id)
    {
        $productSeller = ProductSeller::find($id);
        $productSeller->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'حذف کردن تنوع قیمت محصول' . '-' . $this->productSeller->product_id,
            'actionType' => 'حذف'
        ]);
        $this->emit('toast', 'success', ' تنوع قیمت محصول با موفقیت حذف شد.');
    }


    public function render()
    {

        $productSellers = $this->readyToLoad ? ProductSeller::where('product_id', 'LIKE', "%{$this->search}%")->
        orWhere('vendor_id', 'LIKE', "%{$this->search}%")->
        orWhere('time', 'LIKE', "%{$this->search}%")->
        orWhere('warranty_id', 'LIKE', "%{$this->search}%")->
        orWhere('price', 'LIKE', "%{$this->search}%")->
        orWhere('color_id', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        $productTest = ProductSellTest::
        latest()->paginate(15);

        return view('livewire.admin.product.product-vendor.index',
            compact('productSellers', 'productTest'));
    }
}
