<?php

namespace App\Observers;

use App\Models\User;
use App\Services\ElasticsearchService;

class UserObserver
{
    protected $es;

    public function __construct(ElasticsearchService $es)
    {
        $this->es = $es;
    }

    public function created(User $user)
    {
        $this->es->indexUser($user);
    }

    public function updated(User $user)
    {
        $this->es->indexUser($user);
    }

    public function deleted(User $user)
    {
        $this->es->deleteUser($user->id);
    }
}
