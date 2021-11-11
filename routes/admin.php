<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//======================================>admin/dashboard
Route::get('/', \App\Http\Livewire\Admin\Dashboard\Index::class)
    ->name('admin.index');

//=======================================>LogSystem
Route::get('/log', \App\Http\Livewire\Admin\Log\Index::class)
    ->name('log.index');

//=======================================> //category//
Route::get('/category', \App\Http\Livewire\Admin\Category\Index::class)
    ->name('category.index');

Route::get('/subcategory', \App\Http\Livewire\Admin\Subcategory\Index::class)
    ->name('subcategory.index');

Route::get('/childcategory', \App\Http\Livewire\Admin\Childcategory\Index::class)
    ->name('childcategory.index');

Route::get('/categorylevel4', \App\Http\Livewire\Admin\categorylevel4\Index::class)
    ->name('categorylevel4.index');

//=============================================================> //category//update//
Route::get('/category/update/{category}', \App\Http\Livewire\Admin\Category\Update::class)
    ->name('category.update');

Route::get('/subcategory/update/{subcategory}', \App\Http\Livewire\Admin\Subcategory\Update::class)
    ->name('subcategory.update');

Route::get('/childcategory/update/{childcategory}', \App\Http\Livewire\Admin\Childcategory\Update::class)
    ->name('childcategory.update');

Route::get('/categorylevel4/update/{categorylevel4}', \App\Http\Livewire\Admin\categorylevel4\Update::class)
    ->name('categorylevel4.update');

//=============================================================> //category//trashed//
Route::get('/category/trashed', \App\Http\Livewire\Admin\Category\Trashed::class)
    ->name('category.trashed');

Route::get('/subcategory/trashed', \App\Http\Livewire\Admin\Subcategory\Trashed::class)
    ->name('subcategory.trashed');

Route::get('/childcategory/trashed', \App\Http\Livewire\Admin\Childcategory\Trashed::class)
    ->name('childcategory.trashed');

Route::get('/categorylevel4/trashed', \App\Http\Livewire\Admin\categorylevel4\Trashed::class)
    ->name('categorylevel4.trashed');

//=======================================> //product//
Route::get('/product', \App\Http\Livewire\Admin\Product\Index::class)
    ->name('product.index');

Route::get('/product/create', \App\Http\Livewire\Admin\Product\Create::class)
    ->name('product.create');

Route::get('/product/update/{product}', \App\Http\Livewire\Admin\Product\Update::class)
    ->name('product.update');

Route::get('/product/trashed', \App\Http\Livewire\Admin\Product\Trashed::class)
    ->name('product.trashed');

//=======================================> //brands//
Route::get('/brand', \App\Http\Livewire\Admin\Brand\Index::class)
    ->name('brand.index');

Route::get('/brand/update/{brand}', \App\Http\Livewire\Admin\Brand\Update::class)
    ->name('brand.update');

Route::get('/brand/trashed', \App\Http\Livewire\Admin\Brand\Trashed::class)
    ->name('brand.trashed');

//=======================================> //product . Color//
Route::get('/color', \App\Http\Livewire\Admin\Product\Color\Index::class)
    ->name('color.index');

Route::get('/color/update/{color}', \App\Http\Livewire\Admin\Product\Color\Update::class)
    ->name('color.update');

Route::get('/color/trashed', \App\Http\Livewire\Admin\Product\Color\Trashed::class)
    ->name('color.trashed');

//=======================================> //product . Gallery//
Route::get('/gallery', \App\Http\Livewire\Admin\Product\Gallery\Index::class)
    ->name('gallery.index');

Route::get('/gallery/update/{gallery}', \App\Http\Livewire\Admin\Product\Gallery\Update::class)
    ->name('gallery.update');

Route::get('/gallery/product/{product}', \App\Http\Livewire\Admin\Product\Gallery\Product::class)
    ->name('product.gallery_image');

//=======================================> //warranties//
Route::get('/warranty', \App\Http\Livewire\Admin\Product\Warranty\Index::class)
    ->name('warranty.index');

Route::get('/warranty/update/{warranty}', \App\Http\Livewire\Admin\Product\Warranty\Update::class)
    ->name('warranty.update');

