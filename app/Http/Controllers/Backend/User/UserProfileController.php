<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\Backend\UserRequest;
use App\Models\Backend\News\Blog;
use App\Models\Backend\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserProfileController extends BaseController
{
    protected string $module = BACKEND;
    protected string $route_name = BACKEND.'user.';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    protected User $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request){
        //
    }


    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show($slug)
    {
        $user           = User::where('slug',$slug)->first();
        $blogs          = Blog::all()->take(5);
        $alluser        = User::all()->take(5)->except(Auth::user()->id);

        return view('backend.user.profile',compact('user','blogs','alluser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $slug
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function edit($slug)
    {
        $user           =  User::where('slug',$slug)->first();

        return view('backend.user.profile-edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user                 =  User::find($id);
        $user->name           =  $request->input('name');
        $user->slug           =  strtolower(str_replace(' ','-',$request->input('name')));
        $user->email          =  $request->input('email');
        $user->gender         =  $request->input('gender');
        $user->contact        =  $request->input('contact');
        $user->user_type      =  $request->input('user_type');
        $user->address        =  $request->input('address');
        $user->about          =  $request->input('about');
        $oldimage             = $user->image;
        $oldcover             = $user->cover;

        $status = $user->update();
        if($status){
            Session::flash(SUCCESS,'Changes were applied successfully');

        }
        else{
            Session::flash(ERROR,'Something Went Wrong. Changes could not be applied.');
        }
        return redirect()->route('profile',$user->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $delete          = User::find($id);
        $id              = $delete->id;
        if (!empty($delete->image) && file_exists(public_path().'/images/user/'.$delete->image)){
            @unlink(public_path().'/images/user/'.$delete->image);
        }
        if (!empty($delete->cover) && file_exists(public_path().'/images/user/cover/'.$delete->cover)){
            @unlink(public_path().'/images/user/cover/'.$delete->cover);
        }
        $status = $delete->delete();
        if($status){
            return response()->json(['status'=>SUCCESS,'id'=>$id,'message'=>'User and its data was removed!']);
        }
        else{
            $status = ERROR;
            return response()->json(['status'=>ERROR,'id'=>$id,'message'=>'User could not be removed at the moment. Try Again later !']);
        }
    }

    public function profile($slug){

    }

    public function profileEdit($slug){

    }

    public function imageupdate(Request $request)
    {
        $user      = User::find($request->input('userid'));
        $name      = $request->input('name');
        if (!empty($request->file('image')) && $name =='image' ){
            $oldimage  = $user->image;
            $image       = $request->file('image');
            $name1       = uniqid().'_user_'.$image->getClientOriginalName();
            $path        = base_path().'/public/images/user/';

            if (!is_dir($path)) {
                mkdir($path, 0777);
            }
            $moved       = Image::make($image->getRealPath())->fit(200, 200, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
                $constraint->upsize();
            })->orientate()->save($path.$name1);

            if ($moved){
                $user->image = $name1;
                if (!empty($oldimage) && file_exists(public_path().'/images/user/'.$oldimage)){
                    @unlink(public_path().'/images/user/'.$oldimage);
                }
            }
        }

        if (!empty($request->file('image')) && $name =='cover'){
            $oldimage  = $user->cover;
            $image       = $request->file('image');
            $name1       = uniqid().'_cover_'.$image->getClientOriginalName();
            $path        = base_path().'/public/images/user/cover/';
            if (!is_dir($path)) {
                mkdir($path, 0777);
            }
            $moved       = Image::make($image->getRealPath())->fit(2000, 850)->orientate()->save($path.$name1);

            if ($moved){
                $user->cover= $name1;
                if (!empty($oldimage) && file_exists(public_path().'/images/user/cover/'.$oldimage)){
                    @unlink(public_path().'/images/user/cover/'.$oldimage);
                }
            }
        }

        $status = $user->update();
        if($status){
            $status = SUCCESS;
        }else{
            $status = FAILED;
        }
         return response()->json(['status'=>$status,'image'=>$name1]);
    }

    public function checkoldpassword(Request $request){
        $user          = User::find($request->input('userid'));
        $incoming_pass = $request->input('oldpassword');
        if($incoming_pass == null){
            $status =ERROR;
            return response()->json(['status'=>$status,'message'=>'Please enter old password for verification first !']);
        }
        if (!Hash::check($incoming_pass, $user->password)) {
            $status =ERROR;
            return response()->json(['status'=>$status,'message'=>'The old password does not match our records.']);
        }else{
            $status =SUCCESS;
            return response()->json(['status'=>$status,'message'=>'Password check completed. Its a match !']);
        }
    }

    public function socialsUpdate(Request $request)
    {
        $user                 =  User::find( $request->input('userid'));
        $user->fb             =  $request->input('fb');
        $user->insta          =  $request->input('insta');
        $user->linkedin       =  $request->input('linkedin');
        $user->twitter        =  $request->input('twitter');
        $status               = $user->update();
        if ($status) {
            $status =SUCCESS;
            return response()->json(['status'=>$status,'message'=>'Your socials are updated.']);

        }else{
            $status =ERROR;
            return response()->json(['status'=>$status,'message'=>'Social information could not updated']);
        }
    }

    public function profilepassword(Request $request){
        $id                 = $request->input('userid');
        $user               = User::find($id);
        $password           = Hash::make($request->input('password'));
        $user->password     = $password;
        $status             = User::where('id', $id)->update(array('password' => $password));
        if($status){
            $status =SUCCESS;
            return response()->json(['status'=>$status,'message'=>'Password has been changed !']);        }
        else{
            $status =ERROR;
            return response()->json(['status'=>$status,'message'=>'Your password could not be updated. Try Again later !']);
        }
    }

    public function removeAccount(Request $request){
        $id               = $request->input('userid');
        $user             = User::find($id);
        $cover            = $user->cover;
        $image            = $user->image;
        if (!empty($image) && file_exists(public_path().'/images/user/'.$image)){
            @unlink(public_path().'/images/user/'.$image);
        }
        if (!empty($cover) && file_exists(public_path().'/images/user/cover/'.$cover)){
            @unlink(public_path().'/images/user/cover/'.$cover);
        }
        $removeacc          = $user->delete();
        if($removeacc){
            $status =SUCCESS;
            return response()->json(['status'=>$status,'message'=>'Your account information has been removed! You will be logged out now.']);        }
        else{
            $status =ERROR;
            return response()->json(['status'=>$status,'message'=>'Account could not be removed. Try Again later !']);
        }
    }

}
