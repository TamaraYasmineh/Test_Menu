<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuItemRequest;
use App\Http\Requests\UpdateMenuItemRequest;
use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Storage;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::with('category.restaurant')
            ->orderBy('category_id')
            ->orderBy('sort_order')
            ->get();

        return view('admin.menu-items.index', [
            'menuItems' => $menuItems,
        ]);
    }

    public function create()
    {
        return view('admin.menu-items.create', [
            'categories' => $this->categoriesForSelect(),
        ]);
    }

    public function store(StoreMenuItemRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('menu-items', 'public');
        }

        $data['is_available'] = $request->boolean('is_available');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        MenuItem::create($data);

        return redirect()
            ->route('admin.menu-items.index')
            ->with('success', 'تم إضافة الصنف بنجاح.');
    }

    public function edit(MenuItem $menuItem)
    {
        return view('admin.menu-items.edit', [
            'menuItem' => $menuItem,
            'categories' => $this->categoriesForSelect(),
        ]);
    }

    public function update(UpdateMenuItemRequest $request, MenuItem $menuItem)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($menuItem->image) {
                Storage::disk('public')->delete($menuItem->image);
            }

            $data['image'] = $request->file('image')->store('menu-items', 'public');
        }

        $data['is_available'] = $request->boolean('is_available');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $menuItem->update($data);

        return redirect()
            ->route('admin.menu-items.index')
            ->with('success', 'تم تحديث الصنف بنجاح.');
    }

    public function destroy(MenuItem $menuItem)
    {
        if ($menuItem->image) {
            Storage::disk('public')->delete($menuItem->image);
        }

        $menuItem->delete();

        return redirect()
            ->route('admin.menu-items.index')
            ->with('success', 'تم حذف الصنف بنجاح.');
    }

    /**
     * التصنيفات جاهزة لقائمة الاختيار، مع اسم المطعم لتمييزها.
     */
    private function categoriesForSelect()
    {
        return Category::with('restaurant')
            ->orderBy('restaurant_id')
            ->orderBy('sort_order')
            ->get();
    }
}
