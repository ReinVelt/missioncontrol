
<footer>
    <div class="environment">

        MISSION CONTROL v0.1beta. &copy; <?= date('Y') ?> Rein Velt.  All rights reserved.  This page was rendered in {elapsed_time} seconds. Environment: <?= ENVIRONMENT ?>. 

    </div>

</footer>

<script>
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>
<script type="text/javascript" src="/vendor/bootstrap-5.2.2-dist/js/bootstrap.bundle.js"></script>

<script type="text/javascript" crossorigin src="/js/forms.js"></script>
<script type="text/javascript" crossorigin src="/js/maps/kml.js"></script>
<script type="text/javascript" crossorigin src="/js/maps/coordinatepickerwidget.js"></script>


</body>
</html>
