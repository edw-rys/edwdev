<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class ViewsRepository
{
    use BaseRepository;

    /**
     * The model being queried.
     *
     * @var Model
     */
    protected $model;

    /**
     * Constructor
     */
    public function __construct()
    {
        // Setup the model
        $this->model = app(\App\Models\Views::class);
    }
}
