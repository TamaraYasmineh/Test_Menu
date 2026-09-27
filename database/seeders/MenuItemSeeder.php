<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'category_slug' => 'Pies',
                'name' => 'لبنة مع خضار',
                'slug' => 'Labaneh_with_vegetables',
                'description' => 'صاج لبنة مع خضار من اختيارك',
                'price' => 18000,
                'image' => 'menu-items/labaneh.jpg',
                'is_available' => 1,
                'sort_order' => 1
            ],
            [
                'category_slug' => 'Pies',
                'name' => 'زعتر',
                'slug' => 'Zaatar',
                'description' => 'صاج زعتر أخضر او احمر ',
                'price' => 18000,
                'image' => 'menu-items/zaatar.png',
                'is_available' => 1,
                'sort_order' => 2
            ],

            [
                'category_slug' => 'Hot_Drinks',
                'name' => 'شاي',
                'slug' => 'Tea',
                'description' => 'كوب شاي سيلاني سادة ',
                'price' => 10000,
                'image' => 'menu-items/tea.png',
                'is_available' => 1,
                'sort_order' => 1
            ],
            [
                'category_slug' => 'Hot_Drinks',
                'name' => 'متة',
                'slug' => 'Matteh',
                'description' => '',
                'price' => 10000,
                'image' => 'menu-items/matteh.png',
                'is_available' => 1,
                'sort_order' => 2
            ],
            [
                'category_slug' => 'Hot_Drinks',
                'name' => 'نسكافيه',
                'slug' => 'Nescafe',
                'description' => 'أنواع متعددة من النسكافيه',
                'price' => 10000,
                'image' => 'menu-items/Nescafe.png',
                'is_available' => 1,
                'sort_order' => 3
            ],
            [
                'category_slug' => 'Hot_Drinks',
                'name' => 'بابونج',
                'slug' => 'Chamomile',
                'description' => '',
                'price' => 10000,
                'image' => 'menu-items/chamomile.png',
                'is_available' => 1,
                'sort_order' => 4
            ],
            [
                'category_slug' => 'Fresh_Juice',
                'name' => 'عصير فريز طبيعي',
                'slug' => 'Strawberry_juice',
                'description' => 'عصير فريز فريش طبيعي',
                'price' => 25000,
                'image' => 'menu-items/Strawberry_juice.png',
                'is_available' => 1,
                'sort_order' => 1
            ],
            [
                'category_slug' => 'Fresh_Juice',
                'name' => 'عصير برتقال طبيعي',
                'slug' => 'Orange_juice',
                'description' => 'عصير برتقال فريش طبيعي',
                'price' => 25000,
                'image' => 'menu-items/Orange_juice.png',
                'is_available' => 1,
                'sort_order' => 2
            ],



        ];
        foreach ($items as $item) {
            $category = Category::where('slug', $item['category_slug'])
                ->firstOrFail();

            MenuItem::updateOrCreate(
                [
                    'category_id' => $category->id,
                    'slug' => $item['slug'],
                ],
                [
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'price' => $item['price'],
                    'image' => $item['image'],
                    'is_available' => true,
                    'sort_order' => $item['sort_order'],
                ]
            );
        }
    }
}
