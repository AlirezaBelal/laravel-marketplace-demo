<?php

namespace App\Http\Livewire\Admin\Comment;

use App\Mail\OrderSubmit;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Log;
use App\Models\Notification;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CommentIndex extends Component
{

    use WithPagination;

    protected $listeners = [
        'category.added' => '$refresh'
    ];
    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];
    public $readyToLoad = false;
    public Comment $comment;

    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function updateCategoryDisable($id)
    {
        $comment = Comment::find($id);
        $comment->update([
            'status' => 0
        ]);

        $this->emit('toast', 'success', 'وضعیت نظر با موفقیت غیرفعال شد.');
    }

    public function updateCategoryEnable($id)
    {
        $comment = Comment::find($id);

        $comment->update([
            'status' => 1
        ]);
        $type = 'نظر شما تایید شد';
        Notification::create([
            'user_id' => $comment->user_id,
            'product_id' => $comment->product_id,
            'type' => $type,
            'sms' => 0,
            'email' => 1,
            'system' => 1,
            'text' => $comment->product->title,
        ]);

        $email = \App\Models\Email::create([
            'user_id' => $comment->user_id,
            'user_email' => $comment->user->email,
            'user_mobile' => $comment->user->mobile,
            'title' => 'نظر شما تایید شد',
            'text' => 'نظر شما تایید شد',
            'code' => 'نظر شما تایید شد',
        ]);

        Mail::to($comment->user->email)->send(new OrderSubmit($email));


        $this->emit('toast', 'success', 'وضعیت نظر با موفقیت فعال شد.');
    }

    public function deleteCategory($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        $this->emit('toast', 'success', ' نظر با موفقیت حذف شد.');

    }


    public function render()
    {

        $comments = $this->readyToLoad ? Comment::where('comment', 'LIKE', "%{$this->search}%")->
        orWhere('user_id', 'LIKE', "%{$this->search}%")->
        orWhere('product_id', 'LIKE', "%{$this->search}%")->
        orWhere('id', $this->search)->
        latest()->paginate(15) : [];
        return view('livewire.admin.comment.comment-index', compact('comments'));
    }
}
