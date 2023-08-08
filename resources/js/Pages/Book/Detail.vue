<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    book: Object
})
</script>

<template>
    <AppLayout title="Book">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ book.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="relative overflow-x-auto dark:text-white p-4">
                        {{ book.description }}
                    </div>
                </div>
            </div>
        </div>
</AppLayout></template>
