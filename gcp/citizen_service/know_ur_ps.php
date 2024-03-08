<?php include "../header.php" ?>
<style type="text/css">
    #map-canvas { 
        height: 450px; 
        width: 100%;
    }
    footer {
        margin-top: 0px;
    }
    #container {
        max-width: 100%;
        height: auto; 
        padding: 0;
    }
    @media (min-width: 1200px){
        #map_container {
            max-width: 100%;
            padding: 0;
        }
    }
    #map_row{
        margin-left: 0; 
        margin-right: 0;
    } 
</style>

<div class="">
    <div class="subNav">
        <span class="subNavtext">KNOW YOUR POLICE STATION</span>&nbsp;&nbsp; 
    </div>
    <div class="container" id="map_container">
        <div class="row" id="map_row">
            <div id="map-canvas" style=""></div>
            <div class="panel panel-primary" id="mapInfobox">
                <div class="panel-heading">
                    <h3 class="panel-title" id="content_window_title">HOW TO USE THIS MAP<span class="glyphicon glyphicon-remove-circle pull-right" onclick="hide_mapInfobox();"></span></h3>
                </div>
                <div class="panel-body" id="content-window">
                    <p style="text-align: justify;line-height: 2;margin-top: 20px;">
                        <strong>Scroll-Up</strong> to zoom in<br>
                        <strong>Scroll-Down</strong> to zoom out<br>
                        <strong>Click & Drag</strong> to move the map<br>
                        <strong>Click</strong> on your location  
                    </p>
                </div>
            </div>        	
        </div>
    </div>
</div>
<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?libraries=geometry,places,visualization&sensor=true">
</script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>

