<?php

namespace Modules\Crm\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Crm\Entities\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if($request->has('q'))
        {
            $users=User::where('fname','like',"%".$request->q."%")
                        ->orwhere('lname','like',"%".$request->q."%")
                        ->orwhere('tel','like',"%".$request->q."%")
                        ->orderby('id','desc')
                        ->get();
        }
        else
        {
            $users=User::orderby('id','desc')
                            ->get();
        }


        return view('crm::admin.users.users_all',compact('users'));
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
    public function show(User $User)
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
    public function update(Request $request, $id)
    {
        //
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


    public function createExcel()
    {

        return view('crm::admin.users.excelImport');
    }

    //ثبت اطلاعات کاربر از طریق اکسل
    public function storeExcel(Request $request)
    {
        $request->validate( [
            'excel'     =>['required','mimes:xlsx,csv'],
        ]);

        $collection = fastexcel()->import($request->file('excel'));


        $i=0;
        foreach ($collection as $item)
        {
            if(!isset($item['email'])|| strlen($item['email'])==0)
            {
                $item['email']=NULL;

            }

            //چک کردن تلفن ورودی و حذف ابتدای +98 و 0
            $item['tel']=str_replace('+98','',$item['tel']);
            $item['tel']=str_replace('+','',$item['tel']);
            $item['tel']=(ltrim($item['tel'], '0'));

            $user=User::orwhere('tel','=',$item['tel'])
                            ->when($item['email'],function($query,$item)
                            {
                                return $query->orwhere('email', '=', $item);
                            })
                            ->first();

            if(is_null($user))
            {
                $item['password']=Hash::make('1234');
                $status=User::create($item);
                if($status)
                {
                    $i++;
                }
            }
        }
        alert()->success("تعداد".$i."نفر وارد بانک اطلاعاتی شدند",'پیام')->persistent('بستن');
        return back();
    }

    //لاگین کاربر از طریق ادمین
    public function loginWithUser(User $User)
    {
        session()->put('admin','');
        session()->put('admin',Auth::user()->id);
        $status=Auth::loginUsingId($User->id);
        if($status)
        {
            alert()->warning('شما با اکانت '.$User->fname.' '.$User->lname.' وارد سایت شدید. ')->persistent('بستن');
            return redirect('/panel');
        }
        else
        {
            alert()->error('خطا در ورود به سایت')->persistent('بستن');
            return back();
        }

    }


}
