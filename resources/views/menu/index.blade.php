@extends('layouts.app')

@section('title', $restaurant->name)

@section(
    'meta_description',
    $restaurant->description ?? 'القائمة الإلكترونية لـ ' . $restaurant->name
)

@section('content')

    <x-restaurant-header
        :restaurant="$restaurant"
    />

    <x-category-nav
        :categories="$restaurant->categories"
    />

    <main class="menu-page">

        <div class="container">

            @foreach($restaurant->categories as $category)

                <section
                    id="category-{{ $category->id }}"
                    class="menu-section"
                >

                    <h2 class="menu-section__title">
                        {{ $category->name }}
                    </h2>

                    @if($category->description)

                        <p class="menu-section__description">
                            {{ $category->description }}
                        </p>

                    @endif

                    <div class="menu-section__items">

                        @forelse($category->menuItems as $item)

                            <x-menu-card
                                :item="$item"
                            />

                        @empty

                            <p class="menu-section__empty">
                                لا توجد أصناف متاحة حاليًا.
                            </p>

                        @endforelse

                    </div>

                </section>

            @endforeach

        </div>

    </main>

    <x-footer
        :restaurant="$restaurant"
    />

@endsection
