<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Filters\UserFilter;

class UsersController extends Controller
{
    /**
     * @param UserFilter $filter
     * @return array
     */
    public function index(UserFilter $filter)
    {
        $users = User::filter($filter)->paginate(20);

        return response()->json($users,200);
    }
}