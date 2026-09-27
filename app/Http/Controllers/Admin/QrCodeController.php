<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Response;

class QrCodeController extends Controller
{
    /**
     * صفحة عرض QR الخاص بالمطعم (لعرضه وطباعته من لوحة الإدارة).
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurants.qr-code', [
            'restaurant' => $restaurant,
            'menuUrl' => route('menu.show', $restaurant),
        ]);
    }

    /**
     * الصورة الفعلية لـ QR (PNG)، تُستخدم كمصدر لعنصر <img> وكرابط تحميل.
     */
   public function image(Restaurant $restaurant): Response
{
    $builder = new Builder(
        writer: new PngWriter(),
        data: route('menu.show', $restaurant),
        size: 400,
        margin: 16,
    );

    $result = $builder->build();

    return response($result->getString(), 200, [
        'Content-Type' => $result->getMimeType(),
    ]);
}
}
