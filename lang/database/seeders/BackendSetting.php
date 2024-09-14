<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BackendSettings;
class BackendSetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Backend=[
            [
                'logo'=>'test.jpg',
                'institute_name'=>'Institute',
                'favicon'=>'Icon',
                'site_title'=>'Site Title',
                'sub_title'=>'Sub Title',
                'address'=>'Address',
                'phone'=>'Phone',
                'email'=>'Email',
                'starting_year'=>'2024',
                'meta_title'=>'meta title',
                'meta_description'=>'meta description',
                'meta_keywords'=>'meta Keywords',
                'facebook'=>'facebook',
                'footer'=>'footer',
                'twitter'=>'twitter',
                'linkedin'=>'linkedin',
                'instragram'=>'instragram',
            ],

        ];
          BackendSettings::insert($Backend);
    }
}
