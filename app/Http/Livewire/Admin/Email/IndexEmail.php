<?php

namespace App\Http\Livewire\Admin\Email;

use App\Models\Attribute;
use App\Models\ChildCategory;
use App\Models\Email;
use Livewire\Component;
use Livewire\WithPagination;

class IndexEmail extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public Email $email;
    public $search;

    protected $queryString = ['search'];

    public $readyToLoad = false;


    public function loadCategory()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {

        $emails = $this->readyToLoad ? Email::where('title', 'LIKE', "%{$this->search}%")->
        orWhere('user_name', 'LIKE', "%{$this->search}%")->
        orWhere('user_email', 'LIKE', "%{$this->search}%")->
        orWhere('user_mobile', 'LIKE', "%{$this->search}%")->
        orWhere('text', 'LIKE', "%{$this->search}%")->
            paginate(15): [];

        return view('livewire.admin.email.index-email',compact('emails'));
    }
}
