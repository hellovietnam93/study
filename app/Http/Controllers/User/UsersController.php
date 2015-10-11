<?php

namespace studyhub\Http\Controllers\User;

use Illuminate\Http\Request;

use studyhub\Http\Requests;
use studyhub\Http\Controllers\Controller;

use studyhub\Repositories\Criteria\Users\ActivatedViaEmail;
use studyhub\Repositories\Users\UserRepository as User;

class UsersController extends Controller
{
  private $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }

  public function getActivatedUsers()
  {
    $this->user->pushCriteria(new ActivatedViaEmail());
    return dd($this->user->all());
  }

  public function index()
  {
  }

  public function create()
  {
  }

  public function store(Request $request)
  {
  }

  public function show($id)
  {
  }

  public function edit($id)
  {
  }

  public function update(Request $request, $id)
  {
  }

  public function destroy($id)
  {
  }
}
