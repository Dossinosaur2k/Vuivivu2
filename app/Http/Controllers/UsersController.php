<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Repositories\Interfaces\UserRepository;
use App\Repositories\Interfaces\RoleRepository;
use App\Validators\UserValidator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * @var UserValidator
     */
    protected $validator;

    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     * @param UserValidator $validator
     */
    public function __construct(
        UserRepository $user,
        UserValidator $validator,
        RoleRepository $role
    ) {
        $this->user = $user;
        $this->validator  = $validator;
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        // $users = $this->repository->all();

        // if (request()->wantsJson()) {

        //     return response()->json([
        //         'data' => $users,
        //     ]);
        // }
        $users = $this->user->getAll();

        return view('admin.users.all')->with('users', $users);
    }

    public function create()
    {
        $roles = $this->role->getAll();
        return view('admin.users.create')->with('roles', $roles);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UserCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $user = $this->user->createUser($request->all());

            $response = [
                'message' => 'Create user successfully !',
                'data' => $user->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('success', $response['message']);
        } catch (ValidatorException $e) {
            // if ($request->wantsJson()) {
            //     return response()->json([
            //         'error'   => true,
            //         'message' => $e->getMessageBag()
            //     ]);
            // }
            $errors = [
                'message' => 'Create user failed',
                'errorBag' => $e->getMessageBag()->getMessages()
            ];
            //    var_dump($errors);
            return redirect()->back()->with('errors', $errors);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->find($id);


        return view('admin.users.profile')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = $this->role->getAll();
        $user = $this->user->find($id);
        // dd($user);
        $data = [
            'roles' => $roles,
            'user' => $user,
        ];
        return view('admin.users.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function updateProfile(UserUpdateRequest $request, $id)
    {
        // dd($request->all());
        try {


            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            if (Hash::check($request->password, Auth::user()->password)) {


                $user = $this->user->updateUser($request, $id);

                $response = [
                    'message' => 'User profile updated successfully.',

                ];
            } else
                return redirect()->back()->with('error', 'Password not match, please try again');
            if ($request->wantsJson()) {

                return response()->json($response);
            }
            // dd($response);
            return redirect()->back()->with('success', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            $errors = [
                'message' => 'Update profile failed',
                'errorBag' => $e->getMessageBag()->getMessages()
            ];
            dd($errors);
            return redirect()->back()->with('errors', $errors);
        }
    }

    public function update(UserUpdateRequest $request, $id)
    {
        try {


            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);


            $user = $this->user->update($request->all(), $id);


            return redirect()->back()->with('success', 'User profile updated successfully');
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            $errors = [
                'message' => 'Update profile user failed',
                'errorBag' => $e->getMessageBag()->getMessages()
            ];
            // dd($errors);
            return redirect()->back()->with('errors', $errors);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->user->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'User deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('success', 'User deleted.');
    }

    public function handle($id)
    {
        $user = $this->user->BlockorUnlock($id);
        $message = $user->status == 1 ? 'UnLock user successfully' : 'Block user successfully';
        return redirect()->back()->with('success', $message);
    }

    public function changePassword(ChangePasswordRequest $request, $id)
    {

        if ($request->password && $request->password_confirmation) {
            if (Hash::check($request->old_password, Auth::user()->password)) {

                $data = $request->validated();
                // dd($data);
                $user = $this->user->updatePassword($data, $id);

                $response = [
                    'message' => 'User Password updated successfully.',

                ];
                return redirect()->back()->with('success', $response['message']);
            } else {
                $message = $request->old_password ? 'Password not match, please try again !' : '';
                return redirect()->back()->with('password_error', $message);
            }
        } else {
            return redirect()->back();
        }
    }
}
