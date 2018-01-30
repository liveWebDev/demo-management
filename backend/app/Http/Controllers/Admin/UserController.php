<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Repositories\Admin\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Yajra\Datatables\Datatables;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
      //return view('admin.datatables.index');
      /*  $this->userRepository->pushCriteria(new RequestCriteria($request));
        $users = $this->userRepository->all();*/

        return view('admin.users.index');
    }
  
    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
      $users = $this->userRepository->all();
      return Datatables::of($users)->editColumn('xstatus', function($users) {
        return view('admin.users.xstatus', compact('users'))->render();
      })->editColumn('status', function($users) {
        return view('admin.users.status', compact('users'))->render();
      })/*->editColumn('type', function($users) {
        return view('admin.users.role', compact('users'))->render();
      })*/->make(true);
    }
    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
      $roles  = User::getRules();
      return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        
        $user = $this->userRepository->create($input);
        $role = Role::Find($input['type']);
        $user->attachRole($role); // you can pass whole object, or just an id
        Flash::success('User saved successfully.');

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);
        $roles  = User::getRules();
        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('admin.users.index'));
        }

        return view('admin.users.edit', compact('roles'))->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $user = $this->userRepository->findWithoutFail($id);
        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('admin.users.index'));
        }
        
        $role = Role::find($user->type);
        $user->detachRole($role); // you can pass whole object, or just an id
        
        $user = $this->userRepository->update($request->all(), $id);
        $role = Role::find($request['type']);
        $user->attachRole($role); // you can pass whole object, or just an id

        Flash::success('User updated successfully.');
        return redirect(route('admin.users.index'));
    }
  
  
  /**
   * Day on or off
   * @param Request $request
   * @return mixed
   */
  public function changeUserStatus(Request $request)
  {
    $userId = decrypt($request->get("userId"));
    $status = $request->get("status");
    return User::changeStatus($userId, $status);
  }
  
    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);
        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('admin.users.index'));
        }
        
        $this->userRepository->delete($id);
        Flash::success('User deleted successfully.');
        return redirect(route('admin.users.index'));
    }
}
