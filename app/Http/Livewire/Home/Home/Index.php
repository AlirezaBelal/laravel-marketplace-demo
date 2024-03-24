<?php

namespace App\Http\Livewire\Home\Home;

use App\Models\FooterLinkTitle;
use App\Models\NewsLetter;
use App\Models\Notification;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
class Index extends Component
{

    public function render()
    {

//auth()->loginUsingId(1);

        $ip = Request::ip();
        if (auth()->user()){
            $no = Notification::where('user_id',auth()->user()->id)->
            where('type','ip')->get()->last();

            if ($no != null) {

                if ($no->ip != $ip) {

                    $type = 'ip';
                    $ip = Request::ip();
                    Notification::create([
                        'user_id' => auth()->user()->id,
                        'type' => $type,
                        'sms' => 0,
                        'email' => 0,
                        'ip' => $ip,
                        'system' => 1,
                        'text' => ' هشدار: یک ورود موفق با آی پی ' . $ip . ' در سیستم ثبت شده است. ',
                    ]);
                }

            }elseif($no == null){

                $type = 'ip';
                $ip = Request::ip();
                Notification::create([
                    'user_id' => auth()->user()->id,
                    'type' =>$type,
                    'sms' =>0,
                    'ip' =>$ip,
                    'email' =>0,
                    'system' =>1,
                    'text' =>' هشدار: یک ورود موفق با آی پی '.$ip.' در سیستم ثبت شده است. ',
                ]);
            }


        }



        SEOMeta::setTitle('Home');
        SEOMeta::setDescription('This is my page description');
        SEOMeta::setCanonical('https://codecasts.com.br/lesson');

        OpenGraph::setDescription('This is my page description');
        OpenGraph::setTitle('Home');
        OpenGraph::setUrl('http://current.url.com');
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Homepage');
        TwitterCard::setSite('@LuizVinicius73');

        JsonLd::setTitle('Homepage');
        JsonLd::setDescription('This is my page description');
        JsonLd::addImage('https://codecasts.com.br/img/logo.jpg');

        // OR

        SEOTools::setTitle('Home');
        SEOTools::setDescription('This is my page description');
        SEOTools::opengraph()->setUrl('http://current.url.com');
        SEOTools::setCanonical('https://codecasts.com.br/lesson');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');
//        $this->seo()
//            ->setTitle(' ')
//            ->setDescription('هر آنچه که نیاز دارید با بهترین قیمت از دیجی‌کالا بخرید! جدیدترین انواع گوشی موبایل، لپ تاپ، لباس، لوازم آرایشی و بهداشتی، کتاب، لوازم خانگی، خودرو و... با امکان تعویض و مرجوعی آسان | ✓ارسال رايگان ✓پرداخت در محل ✓ضمانت بازگشت کالا - برای خرید کلیک کنید!')
//        ;
//        SEOMeta::addKeyword(['فروشگاه اینترنتی', 'خرید آنلاین', 'تبلت', 'لپ تاپ', 'تلویزیون', 'کامپیوتر', 'دوربین', 'کتاب','لوازم' , 'عطر و ادکلن', 'فروش اینترنتی','دیجی‌کالا']);
        return view('livewire.home.home.index')->layout('layouts.home');
    }
}
