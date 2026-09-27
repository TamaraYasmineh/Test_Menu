<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::orderBy('name')->get();

        return view('admin.restaurants.index', [
            'restaurants' => $restaurants,
        ]);
    }

    public function create()
    {
        return view('admin.restaurants.create');
    }

    public function store(StoreRestaurantRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('restaurants', 'public');
        }
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('restaurants', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

        Restaurant::create($data);

        return redirect()
            ->route('admin.restaurants.index')
            ->with('success', 'تم إضافة المطعم بنجاح.');
    }

    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', [
            'restaurant' => $restaurant,
        ]);
    }

    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            if ($restaurant->logo) {
                Storage::disk('public')->delete($restaurant->logo);
            }

            $data['logo'] = $request->file('logo')->store('restaurants', 'public');
        }
        if ($request->hasFile('cover_image')) {
            if ($restaurant->cover_image) {
                Storage::disk('public')->delete($restaurant->cover_image);
            }

            $data['cover_image'] = $request->file('cover_image')->store('restaurants', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

        $restaurant->update($data);

        return redirect()
            ->route('admin.restaurants.index')
            ->with('success', 'تم تحديث بيانات المطعم بنجاح.');
    }

    public function destroy(Restaurant $restaurant)
    {
        if ($restaurant->logo) {
            Storage::disk('public')->delete($restaurant->logo);
        }
        if ($restaurant->cover_image) {
            Storage::disk('public')->delete($restaurant->cover_image);
        }
        $restaurant->delete();

        return redirect()
            ->route('admin.restaurants.index')
            ->with('success', 'تم حذف المطعم بنجاح.');
    }
}
