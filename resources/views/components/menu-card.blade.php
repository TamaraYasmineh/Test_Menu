<article class="menu-card">

    <div class="menu-card__image-wrapper">

        @if($item->image)

            <img
                src="{{ asset('storage/' . $item->image) }}"
                alt="{{ $item->name }}"
                class="menu-card__image"
            >

        @else

            <div class="menu-card__image-placeholder">
                <span>لا توجد صورة</span>
            </div>

        @endif

    </div>

    <div class="menu-card__content">

        <div class="menu-card__header">

            <h3 class="menu-card__name">
                {{ $item->name }}
            </h3>

            <span class="menu-card__price">
                {{ number_format((float) $item->price, 0) }} ل.س
            </span>

        </div>

        @if($item->description)

            <p class="menu-card__description">
                {{ $item->description }}
            </p>

        @endif

    </div>

</article>
