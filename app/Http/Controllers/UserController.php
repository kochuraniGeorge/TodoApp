<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login');
    }
    public function signup()
    {
        return view('signup');
    }

    public function mandatory(Request $request)
    {
        //to see wh we're getting in post
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4|confirmed',
        ]);

        if ($validator->fails()) {
            // dd($validator->errors()->all());
            // echo 'error';die;
            return redirect('signup')
                ->withErrors($validator)
                ->withInput();
        }
        // dd($request['name']);
        User::create([
            'full_name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        return redirect()->back()->with('success', 'Signup completed successfully');
    }
    public function authenticate(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
            // dd($request->all());
        ]);
        // dd(  $request->password);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('homePage');
            // echo 'save succss';die; 
        } else {
            echo 'error';
            die;
            return back()->withErrors(['message' => 'Invalid credentials'])->withInput();
        }
    }
    public function homePage()
    { //dd(auth()->check());
        return view('homePage');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
    public function profilePic()
    { 
        // dd('here');
        return view('profile');
    }
    public function profileMandatory(Request $request)
    {    
        $user = Auth::user();                                   
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|max:12',  
            'photo' => 'required', 
        ]); // dd('here');
        if ($validator->fails()) { // dd($validator->errors()->all());// echo 'error';die;
            return redirect('profile')
                ->withErrors($validator)
                ->withInput();
        }
        $imagePath = $request->file('photo')->store('images', 'public');
        //store method to save uploaded file to a storage location
        //this pc->D->laravel->ToDoApp->storage->app->public->image
        // echo $imagePath;die;
        Profile::create([
            'phone_number' => $request['phone'],
            'profile_picture_data' => $imagePath, //saving this path in the 'profile_picture_data' column of the model/table, // ..which associate a user with their profile picture.
            'created_by_p'=>$user->id //collect id of user from user table  
        ]);
        return redirect('homePage')
            ->with('successPhotoUpdation', 'Profile Photo Updated successfully');
    }
    public function yourTasks()
    {
        return view('yourTasks');
    }
    ////////////////////////////////////////////////////////////



   
 public function viewProfilePic()
    {
        //  dd('here');
        $user = Auth::user();
        //?????with()
        $photoAndNumber= Profile::with('profileRelationWithUser')->where('created_by_p',$user->id)->first();     
        // dd( $photoAndNumber);
        $imagePath= $photoAndNumber->profile_picture_data;
        //  dd( $imagePath);
        $imageUrl = asset("storage/$imagePath"); //asset - generates url for assets like image
        //  dd( $imageUrl);
        //prepend "storage/" to the image path because files stored in the public disk are accessible via URLs starting with "storage/".
        return view('photo', [ 'imageUrl'=>$imageUrl,'photoAndNumber'=>$photoAndNumber]); 
                //as i have to pass 2 variables named $photoAndNumber and $imageUrl write as above.next method is compact method given blw
                // return view('photo', compact( 'imageUrl','photoAndNumber');  
                //php artisan storage:link(reason in chatGPT)        
    }







    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function datas()
    // {
    //     dd('here');
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
