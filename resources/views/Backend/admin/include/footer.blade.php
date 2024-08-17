 <!-- Footer Area Start Here -->
 <footer class="footer-wrap-layout1">
    @php
    $backend_setting=App\Models\BackendSettings::first();
@endphp
    <div class="copyright">© Copyrights <a href="#">{{$backend_setting->institute_name}}</a> {{$backend_setting->starting_year}}. All rights reserved.
        Designed by <a href="#">PsdBosS</a></div>
</footer>
