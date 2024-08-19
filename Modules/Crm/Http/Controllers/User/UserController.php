<?php

namespace Modules\Crm\Http\Controllers\User;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Crm\Entities\City;
use Modules\Crm\Entities\State;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('crm::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('crm::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(User $user)
    {
        return view('crm::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('crm::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Auth $user )
    {

        $request->validate(
            [
                'username'          =>'nullable|max:200|regex:/^(?=[a-zA-Z0-9._]{3,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/u',
                'fname'             =>'nullable|persian_alpha',
                'lname'             =>'nullable|persian_alpha',
                'fname_en'          =>'nullable|regex:/[a-zA-Z]/',
                'lname_en'          =>'nullable|regex:/[a-zA-Z]/',
                'codemelli'         =>'nullable|melli_code|unique:users,codemelli,'.Auth::user()->id,
                'sex'               =>'nullable|boolean',
                'tel'               =>'nullable|string|unique:users,tel,'.Auth::user()->id,
                'shenasname'        =>'nullable|numeric|',
                'datebirth'         =>'nullable|max:11|string',
                'father'            =>'nullable|persian_alpha|',
                'born'              =>'nullable|persian_alpha|',
                'married'           =>'nullable|boolean',
                'education'         =>'nullable|persian_alpha',
                'reshteh'           =>'nullable|persian_alpha',
                'job'               =>'nullable|persian_alpha',
                'state_id'          =>'nullable|numeric',
                'city_id'           =>'nullable|numeric',
                'address'           =>'nullable|min:4|string',
                'personal_image'    =>'nullable|mimes:jpeg,jpg,bmp,png|max:600',
                'shenasnameh_image' =>'nullable|mimes:jpeg,jpg,bmp,png|max:600',
                'cartmelli_image'   =>'nullable|mimes:jpeg,jpg,bmp,png|max:600',
                'education_image'   =>'nullable|mimes:jpeg,jpg,bmp,png|max:600',
                'resume'            =>'nullable|mimes:docx,doc,pdf,jpg,png|max:1024',
                'email'             =>'nullable|email|',
                'gettingknow'       =>'nullable|numeric',
                'gettingknow_child' =>'nullable|numeric',
                'introduced'        =>'nullable|numeric',
                'telegram'          =>'nullable|max:50|regex:/^[a-zA-Z0-9._]+$/u',
                'instagram'         =>'nullable|max:50|regex:/^[a-zA-Z0-9._]+$/u',
                'linkedin'          =>'nullable|string|max:200',
                'aboutme'           =>'nullable|string|max:200',
            ]);

        if ($request->has('personal_image') && $request->file('personal_image')->isValid())
        {

            $file = $request->file('personal_image');
            $personal_image = "personal_".Auth::user()->id."_".time().".".$request->file('personal_image')->extension();

            $path = public_path('documents/users/');
            $request->file('personal_image')->move($path, $personal_image);
//            $img=Image::make($files->getRealPath())
//                ->resize(300,null,function ($constraint) {
//                    $constraint->aspectRatio();
//                })
//                ->save($path.'small-'.$personal_image);
//            $img=Image::make($files->getRealPath())
//                ->resize(50,null,function ($constraint) {
//                    $constraint->aspectRatio();
//                })
//                ->save($path.'thumbnail-'.$personal_image);
            $request->personal_image = $personal_image;
        }

        if ($request->has('shenasnameh_image') && $request->file('shenasnameh_image')->isValid()) {
            $file = $request->file('shenasnameh_image');
            $shenasnameh_image = "shenasnameh_".Auth::User()->id."_".time().".".$request->file('shenasnameh_image')->extension();
            $path = public_path('/documents/users/');
            $files = $request->file('shenasnameh_image')->move($path, $shenasnameh_image);
            $request->shenasnameh_image = $shenasnameh_image;

        }

        if ($request->has('cartmelli_image') && $request->file('cartmelli_image')->isValid()) {
            $file = $request->file('cartmelli_image');
            $cartmelli_image = "cartmelli_image_".Auth::User()->id."_".time().".". $request->file('cartmelli_image')->extension();
            $path = public_path('/documents/users/');
            $request->file('cartmelli_image')->move($path, $cartmelli_image);
            $request->cartmelli_image = $cartmelli_image;
        }

        if ($request->has('education_image') && $request->file('education_image')->isValid()) {
            $file = $request->file('education_image');
            $education_image = "education_".Auth::user()->id."_".time().".".$request->file('education_image')->extension();
            $path = public_path('/documents/users/');
            $request->file('education_image')->move($path, $education_image);
            $request->education_image = $education_image;
        }

        if ($request->has('resume') && $request->file('resume')->isValid()) {
            $file = $request->file('resume');
            $resume = "resume_".Auth::user()->id."_".time().".".$request->file('resume')->extension();
            $path = public_path('/documents/users/');
            $files = $request->file('resume')->move($path, $resume);
            $request->resume = $resume;
        }

        Auth::user()->update($request->all());

        if (isset($personal_image)) {
            Auth::user()->personal_image = $personal_image;
        }

        if (isset($shenasnameh_image)) {
            Auth::user()->shenasnameh_image = $shenasnameh_image;
        }

        if (isset($cartmelli_image)) {
            Auth::user()->cartmelli_image = $cartmelli_image;
        }

        if (isset($education_image)) {
            Auth::user()->education_image = $education_image;
        }

        if (isset($resume)) {
            Auth::user()->resume = $resume;
        }

        Auth::user()->save();

        alert()->success('پروفایل با موفقیت به روزرسانی شد','پیام')->persistent('بستن');

        return back();



    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function profile()
    {
        $states=State::get();
        $cities=City::get();
        return view('crm::user.profile')
                        ->with('states',$states)
                        ->with('cities',$cities);
    }
}
