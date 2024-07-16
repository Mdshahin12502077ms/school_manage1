<script src="{{ asset('backend/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('backend/js/plugins.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <!-- Counterup Js -->
    <script src="{{ asset('backend/js/jquery.counterup.min.js') }}"></script>
    <!-- Moment Js -->
    <script src="{{ asset('backend/js/moment.min.js') }}"></script>
    <!-- Waypoints Js -->
    <script src="{{ asset('backend/js/jquery.waypoints.min.js') }}"></script>
    <!-- Scroll Up Js -->
    <script src="{{ asset('backend/js/jquery.scrollUp.min.js') }}"></script>
    <!-- Full Calender Js -->
    <script src="{{ asset('backend/js/fullcalendar.min.js') }}"></script>
    <!-- Chart Js -->
    <script src="{{ asset('backend/js/Chart.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('js')
    @stack('script')