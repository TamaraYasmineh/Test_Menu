<header class="restaurant-header">

    <div
        class="restaurant-header__cover"
        @if($restaurant->cover_image)
            style="background-image: url('{{ asset('storage/' . $restaurant->cover_image) }}');"
        @endif
    >
        <div class="restaurant-header__cover-overlay"></div>
    </div>

    <div class="container restaurant-header__container">

        <a href="{{ route('menu.show', $restaurant) }}"
           class="restaurant-header__logo">

            @if($restaurant->logo)
                <img
                    src="{{ asset('storage/' . $restaurant->logo) }}"
                    alt="{{ $restaurant->name }}"
                    class="restaurant-header__logo-image"
                >
            @else
                <span class="restaurant-header__logo-text">
                    {{ $restaurant->name }}
                </span>
            @endif

        </a>

        <div class="restaurant-header__info">

            <h1 class="restaurant-header__name">
                {{ $restaurant->name }}
            </h1>

            @if($restaurant->address)
                <p class="restaurant-header__location">
                    {{ $restaurant->address }}
                </p>
            @endif

        </div>

    </div>

</header>
