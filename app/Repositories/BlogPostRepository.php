<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogPostRepository extends CoreRepository
{
    protected function getModelClass(): string
    {
        return Model::class;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);


    }

    public function getForComboBox()
    {
        // return $this->startConditions()->all();
        $columns = implode(', ',
            ['id',
                'CONCAT (id, ". ", title) AS id_title',
            ]);

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();
      //  dd($result->first());

                return $result;

    }
/* @return LengthAwarePaginator **/
    public function getAllWithPaginate($perPage = 25) //список статей для страницы
    {
        $columns = [
            'id',
            'title',
            'slug',
            'published_at',
            'is_published',
            'user_id',
            'category_id',
        ];
        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with([
                'category'=>function($query){
                $query->select(['id', 'title']);
                },
                'user:id,name'
            ])
            ->paginate($perPage);
        return $result;
    }
}
