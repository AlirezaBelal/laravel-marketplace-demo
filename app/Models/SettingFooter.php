<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingFooter extends Model
{
    use HasFactory;
    protected $fillable = [
        'footer_more_info_copyright', 'footer_more_info_title', 'footer_more_info_description', 'footer_more_info_category',
        'footer_more_info_safety-partner1', 'footer_more_info_safety-partner2', 'footer_more_info_safety-partner3', 'footer_more_info_brand',
        'footer_top_middlebar_link_col1', 'footer_top_middlebar_link_col1_ul', 'footer_top_middlebar_link_col2', 'footer_top_middlebar_link_col2_ul',
        'footer_top_middlebar_link_col3_ul', 'footer_top_address_contact1', 'footer_top_address_contact2', 'footer_top_address_contact3',
        'footer_top_address_images_appstore', 'footer_top_address_images_cafebazar', 'footer_top_address_images_miket',
        'footer_top_address_images_sibapp', 'footer_top_social_link',
    ];
}
