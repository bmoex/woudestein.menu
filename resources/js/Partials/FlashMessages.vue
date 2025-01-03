<template>
    <transition
        enter-from-class="translate-x-[150%] opacity-0"
        leave-to-class="translate-x-[150%] opacity-0"
        enter-active-class="transition duration-300"
        leave-active-class="transition duration-300"
    >
        <div v-if="!isEmpty(flashMessages)" class="fixed z-50 top-2 right-4" :class="$props.class"
             dusk="flash-messages">
            <template v-for="message in flashMessages" :key="message.id">
                <transition-group
                    enter-from-class="opacity-0"
                    leave-to-class="opacity-0"
                    enter-active-class="transition duration-300"
                    leave-active-class="transition duration-300"
                >
                    <div v-if="message"
                         class="toast-item flex items-center p-4 mb-4 w-full max-w-md text-gray-500 bg-white rounded-lg shadow"
                         role="alert">
                        <div v-if="message.type === 'success'"
                             class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Check icon</span>
                        </div>
                        <div v-else-if="message.type === 'info'"
                             class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-orange-500 bg-orange-100 rounded-lg">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Warning icon</span>
                        </div>
                        <div v-else-if="message.type === 'error'"
                             class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-red-500 bg-red-100 rounded-lg">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Error icon</span>
                        </div>
                        <div class="ml-3 mr-1 text-sm font-normal" v-html="message.content"></div>

                        <button @click="close(message.id)" type="button" dusk="close-toast"
                                class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 :text-white :bg-gray-700"
                                data-dismiss-target="#toast-success" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </transition-group>
            </template>
        </div>
    </transition>
</template>

<script setup>
import {usePage} from '@inertiajs/vue3'
import {ref, watchEffect} from 'vue'
import {uniqueId} from "lodash";

const props = defineProps({
    class: String,
    autoCloseIn: {
        type: Number,
        default: 5000,
    },
});

const isEmpty = o => o.constructor.name === 'Object' ? Object.keys(o).reduce((y, z) => y && isEmpty(o[z]), true) : o.length === 0;

const flashMessages = ref({});

const registerMessage = (type, message) => {
    const id = uniqueId(type + '-');

    flashMessages.value[id] = {id: id, type: type, content: message};

    addAutoCloseHandler(id);

}

const close = (id) => {
    delete flashMessages.value[id];
};

const addAutoCloseHandler = function (id) {
    if (props.autoCloseIn !== 0) {
        setTimeout(function () {
            close(id);
        }, props.autoCloseIn);
    }
}

watchEffect(() => {
    if (usePage().props.flash) {
        if (usePage().props.flash.success) {
            registerMessage('success', usePage().props.flash.success);
        }
        if (usePage().props.flash.info) {
            registerMessage('info', usePage().props.flash.info);
        }
        if (usePage().props.flash.error) {
            registerMessage('error', usePage().props.flash.error);
        }
    }

    if (usePage().props.errors && Object.keys(usePage().props.errors).length > 0) {
        for (const [, error] of Object.entries(usePage().props.errors)) {
            registerMessage('error', error);
        }
    }
});
</script>