<script type="text/javascript">
    window.onload = function() {
        $('#citizen_service_nav').addClass('active');
    };

    var map, ps_layer, ps_points_layer;
    var gcp_division = "1nmLVIKCyDRR8JzkILzJXHRmgS8_fJVfRvSSXwR0";
    var gcp_ps = '1TdM-bk3iHfaNYuVFd6gjVaef6yOdtD3qUZuOe8U';
    var gcp_ps_points = '1PItBJizqU1PYSXXzucQsb0Tp6PvZt08NiVnHP_Y';

    function initialize() {

        var myLatlng = new google.maps.LatLng(26.20347, 91.84066);
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            zoom: 11,
            center: myLatlng,
            disableDefaultUI: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var symbolOne = {
            path: 'M -5,0 0,-5 5,0 0,5 z',
            strokeColor: '#000',
            fillColor: '#008e09',
            fillOpacity: 1
        };
        var awps = new google.maps.Marker({
            position: new google.maps.LatLng(26.1845336262, 91.7408003222),
            icon: symbolOne,
            map: map

        });

        /*** marker ***/

        var setMarker = 0;

        google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(event.latLng);
            setMarker = 1;
        });

        var marker;
        function placeMarker(location) {
            if (setMarker == 0) {
                setMarker = 1;
                marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            }
            else {
                marker.setPosition(location);
            }
        }


        /*** layers ***/

        ps_points_layer = new google.maps.FusionTablesLayer({
            query: {
                select: 'name',
                from: gcp_ps_points
            },
            map: map, //ps_points_layer.setMap(map);
            suppressInfoWindows: true
        });

        ps_layer = new google.maps.FusionTablesLayer({
            query: {
                select: 'geometry',
                from: gcp_ps
            },
            map: map,
            suppressInfoWindows: true,
            options: {
                styleId: 2,
                templateId: 3
            }
        });



        /*** layers click ***/

        google.maps.event.addListener(ps_layer, 'click', function(e) {

            ps_layer.set("styles", [{
                    where: "'ps_id' = '" + e.row['ps_id'].value + "'",
                    polygonOptions: {
                        fillColor: "#CC0000",
                        strokeColor: "#cc0000",
                        strokeOpacity: 0.8,
                        strokeWeight: 0.8,
                        fillOpacity: 0.2,
                    }
                }]);
            geocodePosition(e.latLng, e.row['ps_id'].value);
            $('#content_window_title').css('color', '#fff');
        });

        var geocoder = new google.maps.Geocoder();

        function geocodePosition(pos, ps_id) {
            placeMarker(pos);
            geocoder.geocode({
                latLng: pos
            }, function(responses) {
                if (responses && responses.length > 0) {
                    updateMarkerAddress(responses[0].formatted_address, ps_id);
                } else {
                    var str = "Cannot determine address at this location.";
                    updateMarkerAddress(str, ps_id);
                }
            });
        }



        function updateMarkerAddress(str, ps_id) {
            showInContentWindow(ps_id, str);
        }

        function showInContentWindow(ps_id, loc) {
            $('#mapInfobox').slideDown();
            var division = '';
            var ps_name = '';
            var address = '';
            var phone = '';
            var oc_name = '';
            var oc_image = '';
            var oc_phone = "";

            if (ps_id == 1)
            {
                division = "PANDU";
                ps_name = "AZARA PS ";
                address = "Near Gadhuli Bazar, Azara";
                phone = "0361-2840287";
                oc_name = "Insp  D. Sarmah";
                oc_image = "Insp  Dandhar Sarmah OC Azara PS.jpg";
                oc_phone = "9435131015";
            }
            if (ps_id == 2)
            {
                division = "DISPUR";
                ps_name = "BASISTHA PS ";
                address = "Basistha,Guwahati";
                phone = "0361-2302158";
                oc_name = "Insp Rukma Buragohain";
                oc_image = "Insp Rukma Buragohain OC BST PS.jpg";
                oc_phone = "9964065123";
            }
            if (ps_id == 3)
            {
                division = "DISPUR";
                ps_name = "BHANGAGARH PS ";
                address = "Bhangagrah,Guwahati";
                phone = "0361-2461756";
                oc_name = "Bimal Ch Deka";
                oc_image = "OC BGH Bimal Ch Deka.jpg";
                oc_phone="9435341366";
            }
            if (ps_id == 4)
            {
                division = "PANDU";
                ps_name = "BHARALUMUKH PS ";
                address = "M.G.Rd, Bharalumukh,Guwahati";
                phone = "0361-2731199";
                oc_name = "SI Dhirendra Kalita";
                oc_image = "SI Dhirendra Kalita  OC PGR.jpg";
                 oc_phone = "9085986866";
            }
            if (ps_id == 5)
            {
                division = "CHANDMARI";
                ps_name = "CHANDMARI PS ";
                address = "Chandmari Colony, Guwahati";
                phone = "0361-2660204";
                oc_name = "Insp Banamali Handique";
                oc_image = "Insp Banamali Handique OC CMR.jpg";
                 oc_phone = "9435055463";
            }
            if (ps_id == 6)
            {
                division = "DISPUR";
                ps_name = "DISPUR PS ";
                address = "Near Assembly Sector, Dispur";
                phone = "0361-2261510";
                oc_name = "Biren Ch Deka";
                oc_image = "OC DPR Biren Ch Deka.jpg";
                 oc_phone = "9435123487";
            }
            if (ps_id == 7)
            {
                division = "PANDU";
                ps_name = "FATASIL AMBARI PS ";
                address = "Fatasil, Guwahati";
                phone = "0361 - 2471412";
                oc_name = "";
                oc_image = "OC FSL PS.jpg";
                 oc_phone = "9435286275";
            }
            if (ps_id == 8)
            {
                division = "CHANDMARI";
                ps_name = "GEETANAGAR PS ";
                address = "Geetanagar Road, Sahib Tila,Guwahati";
                phone = "0361-2417323";
                oc_name = "Insp Hamidur Rahman";
                oc_image = "Insp Hamidur Rahman OC GNR.jpg";
                 oc_phone = "9864049665";
            }
            if (ps_id == 9)
            {
                division = "PANDU";
                ps_name = "GORCHUK PS ";
                address = "Near PODDAR CAR WORLD,Gorchuk,Guwahati";
                phone = "0361-2270151";
                oc_name = "Bhupen Das";
                oc_image = "Bhupen Das OC GCK.jpg";
                 oc_phone = "94351128878";
            }
            if (ps_id == 10)
            {
                division = "DISPUR";
                ps_name = "HATIGAON PS ";
                address = "Hatigaon,Guwahati";
                phone = "0361-2231060";
                oc_name = "Insp Dhirendra Narayan Dev";
                oc_image = "Insp Dhirendra Narayan Dev oc HGN.jpg";
                 oc_phone = "9864054305";
            }
            if (ps_id == 11)
            {
                division = "PANDU";
                ps_name = "JALUKBARI PS ";
                address = "Near Guwahati University, Jalukbari, ";
                phone = "0361-2570522";
                oc_name = "Insp Pradip Kr. Das";
                oc_image = "Insp Pradip Kr. Das Oc JLB.jpg";
                 oc_phone = "9435082118";
            }
            if (ps_id == 12)
            {
                division = "DISPUR";
                ps_name = "KHETRI PS ";
                address = "Main Rd Khetri,Guwahati";
                phone = "0361-2787220";
                oc_name = "Insp Sunil Kalita";
                oc_image = "Insp Sunil Kalita OC Khetri PS.jpg";
                oc_phone = "9435194256";
            }
            if (ps_id == 13)
            {
                division = "PANBAZAR";
                ps_name = "LATASIL PS ";
                address = "Near Guwahati High Court ,Latasil ";
                phone = "0361-2540136";
                oc_name = "Insp Jagat Ch Nath";
                oc_image = "Insp Jagat Ch Nath OC Latasil PS.jpg";
                oc_phone = "9864014678";
            }
            if (ps_id == 14)
            {
                division = "CHANDMARI";
                ps_name = "NOONMATI PS ";
                address = "Mani Ram Dewan Rd, Noonmati";
                phone = "0361-2550281";
                oc_name = "Insp Kamal Ch Rajbanshi";
                oc_image = "Insp Kamal Ch Rajbanshi OC NMT.jpg";
                oc_phone = "9435126053";
            }
            if (ps_id == 15)
            {
                division = "PANDU";
                ps_name = "NORTH GUWAHATI PS ";
                address = "North Guwahati";
                phone = "0361-2690255";
                oc_name = "Insp Chndra Kt Boro";
                oc_image = "Insp Chndra Kt Boro OC NGHTY.jpg";
                oc_phone = "9508641355";
            }
            if (ps_id == 16)
            {
                division = "PANBAZAR";
                ps_name = "PALTANBAZAR PS ";
                address = "K C Sen Road, Paltanbazar, Guwahati";
                phone = "0361-2540126";
                oc_name = "INsp Mrinal Kr Das";
                oc_image = "INsp Mrinal Kr Das OCPLTPS.jpg";
                oc_phone = "9435022990";
            }

            if (ps_id == 17)
            {

                division = "PANBAZAR";
                ps_name = "PANBAZAR PS ";
                address = "Danish Rd, Fancy Bazaar";
                phone = "0361-2540106";
                oc_name = "Dilip Bharali";
                oc_image = "Dilip Bharali OC PNB.jpg";
                oc_phone = "9435183080";

            }
            if (ps_id == 18)
            {
                division = "CHANDMARI";
                ps_name = "PRAGJYOTISHPUR PS ";
                address = "Pragjyotishpur, Guwahati,";
                phone = "0361-2785237";
                oc_name = "SI Dhirendra Kalita";
                oc_image = "SI Dhirendra Kalita  OC PGR.jpg";
                oc_phone = "9864125719";
            }

            if (ps_id == 19)
            {
                division = "CHANDMARI";
                ps_name = "SATGAON PS ";
                address = "Mikir Path, Satgaon Main Road Satgaon, Guwahati";
                phone = "0361-2642018";
                oc_name = "Insp Ajit Kr Sarma";
                oc_image = "Insp Ajit Kr Sarma oc SGN.jpg";
                oc_phone = "9864317538";
            }

            if (ps_id == 20)
            {
                division = "DISPUR";
                ps_name = "SONAPUR PS ";
                address = "Sonapur Bazar ROAd Rewa N.C";
                phone = "0361-2786326";
                oc_name = "SI Rabindra Nath Das";
                oc_image = "SI Rabindra Nath Das OC SPR.jpg";
                oc_phone = "9508128428";
            }

            var sidediv = document.getElementById('content-window');
            $('#content_window_title').css('color', '#fff');
            $('#content_window_title').html('POLICE STATION DETAILS <span class="glyphicon glyphicon-remove-circle pull-right" onclick="hide_mapInfobox();"></span>');
            var html = '<h5 class="label label-default">YOUR LOCATION</h5>'
                    + '<p>' + loc + '</p>'
                    + '<hr style=" margin-top: 5px; margin-bottom: 5px; ">'
                    + '<h5 class="label label-danger">YOUR POLICE STATION</h5>'
                    + '<h4>' + ps_name + '</h4>'
                    + '<h5>' + division + ' DIVISION </h5>'
                    + '<address>' + address + '<address>'
                    + '<p><span class="glyphicon glyphicon-earphone"></span> ' + phone + '</p>'
                    + '<hr style=" margin-top: 5px; margin-bottom: 5px; ">'
                    + '<h5 class="label label-default">OFFICER-IN-CHARGE</h5>'
                    + '<br><br>'
                    + '<img style=" float: left; padding-right: 10px;" src="<?php echo URL; ?>assets/apps/images/ocs_img/' + oc_image + '">'
                    + '<p><strong>' + oc_name + '</strong></p>'
                    + '<p><strong>' + oc_phone + '</strong></p>';

            sidediv.innerHTML = html;

        }

        google.maps.event.addListener(awps, 'click', function(e) {
            $('#mapInfobox').slideDown();
            var position = new google.maps.LatLng(26.1845336262, 91.7408003222);
            placeMarker(position);
            ps_layer.set("styles", [{
                    polygonOptions: {
                        fillColor: "#CC0000",
                        strokeColor: "#cc0000",
                        strokeOpacity: 0.08,
                        strokeWeight: 0.08,
                        fillOpacity: 0.2,
                    }
                }]);
            var division = '<small>The jurisdiction of All Women PS extends to entire Guwahati City for crime aginest women only.</small>';
            var ps_name = 'ALL WOMEN PS';
            var address = 'Danish Road, Fancy Bazaar, Guwahati, Assam 781030, India';
            var phone = '8753814142';
            var oc_name = 'SI Junali Das';
            var oc_image = 'SI Junali Das All WMN PS.jpg';
            var oc_phone = '8753814142';

            var sidediv = document.getElementById('content-window');
            $('#content_window_title').css('color', '#fff');
            $('#content_window_title').html('POLICE STATION DETAILS <span class="glyphicon glyphicon-remove-circle pull-right" onclick="hide_mapInfobox();"></span>');
            var html = '<h5 class="label label-default">YOUR LOCATION</h5>'
                    + '<p>Danish Road, Fancy Bazaar, Guwahati, Assam 781030, India</p>'
                    + '<hr style=" margin-top: 4px; margin-bottom: 4px; ">'
                    + '<h5 class="label label-danger">YOUR POLICE STATION</h5>'
                    + '<h4>' + ps_name + '</h4>'
                    + '<h5>' + division + ' </h5>'
                    + '<address>' + address + '<address>'
                    + '<p><span class="glyphicon glyphicon-earphone"></span> ' + phone + '</p>'
                    + '<hr style=" margin-top: 4px; margin-bottom: 4px; ">'
                    + '<h5 class="label label-default">OFFICER-IN-CHARGE</h5>'
                    + '<br>'
                    + '<img style=" float: left; padding-right: 10px; margin-top: 10px;" src="<?php echo URL; ?>assets/apps/images/ocs_img/' + oc_image + '">'
                    + '<p><strong>' + oc_name + '</strong></p>'
                    + '<p><strong>' + oc_phone + '</strong></p>';

            sidediv.innerHTML = html;
        });
    }


    google.maps.event.addDomListener(window, 'load', initialize);



    function hide_mapInfobox() {
        $('#mapInfobox').slideUp();
    }
</script>

<?php include "../footer.php" ?>