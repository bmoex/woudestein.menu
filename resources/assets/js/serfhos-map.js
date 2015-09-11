/**
 * Map Application
 *
 * @type Object
 */
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
     * @var Array
     */
    renderedMarkers: [],

    /**
     * @var Serfhos.Format
     */
    formatListItem: null,

    /**
     * @var Serfhos.Format
     */
    formatContent: null,


    /**
     * Initialize application
     *
     * @return void
     */
    initialize: function () {
        Serfhos.Map.setTemplates();
    },

    /**
     * Set templates from content objects if available
     *
     * @return void
     */
    setTemplates: function () {
        var listContainer = jQuery('.navigation-container');
        if (listContainer.length > 0) {
            Serfhos.Map.formatListItem = new Serfhos.Format(listContainer);
        }

        var contentContainer = jQuery('#content-container');
        if (contentContainer.length > 0) {
            Serfhos.Map.formatContent = new Serfhos.Format(contentContainer);
        }
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
        Serfhos.Map.renderMarkers();

        // Invoke after creation, correct marker icon size
        Serfhos.Map.updateMarkerIconSize();
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
            var marker = Serfhos.Map.renderedMarkers[id];
            if (marker) {
                var icon = marker.getIcon();
                icon.anchor = new google.maps.Point(iconAnchor, iconAnchor);
                icon.scaledSize = new google.maps.Size(iconSize, iconSize);

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
                Serfhos.Map.addMarker(element.id, element.title, {
                    lat: element.latitude,
                    lang: element.longitude
                }, element.icon);
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
            icon = '/images/icons/unknown.svg'
        }

        // Set in marker cache
        Serfhos.Map.markers[id] = {
            position: position,
            title: title,
            icon: icon
        };

        if (typeof Serfhos.Map.formatListItem == 'object') {
            Serfhos.Map.formatListItem.addContent({
                title: title,
                icon: '<img src="' + icon + '" class="custom-icon"/>',
            });
        }
    },

    /**
     * @return void
     */
    renderMarkers: function () {
        jQuery(Serfhos.Map.markers).each(function (index, marker) {
            // Only render if id is not yet rendered..
            if (Serfhos.Map.renderedMarkers[index] == 'undefined') {
                Serfhos.Map.renderedMarkers[index] = new google.maps.Marker({
                    position: marker.position,
                    map: Serfhos.Map.container,
                    title: marker.title,
                    icon: {
                        url: marker.icon,
                        size: new google.maps.Size(512, 512),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(15, 15),
                        scaledSize: new google.maps.Size(30, 30)
                    }
                });
            }
        });
    }
};

// Invoke initialize to be sure data is configured
Serfhos.Map.initialize();