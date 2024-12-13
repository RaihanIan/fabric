<template>
    <footer class="flex flex-col items-center pt-4 pb-4 bg-orange-500 text-black">
        <!-- Logo and Navigation Links -->
        <div class="flex justify-between items-center w-full max-w-[1200px] px-4">
            <!-- Logo -->
            <div class="flex items-center">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/c07ed2031ec7bea072d7548479a109d830e8385d7bf51d994e8d8efa435fabc6?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
                    alt="Company logo" class="object-contain w-[100px] mr-4" />
            </div>

            <!-- Navigation Links -->
            <nav class="flex gap-6 text-sm font-medium">
                <a href="/" class="self-stretch my-auto hover:underline">Home</a>
                <a href="/grade" class="self-stretch my-auto hover:underline">Grade</a>
                <a href="/about" class="self-stretch my-auto hover:underline">About Us</a>
            </nav>

            <!-- Social Media Icons -->
            <div class="flex gap-3">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/01732840aefcc4af14424b7bff656e0488f1c7acd9a2e5363ef1af78b65c3a4a?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
                    alt="Social media icon" class="object-contain w-6 h-6" />
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/fa5935a0c925fffea3d3032fbc8196cb446b3d30f172b928c72fdc55b530b1de?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
                    alt="Social media icon" class="object-contain w-6 h-6" />
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/1497b4ab3453076fbba06d5a4c4807faebcbaf88f3d1e7f29add157968e344fd?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
                    alt="Social media icon" class="object-contain w-6 h-6" />
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/54e6925eb92f3ae87122ed4be65ec72962c9e7536ef9abdcc5d6385344fd884e?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
                    alt="Social media icon" class="object-contain w-6 h-6" />
            </div>
        </div>

        <!-- Footer Bottom Links -->
        <div class="flex justify-center items-center w-full mt-4 px-4 text-xs text-center max-w-[1200px]">
            <div class="flex justify-between w-full border-t border-gray-800 pt-4">
                <p class="text-sm font-semibold">Designed by FindingFabric Team</p>
                <nav class="flex gap-4">
                    <a href="#" class="hover:underline">Privacy Policy</a>
                    <a href="#" class="hover:underline">Terms of Service</a>
                    <a href="#" class="hover:underline">Cookies Settings</a>
                </nav>
            </div>
        </div>
    </footer>
</template>

<script script>
    import {
        Link
    } from '@inertiajs/vue3'

</script>
