<template>
    <Head title="Map"/>
    <div ref="map-root" class="h-full w-full"></div>
</template>

<script setup>
import {Head} from '@inertiajs/vue3'
import View from 'ol/View'
import Map from 'ol/Map'
import ImageLayer from 'ol/layer/Image'
import Projection from 'ol/proj/Projection'
import Static from 'ol/source/ImageStatic'
import {onMounted, ref, useTemplateRef} from "vue";
import {getCenter} from 'ol/extent';
import WoudesteinMap from '../../images/woudestein-map.svg'

// importing the OpenLayers stylesheet is required for having
// good looking buttons!
import 'ol/ol.css'

// Map views always need a projection.  Here we just want to map image
// coordinates directly to map coordinates, so we create a projection that uses
// the image extent in pixels.
const extent = [0, 0, 2085, 2085];
const projection = new Projection({
    code: 'static-image',
    units: 'pixels',
    extent: extent,
});

const map = useTemplateRef('map-root')

onMounted(() => {
    new Map({
        layers: [
            new ImageLayer({
                source: new Static({
                    url: WoudesteinMap,
                    projection: projection,
                    imageExtent: extent,
                }),
            }),
        ],
        target: map.value,
        view: new View({
            projection: projection,
            center: getCenter(extent),
            zoom: 2,
            maxZoom: 8,
        }),
    });
})

</script>
