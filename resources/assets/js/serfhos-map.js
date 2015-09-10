Serfhos.Map = {
    /**
     * @var google.maps.Map
     */
    container: null,
    /**
     * @var Array
     */
    markers: [],

    /**
     * Initialize application
     *
     * @return void
     */
    initialize: function () {
        Serfhos.Map.createMap();

        // Invoke after creation, correct marker icon size
        Serfhos.Map.updateMarkerIconSize();
    },

    /**
     * Create Map when initialized
     *
     * @return void
     */
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

        Serfhos.Map.container = new google.maps.Map(document.getElementById('map-woudestein'), {
            zoom: 17,
            center: {lat: 51.917082, lng: 4.526013},
            //disableDefaultUI: true,
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
            }
        });

        Serfhos.Map.container.mapTypes.set(customMapTypeId, customMapType);
        Serfhos.Map.container.setMapTypeId(customMapTypeId);

        google.maps.event.addListener(Serfhos.Map.container, 'zoom_changed', Serfhos.Map.updateMarkerIconSize);

        // Update all markers to use this map

    },

    /**
     * Update marker size based on current zoom level
     *
     * @return void
     */
    updateMarkerIconSize: function () {
        var startFromZoom = 15;

        var zoom = Serfhos.Map.container.getZoom();
        var iconSize = 30;
        if (zoom > startFromZoom) {
            zoom = zoom - startFromZoom;
            iconSize = iconSize + ((zoom + 5) * zoom);
        }
        var iconAnchor = Math.ceil(iconSize / 2);
        jQuery(Serfhos.Map.markers).each(function (id) {
            var marker = Serfhos.Map.markers[id];
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
     * Add all json markers to map
     *
     * @param markers
     * @return void
     */
    addMarkers: function (markers) {
        if (typeof markers == 'object') {
            jQuery(markers).each(function (index, element) {
                // @todo
                //Serfhos.Map.addMarker(element.id, element.title, {lat: element.latitude, lang: element.longitude}, element.icon);
            });
        }
    },

    /**
     * Add marker to configured map
     *
     * @param id
     * @param title
     * @param position
     * @param icon
     * @return void
     */
    addMarker: function (id, title, position, icon) {
        if (!icon || icon.length < 3) {
            icon = '/icons/unknown.svg'
        }

        Serfhos.Map.markers[id] = new google.maps.Marker({
            position: position,
            map: Serfhos.Map.container,
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