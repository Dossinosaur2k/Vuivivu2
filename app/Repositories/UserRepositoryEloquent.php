<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\UserRepository;
use App\Entities\User;
use App\Validators\UserValidator;
use Illuminate\Support\Facades\Auth;


/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function getAll()
    {
        
       $users = $this->model()::where('id','<>',Auth::user()->id);
       $users = $this->pagination($users);
       return $users;
    }

    public function createUser($data)
    {
        $user = $this->model()::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
        ]);
        return $user;
    }

    public function updateUser($request,$id)
    {
        if($request->file('image'))
        {    
            $user = $this->model()::findorfail($id);
            
            if($user->cover_image)
            {
                $removeImage = removeFile($user->cover_image);
            }
            $imageName = uploadFile($request);
            $user = $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'cover_image' => $imageName,
            ]);
            
        }
        else {

            $user = $this->model()::findorfail($id)
                            ->update([
                                'name' => $request->name,
                                'email' => $request->email,
                            ]);
        }
        return $user;
    }
    public function pagination($model)
    {
        $perPage = 15;
        $users = $model->paginate(15);
        return $users;
    }

    public function BlockorUnlock($id)
    {
        $user = $this->model()::findorfail($id);
        if($user->status == 1) 
        {
            $user->update([
                'status' => 0,
            ]);
        }
        else
        {
            $user->update([
                'status' => 1,
            ]);
        }
        return $user;
    }

    public function updatePassword($data,$id)
    {
        $user = $this->model()::findorfail($id)
                    ->update([
                        'password' => bcrypt($data['password']),
                    ]);
        return $user;
    }

    public function resetPassword($id)
    {
        $user = $this->model()::findorfail($id)
                    ->update([
                        'password' => bcrypt('12345689'),
                    ]);
        return $user;
    }
}
