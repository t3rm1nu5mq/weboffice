<div class="js-cookie-consent cookie-consent cookie-consent-dialog">

    <script>
        window.addEventListener('load', (event) => {
            setTimeout(function () {
                document.getElementById('loader').style.display = 'none';
            }, 1000);
        });
    </script>

    <img id="loader" src="/images/loading.gif">

    <span class="cookie-consent__message">
        {!! trans('cookieConsent::texts.message') !!}
    </span>

    <button class="js-cookie-consent-agree cookie-consent__agree">
        {{ trans('cookieConsent::texts.agree') }}
    </button>

</div>
