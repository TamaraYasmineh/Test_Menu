<footer class="site-footer">

    <div class="container site-footer__container">

        <p class="site-footer__text">

            {{ $restaurant->name }}

            @if($restaurant->address)
                - {{ $restaurant->address }}
            @endif

        </p>

    </div>

</footer>
