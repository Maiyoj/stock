<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Item;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Notifications\Welcome;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');


       $this->middleware('permission:user|user|user|user', ['only' => ['index','store']]);
        $this->middleware('permission:user', ['only' => ['create','store']]);
        $this->middleware('permission:user', ['only' => ['edit','update']]);
        $this->middleware('permission:user', ['only' => ['destroy']]);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users=User::whereDoesntHave('roles', function($q){$q->where('name', 'admin');})->get();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'password'=>[
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
                #'confirmed'
            ],

            
        ]);

        $user = User::where('email',$request->email)->first();
        if(!$user)
        {
            $user=new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->assignRole($request->input('roles'));
            $user->save();
    
            Notification::send($user,new Welcome());
        }
        else{
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->assignRole($request->input('roles'));
            $user->deleted_at = null;
            $user->save();
            
            Notification::send($user,new Welcome());
        }
       
        return redirect()->route('user.index')->with('success','User added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);

        return view('users.show', compact('users'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
    
        return view('user.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'password'=>'required|string'
        ]);

        $user=User::findOrFail($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->assignRole($request->input('roles'));
        $user->save();

        return redirect()->route('user.index')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success','User delete successfully');
    }
    public function deleteAll(Request $request)
    { 
        $ids = $request->ids;
		User::whereIn('id', $ids)->delete();
        return response()->json(['success'=>"Items have been deleted!"]);
		 redirect()->route('item.index')->with('success', 'Item deleted successfully');
    }
}
