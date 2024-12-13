<template>
    <div class="flex flex-row items-center w-full max-w-[1248px] mx-auto">
        <!-- Main Content Section (Left) -->
        <main class="flex flex-col justify-center max-w-full w-[550px] ml-10">
            <h1 class="text-5xl font-bold leading-none text-black max-md:max-w-full max-md:text-3xl">
                <span class="text-orange-500">Finding</span> Fabric
            </h1>
            <p class="mt-6 text-lg font-light text-black">
                "Kain Tepat, Pilihan Cermat."
            </p>
            <div class="flex gap-3.5 mt-9 max-w-full font-medium w-[335px]">
                <Link href="/grade"
                    class="flex items-center pr-4 pl-8 text-base text-orange-500 rounded-lg border border-orange-500 border-solid min-h-[54px] max-md:pl-5">
                    <span class="self-stretch my-auto">Grade Supplier</span>
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/b6e1fc9a923554a2ef943cb4a8933dc4354c4553c55797029dd9ab8c582de2ef?placeholderIfAbsent=true&apiKey=b642bcfadf164c35aebff8fb97b04ffb"
                        alt="" class="object-contain shrink-0 self-stretch my-auto aspect-square w-[34px]" />
                </Link>
            </div>
        </main>

        <!-- Side Section (Right) -->
        <section class="relative flex-grow max-w-[541px]">
            <div class="absolute top-0 left-0 flex shrink-0 w-3.5 h-3.5 bg-yellow-300 rounded-full" aria-hidden="true"></div>
            <div class="absolute top-10 left-10 flex shrink-0 w-3.5 h-3.5 bg-red-600 rounded-full" aria-hidden="true"></div>
            <div class="absolute top-20 right-20 flex shrink-0 w-3.5 h-3.5 bg-green-500 rounded-full" aria-hidden="true"></div>
            
            <div class="relative z-10 min-h-[300px]">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/fb2bfdab5c075f4d6043a8eeae85e98f9d7c646d87505947977b3fd108565a87?placeholderIfAbsent=true&apiKey=b642bcfadf164c35aebff8fb97b04ffb"
                    alt="" class="object-contain w-full h-[300px]" />
                
                <div class="absolute bottom-0 right-0 flex shrink-0 w-3.5 h-3.5 bg-red-600 rounded-full" aria-hidden="true"></div>
            </div>
        </section>
    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3';
</script>