<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurant::updateOrCreate(
            [
                'slug' => 'sergella',
            ],
            [
                'name' => 'سيرجيلا',
                'description' => 'مطعم سيرجيلا - دمشق، القيمرية',
                'logo' => 'restaurants/coffee_shop_logo.png',
                'phone' => '0999999999',
                'address' => 'دمشق - القيمرية',
                'primary_color' => '#830000',
                'secondary_color' => '#FFFFFF',
                'is_active' => true,
            ]
        );
    }
}
