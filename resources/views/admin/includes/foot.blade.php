<!-- Required vendors -->
<script src="{{ asset('assets/vendor/global/global.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendor/chart.js/Chart.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendor/apexchart/apexchart.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/dashboard/dashboard-1.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendor/swiper/js/swiper-bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendor/dotted-map/js/contrib/jquery.smallipop-0.3.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendor/dotted-map/js/contrib/suntimes.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendor/dotted-map/js/contrib/color-0.4.1.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendor/dotted-map/js/world.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendor/dotted-map/js/smallimap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/dashboard/dotted-map-init.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendor/jqvmap/js/jquery.vmap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendor/jqvmap/js/jquery.vmap.world.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendor/jqvmap/js/jquery.vmap.usa.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/custom.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/deznav-init.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/styleSwitcher.js') }}" type="text/javascript"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 5,
        //spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {

            300: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            416: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1280: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
            1788: {
                slidesPerView: 5,
                spaceBetween: 20,
            },
        },
    });
</script>