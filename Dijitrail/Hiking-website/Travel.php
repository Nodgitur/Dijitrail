<?php include_once '..Head/head.php'; ?>
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <div id="googleMap" style="width:100%;height:800px;"></div>

            <script>
                function myMap() {
                    var mapProp = {
                        center: new google.maps.LatLng(53.350140, -6.266155),
                        zoom: 10,
                    };
                    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                }
            </script>


            <!--  <script>
                function initMap() {
                    map = new google.maps.Map(document.getElementById("googleMap"), {
                        center: {
                            lat: 53.350140,
                            lng: -6.266155
                        },
                        zoom: 6,
                    });
                    infoWindow = new google.maps.InfoWindow();

                    const marker = new google.maps.Marker({
                        map,
                        position: center
                    });

                
                    // Try HTML5 geolocation.
                    /* if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            (position) => {
                                const pos = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude,
                                };
                                infoWindow.setPosition(pos);
                                infoWindow.setContent("Location found.");
                                infoWindow.open(map);
                                map.setCenter(pos);
                            },
                            () => {
                                handleLocationError(true, infoWindow, map.getCenter());
                            }
                        );
                    } else {
                        // Browser doesn't support Geolocation
                        handleLocationError(false, infoWindow, map.getCenter());
                    }
                }

                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    infoWindow.setPosition(pos);
                    infoWindow.setContent(
                        browserHasGeolocation ?
                        "Error: The Geolocation service failed." :
                        "Error: Your browser doesn't support geolocation."
                    );
                    infoWindow.open(map);*/
                }
            </script>-->
            <?php include_once '../Footer/footer.php'; ?>