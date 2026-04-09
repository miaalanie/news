<?php

namespace Database\Seeders;

use App\Models\DefaultSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DefaultSetting::create([
            'en' => [
                'app_name' => 'Spy News',
                'support_phone' => '+62 (266) 20229715',
                'support_email' => 'diskominfo@sukabumikota.go.id',
                'address' => 'Jl. Syamsudin. SH No.25, Cikole, Kec. Cikole, Kota Sukabumi, Jawa Barat 43113',
            ],
            'bn' => [
                'app_name' => 'Spy News',
                'support_phone' => '+62 (266) 20229715',
                'support_email' => 'diskominfo@sukabumikota.go.id',
                'address' => 'Jl. Syamsudin. SH No.25, Cikole, Kec. Cikole, Kota Sukabumi, Jawa Barat 43113',
            ],
            'app_url' => 'http://127.0.0.1:8000',
            'time_zone' => 'UTC',
            'favicon' => 'default_favicon.png',
            'logo_photo' => 'default_logo_photo.png',
            'created_by' => 1,
        ]);
    }
}
