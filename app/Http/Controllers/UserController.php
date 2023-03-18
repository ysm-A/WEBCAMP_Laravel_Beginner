<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterPost;
use Illuminate\Support\Facades\Auth;
use App\Models\User as usersModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Show form of user-register
    public function RegHome()
    {
        return view('user/register');
    }
    //Register user info
    public function register(UserRegisterPost $request)
    {
        // return redirect('user/register');
        // validate済みのデータの取得
        $datum = $request->validated();

        $datum['id'] = Auth::id();

        // $datum = $request-&gt;validated();
        $datum['password'] = Hash::make($datum['password']);

        // テーブルへのINSERT
        try {
            $r = usersModel::create($datum);
        }catch(\Throwable $e){
            echo $e->getMessage();
            exit;
        }
        
        $request->session()->flash('front.users_register_success', true);
        
        return redirect('user/register');
        
    }
    

}