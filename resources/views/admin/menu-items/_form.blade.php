@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div>
        <label class="admin-label">التصنيف</label>
        <select name="category_id" class="admin-input">
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ (int) old('category_id', $menuItem->category_id ?? null) === $category->id ? 'selected' : '' }}>
                    {{ $category->name }} ({{ $category->restaurant->name }})
                </option>
            @endforeach
        </select>
        @error('category_id') <p class="admin-error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="admin-label">اسم الصنف</label>
        <input type="text" name="name" value="{{ old('name', $menuItem->name ?? '') }}" class="admin-input">
        @error('name') <p class="admin-error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="admin-label">الرابط المختصر (Slug)</label>
        <input type="text" name="slug" value="{{ old('slug', $menuItem->slug ?? '') }}" class="admin-input" placeholder="Zaatar">
        @error('slug') <p class="admin-error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="admin-label">السعر</label>
        <input type="number" name="price" step="0.01" min="0" value="{{ old('price', $menuItem->price ?? '') }}" class="admin-input">
        @error('price') <p class="admin-error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="admin-label">ترتيب الظهور (Sort Order)</label>
        <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $menuItem->sort_order ?? 0) }}" class="admin-input">
        @error('sort_order') <p class="admin-error">{{ $message }}</p> @enderror
    </div>

    <div class="md:col-span-2">
        <label class="admin-label">الوصف</label>
        <textarea name="description" rows="3" class="admin-input">{{ old('description', $menuItem->description ?? '') }}</textarea>
        @error('description') <p class="admin-error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="admin-label">صورة الصنف</label>
        <input type="file" name="image" accept="image/*" class="admin-input">
        @error('image') <p class="admin-error">{{ $message }}</p> @enderror

        @if(isset($menuItem) && $menuItem->image)
            <img src="{{ asset('storage/' . $menuItem->image) }}" class="admin-thumb mt-2">
        @endif
    </div>

    <div class="admin-checkbox-row">
        <input type="checkbox" name="is_available" value="1" {{ old('is_available', $menuItem->is_available ?? true) ? 'checked' : '' }}>
        <label style="color: var(--admin-text-muted); font-size: 0.9rem;">متوفر (يظهر للزبائن)</label>
    </div>

</div>

<div class="mt-6">
    <button type="submit" class="admin-btn">حفظ</button>
</div>
