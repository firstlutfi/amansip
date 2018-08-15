<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{
    // region properties
    /**
     * @var \Cartenz\Framework\Membership\DataModel\User|null
     */
    protected $currentUser;

    // region constructor
    public function __construct() {

        parent::__construct();

    }
    // endregion

    // region load current user
    /**
     * set this controller's Current User from Authentication Guard
     */
    protected function loadCurrentUser() {
        $this->currentUser = Auth::user();
    }
    // endregion
}