Route::get('/warranty/trashed', \App\Http\Livewire\Admin\Product\Warranty\Trashed::class)
    ->name('warranty.trashed');

//=======================================> //Multiple sales//
Route::get('/productVendor', \App\Http\Livewire\Admin\Product\ProductVendor\Index::class
)->name('productVendor.index');

Route::get('/productVendor/create', \App\Http\Livewire\Admin\Product\ProductVendor\Create::class)
    ->name('productVendor.create');

Route::get('/productVendor/update/{productSeller}', \App\Http\Livewire\Admin\Product\ProductVendor\Update::class)
    ->name('productSeller.update');

Route::get('/productVendor/trashed', \App\Http\Livewire\Admin\Product\ProductVendor\Trashed::class)
    ->name('productVendor.trashed');

Route::get('/productVendor/product/{product}', \App\Http\Livewire\Admin\Product\ProductVendor\Single::class)
    ->name('product.productVendor');

//=======================================> //Attribute//
Route::get('/attribute', \App\Http\Livewire\Admin\Product\Attribute\Index::class)
    ->name('attribute.index');

Route::get('/attribute/update/{attribute}', \App\Http\Livewire\Admin\Product\Attribute\Update::class)
    ->name('attribute.update');

Route::get('/attribute/trashed', \App\Http\Livewire\Admin\Product\Attribute\Trashed::class)
    ->name('attribute.trashed');

Route::get('/attribute/category/{category}', \App\Http\Livewire\Admin\Product\Attribute\Category::class)
    ->name('category.attribute');

//=======================================> //َAttribute Value//
Route::get('/attributeValue', \App\Http\Livewire\Admin\Product\attributeValue\Index::class)
    ->name('attributeValue.index');

Route::get('/attributeValue/update/{attribute}', \App\Http\Livewire\Admin\Product\attributeValue\Update::class)
    ->name('attributeValue.update');

Route::get('/attributeValue/trashed', \App\Http\Livewire\Admin\Product\attributeValue\Trashed::class)
    ->name('attributeValue.trashed');

Route::get('/attribute/product/{product}', \App\Http\Livewire\Admin\Product\Attribute\Product::class)
    ->name('product.attribute');

//=======================================> //page//
Route::get('/page', \App\Http\Livewire\Admin\Page\Index::class)
    ->name('page.index');

Route::get('/page/update/{page}', \App\Http\Livewire\Admin\Page\Update::class)
    ->name('page.update');

Route::get('/page/trashed', \App\Http\Livewire\Admin\Page\Trashed::class)
    ->name('page.trashed');

//=======================================> //newsletter//
Route::get('/newsletter', \App\Http\Livewire\Admin\NewsLetter\Index::class)
    ->name('newsletter.index');

Route::get('/social', \App\Http\Livewire\Admin\Social\Index::class)
    ->name('social.index');


/////////////////////////////////////////////Settings
//=======================================> //footer//
Route::get('/footer', \App\Http\Livewire\Admin\Footer\Innerbox\Index::class)
    ->name('footer.index');

Route::get('/footer/link1', \App\Http\Livewire\Admin\Footer\Link\One::class)
    ->name('footer.link_1');

Route::get('/footer/link2', \App\Http\Livewire\Admin\Footer\Link\Two::class)
    ->name('footer.link_2');

Route::get('/footer/link3', \App\Http\Livewire\Admin\Footer\Link\Three::class)
    ->name('footer.link_3');

Route::get('/footer/linktitle', \App\Http\Livewire\Admin\Footer\Link\Title::class)
    ->name('footer_page_title.index');

Route::get('/footer/linktitle/update/{footer_page}', \App\Http\Livewire\Admin\Footer\Link\TitleUpdate::class)
    ->name('footer_page_title.update');

Route::get('/footer/title', \App\Http\Livewire\Admin\Footer\Title\Index::class)
    ->name('footer_title.index');

Route::get('/footer/title/update/{footer_title}', \App\Http\Livewire\Admin\Footer\Title\Update::class)
    ->name('footer_title.update');

Route::get('/footer/partner', \App\Http\Livewire\Admin\Footer\Link\Partner::class)
    ->name('footer.partner');

