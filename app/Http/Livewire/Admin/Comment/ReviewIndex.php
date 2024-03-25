<?php

namespace App\Http\Livewire\Admin\Comment;

use App\Mail\OrderSubmit;
use App\Models\Notification;
use App\Models\Review;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class ReviewIndex extends Component
{
    use WithPagination;

    protected $listeners = [
        'category.added' => '$refresh',
    ];

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;

    public Review $review;

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function updateCategoryDisable($id)
    {
        $review = Review::find($id);
        $review->update([
            'status' => 0,
        ]);

        $this->emit('toast', 'success', 'وضعیت نظر با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $review = Review::find($id);
        $review->update([
            'status' => 1,
        ]);

        $type = 'بررسی شما تایید شد';
        Notification::create([
            'user_id' => $review->user_id,
            'product_id' => $review->product_id,
            'type' => $type,
            'sms' => 0,
            'email' => 1,
            'system' => 1,
            'text' => $review->product->title,
        ]);

        $email = \App\Models\Email::create([
            'user_id' => $review->user_id,
            'user_email' => $review->user->email,
            'user_mobile' => $review->user->mobile,
            'title' => 'نظر شما تایید شد',
            'text' => 'نظر شما تایید شد',
            'code' => 'نظر شما تایید شد',
        ]);

        Mail::to($review->user->email)->send(new OrderSubmit($email));

        $this->emit('toast', 'success', 'وضعیت نظر با موفقیت فعال شد.');
    }

    public function vip($id)
    {
        $review = Review::find($id);
        $review->update([
            'ok_buy' => 1,
        ]);

        $this->emit('toast', 'success', 'وضعیت نظر با موفقیت غیرفعال شد.');
    }

    public function dvip($id)
    {
        $review = Review::find($id);
        $review->update([
            'ok_buy' => 0,
        ]);

        $this->emit('toast', 'success', 'وضعیت نظر با موفقیت فعال شد.');
    }

    public function deleteCategory($id)
    {
        $review = Review::find($id);
        $review->delete();
        $this->emit('toast', 'success', ' نظر با موفقیت حذف شد.');

    }

    public function render()
    {

        $reviews = $this->readyToLoad ? Review::where('review', 'LIKE', "%{$this->search}%")->
        orWhere('review_title', 'LIKE', "%{$this->search}%")->
        orWhere('plus_rate', 'LIKE', "%{$this->search}%")->
        orWhere('plus_min', 'LIKE', "%{$this->search}%")->
        orWhere('product_id', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];

        return view('livewire.admin.comment.review-index', compact('reviews'));
    }
}
