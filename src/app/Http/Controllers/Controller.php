<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var int
     */
    protected int $userId;

    /**
     * @var bool
     */
    protected bool $isAdmin;

    /**
     * Create a new Controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $this->userId = $user->user_id ?? 0;
        $this->isAdmin = $user->is_admin ?? false;
    }
}