//=======================================> //Header//
Route::get('/header', \App\Http\Livewire\Admin\Site\Header\Index::class)
    ->name('header.index');

Route::get('/header/update/{header}', \App\Http\Livewire\Admin\Site\Header\Update::class)
    ->name('header.update');

//=======================================> //Menu Category//
Route::get('/menu', \App\Http\Livewire\Admin\Menu\Index::class)
    ->name('menu.index');

Route::get('/menu/update/{menu}', \App\Http\Livewire\Admin\Menu\Update::class)
    ->name('menu.update');


Route::get('/index/title', \App\Http\Livewire\Admin\Index\Title\Index::class)
    ->name('index.title.index');

Route::get('/index/title/update/{index}', \App\Http\Livewire\Admin\Index\Title\Update::class)
    ->name('index.title.update');

Route::get('/index/category', \App\Http\Livewire\Admin\Index\Category\Index::class)
    ->name('index.category.index');

Route::get('/index/newselected', \App\Http\Livewire\Admin\Product\Selected\NewProduct::class)
    ->name('index.newselected.index');

Route::get('/index/productselected', \App\Http\Livewire\Admin\Product\Selected\ProductSelected::class)
    ->name('index.productselected.index');


//=======================================> //Ads//
Route::get('/ads', \App\Http\Livewire\Admin\Ads\Index::class)
    ->name('ads.index');

Route::get('/ads/update/{ads}', \App\Http\Livewire\Admin\Ads\Update::class)
    ->name('ads.update');

//=======================================> //banner//
Route::get('/banner', \App\Http\Livewire\Admin\Banner\Index::class)
    ->name('banner.index');

Route::get('/banner/update/{banner}', \App\Http\Livewire\Admin\Banner\Update::class)
    ->name('banner.update');

//=======================================> //profile Banner//
Route::get('/bannerprofile', \App\Http\Livewire\Admin\Banner\ProfileBanner::class)
    ->name('profileBanner.index');

Route::get('/bannerprofile/update/{banner}', \App\Http\Livewire\Admin\Banner\ProfileBannerUpdate::class)
    ->name('ProfileBanner.update');

//=======================================> //slider//
Route::get('/slider', \App\Http\Livewire\Admin\Slider\Index::class)
    ->name('slider.index');

Route::get('/slider/update/{slider}', \App\Http\Livewire\Admin\Slider\Update::class)
    ->name('slider.update');

//=======================================> //Special//
Route::get('/special/product', \App\Http\Livewire\Admin\Special\Product\Index::class)
    ->name('special.product.index');


//=======================================>//Category Page
Route::get('/category/slider', \App\Http\Livewire\Admin\Categorypage\Slider::class)
    ->name('category.slider');

Route::get('/category/amazing', \App\Http\Livewire\Admin\Categorypage\Amazing::class)
    ->name('category.amazing');

Route::get('/category/title', \App\Http\Livewire\Admin\Categorypage\Title::class)
    ->name('category.title');

Route::get('/category/product', \App\Http\Livewire\Admin\Categorypage\Product::class)
    ->name('category.product');

Route::get('/category/banner', \App\Http\Livewire\Admin\Categorypage\Banner::class)
    ->name('category.banner');

Route::get('/category/brand', \App\Http\Livewire\Admin\Categorypage\Brand::class)
    ->name('category.brand');


Route::get('/category-level', \App\Http\Livewire\Admin\Categorypage\Categorylevel::class)
    ->name('category.level');


///////////////////////////////////////////////users
//=======================================> //sellers//
Route::get('/seller', \App\Http\Livewire\Admin\Seller\Index::class)
    ->name('seller.index');

Route::get('/seller/create', \App\Http\Livewire\Admin\Seller\Create::class)
    ->name('seller.create');

Route::get('/seller/update/{seller}', \App\Http\Livewire\Admin\Seller\Update::class)
    ->name('seller.update');

//=======================================> //Dashboard//
Route::get('/dashboard/favorite', \App\Http\Livewire\Admin\Dashboard\Favorite::class)
    ->name('dashboard.favorite');

