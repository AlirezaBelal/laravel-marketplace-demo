<?php

namespace App\Http\Livewire\Home\Comment;

use App\Models\Product;
use Livewire\Component;

class Review extends Component
{
    public $product;

    public $color;

    public $comment;

    public \App\Models\Review $review;

    public function mount($id)
    {
        $this->product = Product::find($id);
        $this->review = new \App\Models\Review();
    }

    protected $rules = [
        'review.review' => 'nullable',
        'review.review_title' => 'nullable',
        'review.plus_rate' => 'nullable',
        'review.plus_min' => 'nullable',
        'review.review_hidden' => 'nullable',
        'review.keyfiat_sakht' => 'nullable',
        'review.arzesh_kharid' => 'nullable',
        'review.noavari' => 'nullable',
        'review.emkanat' => 'nullable',
        'review.sohoolate_estefade' => 'nullable',
        'review.zaher' => 'nullable',
    ];

    public function updated($review)
    {
        $this->validateOnly($review);
    }

    public function commentForm()
    {
        $this->validate();
        \App\Models\Review::query()->create([
            'product_id' => $this->product->id,
            'user_id' => auth()->user()->id,
            'parent' => 0,
            'status' => 0,
            'review' => $this->review->review,
            'review_title' => $this->review->review_title,
            'plus_rate' => $this->review->plus_rate,
            'plus_min' => $this->review->plus_min,
            'keyfiat_sakht' => $this->review->keyfiat_sakht,
            'arzesh_kharid' => $this->review->arzesh_kharid,
            'noavari' => $this->review->noavari,
            'emkanat' => $this->review->emkanat,
            'sohoolate_estefade' => $this->review->sohoolate_estefade,
            'zaher' => $this->review->zaher,

            'review_hidden' => $this->review->review_hidden ? 1 : 0,
        ]);

        return $this->redirect('/product/dkp-'.$this->product->id.'/'.$this->product->link);
    }

    public function render()
    {
        $product = $this->product;
        $category = $product->category->title;
        $subcategory = $product->subcategory->title;
        $childcategory = $product->childcategory->title ?? '';
        $categorylevel4 = $product->categorylevel4->title ?? '';

        return view('livewire.home.comment.review',
            compact('product', 'category', 'subcategory', 'childcategory', 'categorylevel4'))
            ->layout('layouts.review');
    }
}
