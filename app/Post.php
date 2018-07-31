<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model
{
    use SearchableTrait;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'body',
    ];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'title' => 1,
            'body' => 1,
        ],
    ];

    public function getLinksAttribute()
    {
        return collect([
            'self' => new Link([
                'method' => 'get',
                'action' => route('api.posts.show', $this->id),
            ]),
            'update' => new Link([
                'method' => 'put',
                'action' => route('api.posts.update', $this->id),
            ]),
            'delete' => new Link([
                'method' => 'delete',
                'action' => route('api.posts.destroy', $this->id),
            ]),
        ]);
    }
}