Route::get('/dashboard/observed', \App\Http\Livewire\Admin\Dashboard\Observed::class)
    ->name('dashboard.observed');

Route::get('/dashboard/favlist', \App\Http\Livewire\Admin\Dashboard\FavlistProfile::class)
    ->name('dashboard.favlist');

Route::get('/dashboard/favlist/{favlist}', \App\Http\Livewire\Admin\Dashboard\FavlistProfileShow::class)
    ->name('dashboard.favlist.show');

Route::get('/dashboard/address', \App\Http\Livewire\Admin\Dashboard\Address::class)
    ->name('dashboard.address');





////=======================================> //electronic-devices// حالت چند دیتابیسی
//Route::get('/category/electronic/slider',\App\Http\Livewire\Admin\Categorypage\Electronic\Slider::class)
//->name('category.electronic.slider');

//Route::get('/category/electronic/amazing',\App\Http\Livewire\Admin\Categorypage\Electronic\Amazing::class)
//->name('category.electronic.amazing');

//Route::get('/category/electronic/banner',\App\Http\Livewire\Admin\Categorypage\Electronic\Banner::class)
//->name('category.electronic.banner');

//Route::get('/category/electronic/title',\App\Http\Livewire\Admin\Categorypage\Electronic\Title::class)
//->name('category.electronic.title');

//Route::get('/category/electronic/product',\App\Http\Livewire\Admin\Categorypage\Electronic\Product::class)
//->name('category.electronic.product');

////=======================================> //vehicle//
//Route::get('/category/vehicle/slider',\App\Http\Livewire\Admin\Categorypage\Vehicle\Slider::class)
//->name('category.vehicle.slider');

//Route::get('/category/vehicle/amazing',\App\Http\Livewire\Admin\Categorypage\Vehicle\Amazing::class)
//->name('category.vehicle.amazing');

//Route::get('/category/vehicle/title',\App\Http\Livewire\Admin\Categorypage\Vehicle\Title::class)
//->name('category.vehicle.title');

//Route::get('/category/vehicle/product',\App\Http\Livewire\Admin\Categorypage\Vehicle\Product::class)
//->name('category.vehicle.product');

//Route::get('/category/vehicle/banner',\App\Http\Livewire\Admin\Categorypage\Vehicle\Banner::class)
//->name('category.vehicle.banner');

////=======================================> //apparel//
//Route::get('/category/apparel/slider',\App\Http\Livewire\Admin\Categorypage\Apparel\Slider::class)
//->name('category.apparel.slider');

//Route::get('/category/apparel/amazing',\App\Http\Livewire\Admin\Categorypage\Apparel\Amazing::class)
//->name('category.apparel.amazing');

//Route::get('/category/apparel/title',\App\Http\Livewire\Admin\Categorypage\Apparel\Title::class)
//->name('category.apparel.title');

//Route::get('/category/apparel/product',\App\Http\Livewire\Admin\Categorypage\Apparel\Product::class)
//->name('category.apparel.product');

//Route::get('/category/apparel/banner',\App\Http\Livewire\Admin\Categorypage\Apparel\Banner::class)
//->name('category.apparel.banner');

//Route::get('/category/apparel/brand',\App\Http\Livewire\Admin\Categorypage\Apparel\Brand::class)
//->name('category.apparel.brand');

////=======================================> //child//
//Route::get('/category/child/slider',\App\Http\Livewire\Admin\Categorypage\Child\Slider::class)
//->name('category.child.slider');

//Route::get('/category/child/amazing',\App\Http\Livewire\Admin\Categorypage\Child\Amazing::class)
//->name('category.child.amazing');

//Route::get('/category/child/title',\App\Http\Livewire\Admin\Categorypage\Child\Title::class)
//->name('category.child.title');

//Route::get('/category/child/product',\App\Http\Livewire\Admin\Categorypage\Child\Product::class)
//->name('category.child.product');

//Route::get('/category/child/banner',\App\Http\Livewire\Admin\Categorypage\Child\Banner::class)
//->name('category.child.banner');

//Route::get('/category/child/brand',\App\Http\Livewire\Admin\Categorypage\Child\Brand::class)
//->name('category.child.brand');
