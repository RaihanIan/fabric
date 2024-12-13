<template>
    <section
        class="flex flex-col items-center justify-center px-32 pt-12 pb-96 mt-0 text-5xl font-semibold text-white bg-orange-500 min-h-[490px] max-md:px-5 max-md:pb-24 max-md:mt-0 max-md:text-4xl">
        <h2 class="w-full min-w-[240px] text-center mb-8 max-md:text-4xl">
            Temui Mitra FindingFabric
        </h2>
        <div class="grid grid-cols-3 gap-4 max-w-4xl mx-auto max-md:grid-cols-2 max-sm:grid-cols-1">
            <div v-for="mitraData in mitra" :key="mitraData.id" class="flex justify-center items-center">
                <img :src="'/storage/' + mitraData.logo_mitra" :alt="mitraData.name || 'Mitra Logo'"
                    class="max-h-40 max-w-full object-contain" />
            </div>
        </div>
    </section>
</template>

<script setup>
    import { defineProps } from 'vue';

    defineProps({
        mitra: {
            type: Array,
            default: () => [],
        },
    });
</script>
