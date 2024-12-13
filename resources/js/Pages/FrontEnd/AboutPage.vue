<template>
    <MainLayout>
        <div class="flex flex-col px-px">
            <div class="relative flex justify-center items-center h-screen">
                <img src="@assets/images/aboutus.png" class="absolute inset-0 w-full h-full object-cover" />
                <div class="relative z-10 flex flex-col items-center text-center">
                    <h1 class="text-8xl font-bold text-white max-md:text-4xl">
                        About Us
                    </h1>
                    <p class="text-2xl font-semibold text-white max-md:max-w-full">
                        Finding Fabric platform penyedia supplier kain terbaik
                    </p>
                </div>
            </div>
            <LineKain />
            <main class="flex flex-col px-20 py-12 w-full bg-orange-50 max-md:px-5 max-md:max-w-full">
                <div class="flex flex-wrap gap-5 justify-between self-end w-full max-w-[1156px] max-md:max-w-full">
                    <div class="flex shrink-0 self-end mt-14 w-3.5 h-3.5 bg-yellow-300 rounded-full max-md:mt-10">
                    </div>
                    <div class="flex gap-10">
                        <div class="flex flex-col items-start">
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap gap-5 justify-between mt-8 w-full max-w-[1215px] max-md:max-w-full">
                    <section class="flex flex-col mt-1 max-md:max-w-full md:justify-between md:items-start">
                        <!-- Bagian Kiri: Teks -->
                        <div class="grid grid-cols-2">
                            <div class="flex flex-col items-start max-md:items-center mt-25 md:mr-4">
                                <div
                                    class="flex gap-5 justify-between items-start ml-4 max-w-full w-[173px] max-md:ml-2.5">
                                    <div class="flex shrink-0 w-3.5 h-3.5 bg-red-600 rounded-full"></div>
                                    <div class="flex shrink-0 mt-1 w-3.5 h-3.5 bg-green-500 rounded-full"></div>
                                </div>
                                <h2
                                    class="text-6xl font-bold leading-none text-black max-md:max-w-full max-md:text-4xl mt-2">
                                    <span class="text-orange-500">Finding</span> Fabric
                                </h2>
                                <p class="mt-2 text-xl font-light text-black max-md:mr-1.5">
                                    Merupakan website yang bertujuan untuk membantu kita agar bisa memilih supplier kain
                                    yang
                                    cocok dengan kebutuhan kita
                                </p>
                            </div>

                            <!-- Bagian Kanan: Gambar di Pojok Kanan -->
                            <div class="flex-shrink-0 self-start md:self-end mt-2 ml-9">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/a8a6a34a80c98738a3127b28c5704d3684725e0fba81ad49ea0b877b579b167a?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
                                    alt="Finding Fabric Logo"
                                    class="object-contain w-[400px] h-[400px] md:w-[400px] md:h-[400px] max-md:max-w-full max-md:h-auto" />
                            </div>
                        </div>
                    </section>
                    <section class="flex flex-co items-start self-start mt-2">
                        <div class="grid grid-cols-2">
                            <!-- Gambar Maskot -->
                            <div class="flex-shrink-0 mr-4">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/c7468304ba93311e4b6d7feba6c6c9d5f0b2deb01b2e75331d1680ea6477a430?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
                                    alt="Decorative image"
                                    class="object-contain w-[300px] h-[300px] md:w-[400px] md:h-[400px] max-md:max-w-full max-md:h-auto" />
                            </div>

                            <!-- Teks dan Elemen Dekoratif -->
                            <div class="flex flex-col mt-25">
                                <h2 class="text-6xl font-bold leading-none text-black max-md:text-4xl">
                                    <span class="text-orange-500">Fi</span>by
                                </h2>
                                <p class="mt-2 text-xl font-light text-black max-md:mr-1.5">
                                    Mari berkenalan dengan maskot lucu kita yang bernama <span class="font-bold">FIBY,
                                    </span>maskot ini berbentuk gulungan benang yang dimana benang merupakan bahan dasar
                                    dari
                                    sebuah kain
                                </p>
                            </div>
                        </div>
                    </section>
                    <div class="flex flex-col items-start self-end mt-2 max-md:mt-10">
                    </div>
                </div>
            </main>
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/323eade0f536f5145befc46fd8aeed42fff255e8bdedf0dc2892d27c7340d46f?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
                alt="Decorative image" class="object-contain mt-4 w-full aspect-[1.67] max-md:max-w-full" />
        </div>
    </MainLayout>
</template>

<script setup>
    import LineKain from '@/Components/LandingComponents/LineKain.vue';
    import MainLayout from '@/Layouts/MainLayout.vue';

</script>

<style scoped>
    /* Any component-specific styles can be added here */

</style>
