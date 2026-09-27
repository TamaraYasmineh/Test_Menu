<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $restaurant = Restaurant::where('slug', 'sergella')->firstOrFail();

        $categories = [
            [
                'name' => 'الصاجيّات',
                'slug' => 'Pies',
                'description' => 'مجموعة من الصاجيّات الشهية',
                'sort_order' => 1,
            ],
            [
                'name' => 'المشروبات الساخنة',
                'slug' => 'Hot_Drinks',
                'description' => 'أشهى المشروبات الساخنة',
                'sort_order' => 2,
            ],
            [
                'name' => 'عصائر فريش',
                'slug' => 'Fresh_Juice',
                'description' => 'ألذ العصائر المكونة من الفواكه الطازجة',
                'sort_order' => 3,
            ],
            [
                'name' => 'مشروبات غازية',
                'slug' => 'Soda_drink',
                'description' => 'مجموعة متنوعة من المشروبات الغازية',
                'sort_order' => 4,
            ],
            [
                'name' => 'كوكتيلات',
                'slug' => 'Cocktails',
                'description' => 'مجموعة متنوعة من الكوكتيلات ',
                'sort_order' => 5,
            ],
            [
                'name' => 'آيس تي',
                'slug' => 'Ice_Tea',
                'description' => 'نكهات متعددة من الآيس تي',
                'sort_order' => 6,
            ],
              [
                'name' => 'مشروبات الطاقة',
                'slug' => 'Energy_drinks',
                'description' => 'أنواع متعددة من مشروبات الطاقة',
                'sort_order' => 7,
            ],
                [
                'name' => 'مشروبات الصودا',
                'slug' => 'Mohito',
                'description' => 'أنواع متعددة من مشروبات الصودا',
                'sort_order' => 8,
            ],
                [
                'name' => 'الحلويات',
                'slug' => 'Dessert',
                'description' => 'أطباق متعددة لذيذة من الحلويات',
                'sort_order' => 9,
            ],
                 [
                'name' => 'السلطات',
                'slug' => 'Salads',
                'description' => 'أطباق متنوعة من أطيب السلطات',
                'sort_order' => 10,
            ],
               [
                'name' => 'بوظة',
                'slug' => 'Ice_Cream',
                'description' => 'أنواع متعددة من البوظة',
                'sort_order' => 11,
            ],
              [
                'name' => 'ميلك شيك',
                'slug' => 'Milk_Shake',
                'description' => '',
                'sort_order' => 12,
            ],
              [
                'name' => 'الأراكيل',
                'slug' => 'Shisha',
                'description' => '',
                'sort_order' => 13,
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                [
                    'restaurant_id' => $restaurant->id,
                    'slug' => $category['slug'],
                ],
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                    'is_active' => true,
                    'sort_order' => $category['sort_order'],
                ]
            );
        }
    }
}
