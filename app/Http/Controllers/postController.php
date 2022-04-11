<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\NewsLetter;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function newsletter(Request $request)
    {
        $newsletter = NewsLetter::where('email', $request->email)->first();
        if ($newsletter) {
            alert()->error(' ایمیل شما قبلا در  خبرنامه ثبت شده است.', 'ایمیل وجود دارد.');
        } else {
            NewsLetter::create([
                'email' => $request->email
            ]);
            alert()->success(' ایمیل شما با موفقیت در خبرنامه ثبت شد.', 'با تشکر');
        }
        return back();
    }

    public function shipping(Request $request)
    {

        \App\Models\Address::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'vahed' => $request->vahed,
            'code_posti' => $request->code_posti,
            'lname' => $request->lname,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'bld_num' => $request->bld_num,
            'city' => $request->city,
            'state' => $request->state,
        ]);

        alert()->success(' آدرس با موفقیت ثبت شد.', 'ثبت آدرس');

        return back();
    }

    public function shipping_delete($id)
    {
        $address = Address::find($id);
        $address->delete();

        alert()->success(' آدرس با موفقیت حذف شد.', 'حذف آدرس');

        return back();
    }
}
