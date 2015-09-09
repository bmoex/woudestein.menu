Serfhos.Application = {
    /**
     * @var google.maps.Map
     */
    map: null,
    /**
     * @var Array
     */
    markers: [],

    initialize: function () {
        Serfhos.Application.createMap();


        // Invoke after creation, correct marker icon size
        Serfhos.Application.updateMarkerIconSize();
    },

    createMap: function () {
        // @TODO: Style accordingly https://developers.google.com/maps/documentation/javascript/reference#MapTypeStyleFeatureType
        var customMapType = new google.maps.StyledMapType([
            {
                elementType: 'labels',
                stylers: [{visibility: 'off'}]
            }
        ], {
            name: 'Map Woudestein'
        });
        var customMapTypeId = 'buildings_woudestein';

        Serfhos.Application.map = new google.maps.Map(document.getElementById('map-woudestein'), {
            zoom: 17,
            center: {lat: 51.917082, lng: 4.526013},
            //disableDefaultUI: true,
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
            }
        });

        Serfhos.Application.map.mapTypes.set(customMapTypeId, customMapType);
        Serfhos.Application.map.setMapTypeId(customMapTypeId);

        google.maps.event.addListener(Serfhos.Application.map, 'zoom_changed', Serfhos.Application.updateMarkerIconSize);
    },

    /**
     * Update marker size based on current zoom level
     *
     * @return void
     */
    updateMarkerIconSize: function () {
        var startFromZoom = 15;

        var zoom = Serfhos.Application.map.getZoom();
        var iconSize = 30;
        if (zoom > startFromZoom) {
            zoom = zoom - startFromZoom;
            iconSize = iconSize + ((zoom + 5) * zoom);
        }
        var iconAnchor = Math.ceil(iconSize / 2);
        jQuery(Serfhos.Application.markers).each(function (id) {
            var marker = Serfhos.Application.markers[id];
            if (marker) {
                var icon = marker.getIcon();
                icon.anchor = new google.maps.Point(iconAnchor, iconAnchor);
                icon.scaledSize = new google.maps.Size(iconSize, iconSize);
                console.log(iconSize);
                marker.setIcon(icon);
            }
        });
    },

    /**
     * Add marker to configured map
     *
     * @return void
     */
    addMarker: function (id, title, position, icon) {
        if (!icon || icon.length < 3) {
            icon = '/icons/unknown.svg'
        }

        Serfhos.Application.markers[id] = new google.maps.Marker({
            position: position,
            map: Serfhos.Application.map,
            title: title,
            icon: {
                url: icon,
                size: new google.maps.Size(512, 512),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(15, 15),
                scaledSize: new google.maps.Size(30, 30)
            }
        });
    }
};