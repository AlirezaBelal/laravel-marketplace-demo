<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\Component;

class GlobalSearch extends Component
{
    public string $search = '';
    public array $results = [];
    public array $searchable = [];

    protected array $rules = [
        'search' => 'required|min:3'
    ];

    public function mount()
    {
        $this->searchable = [
            Product::class => ['title', 'img'],
            Category::class => ['title'],
            SubCategory::class => ['title'],
            ChildCategory::class => ['title'],
        ];
    }

    public function updatedSearch()
    {
        $this->reset('results');
        $this->validateOnly('search');
        $this->getSearchResults();
    }

    public function resetForm()
    {
        $this->reset(['search', 'results']);
    }

    public function render()
    {
        return view('livewire.global-search');
    }

    public function getSearchResults()
    {

        foreach ($this->searchable as $model => $columns) {
            $model_key = Str::camel(class_basename($model));

            $query = (new $model())->query();

            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . $this->search . '%');
            }
            foreach ($columns as $field) {
                $queryResult = $query->take(10)->get();
                if ($queryResult->count() > 0) {
                    $this->results[$model_key] = $queryResult->map(function ($resource) use ($field) {

                        $fields = [];
                        $route_params = [];
                        $field_key = Str::ucfirst($field);
                        $route_key = Str::plural(Str::kebab(class_basename($resource)));
                        $route_params[] = $resource->id;
                        $img[] = $resource->img;
                        $name[] = $resource->title;
                        $link[] = $resource->link;

                        $fields[$field_key] = $resource->{$field};

                        return [
//                          'linkTo' => route($route_key.'.show',$route_params),
                            'fields' => $fields,
                            'img' => $img,
                            'name' => $name,
                            'id' => $route_params,
                            'link' => $link,
                        ];
                    });
                }
            }


        }
    }
}
