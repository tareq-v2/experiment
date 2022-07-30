<?php

namespace Database\Seeders;

use App\Models\ColorSetting;
use Illuminate\Database\Seeder;

class ColorSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ColorSetting::create([
            'primary_color'    => '#f44336',
            'secondary_color'  => '#ff9800',   
            'button_color'     => '#ff9800',
            'hover_color'      => '#ff9800',
            'text_color'       => '#ffffff',
            'bg_color'         => '#000000',
        ]);
    }
}
