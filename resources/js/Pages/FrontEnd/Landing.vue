<template>
    <MainLayout>
        <HeroLanding />

        <div class="flex shrink-0 self-center mt-14 w-3.5 h-3.5 bg-red-600 rounded-full max-md:mt-10"
            aria-hidden="true">
        </div>
        <div class="flex z-10 shrink-0 self-center mt-0 w-3.5 h-3.5 bg-green-500 rounded-full" aria-hidden="true"></div>
        <div class="flex z-10 shrink-0 mt-0 ml-80 w-3 h-3 bg-blue-700 rounded-full max-md:ml-2.5" aria-hidden="true">
        </div>

        <LineKain />
        <Benefit />

        <Tutorial />

        <MitraView :mitra="mitraData" />


        <section>
            <div
                class="flex flex-col items-center py-28 px-16 w-full bg-white max-md:px-5 max-md:py-24 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">
                    Jika Kalian ingin melihat lebih lanjut, silahkan klik link di bawah ini
                </h2>
                <Link href="/grade"
                    class="text-orange-500 hover:text-orange-700 text-xl font-semibold transition-all duration-300 ease-in-out transform hover:scale-105">
                Klik link disini
                </Link>
                <p class="mt-4 text-sm text-gray-600">Kami menyediakan informasi lebih lanjut di halaman berikutnya.</p>
            </div>
        </section>


    </MainLayout>
</template>

<script setup>
    import MainLayout from '@/Layouts/MainLayout.vue';
    import MitraView from '@/Layouts/MitraLayout.vue';
    import Tutorial from '@/Components/LandingComponents/Tutorial.vue';
    import Benefit from '@/Components/LandingComponents/Benefit.vue';
    import HeroLanding from '@/Components/LandingComponents/HeroLanding.vue';
    import {
        ref,
        onMounted
    } from 'vue';
    import {
        usePage,
        Link
    } from '@inertiajs/vue3';
    import LineKain from '@/Components/LandingComponents/LineKain.vue';

    const {
        props
    } = usePage();
    const mitraData = ref(props.mitra || []);

    onMounted(() => {
    console.log('Mitra Data:', mitraData.value);
    mitraData.value.forEach(mitra => {
        console.log('Logo Path:', mitra.mitra_logos);
    });
});

</script>
