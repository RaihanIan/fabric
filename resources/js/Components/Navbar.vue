<template>
    <header data-layername="navbar"
        class="flex flex-wrap gap-10 justify-between items-center py-2 pr-40 pl-24 text-lg font-medium text-black max-md:px-5">
        <img loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/3583a3d1f51eeb65661c9398013707eb21d754cc3833f18bf7a42fefc3b054d1?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
            class="object-contain shrink-0 self-stretch my-auto w-20 aspect-[1.11]" alt="Company logo" />
        <nav data-layername="navItem"
            class="flex gap-10 justify-between items-center self-stretch my-auto min-w-[240px] w-[464px] max-md:max-w-full">
            <Link href="/" data-layername="home" class="self-stretch my-auto">Home</Link>
            <Link href="/grade" data-layername="grade" class="self-stretch my-auto">Grade</Link>
            <Link href="/about" data-layername="about" class="self-stretch my-auto">About Us</Link>

            <!-- Conditional rendering for Login/Logout -->
            <template v-if="$page.props.auth.user">
                <Link method="post" href="/logout" class="logout-button">
                Logout
                </Link>
            </template>
            <template v-else>
                <Link href="/login" class="login-button">
                Login
                </Link>
            </template>
        </nav>
    </header>
</template>

<script setup>
    import {
        Link,
        router
    } from '@inertiajs/vue3'

    const logout = () => {
        try {
            // Check if the route exists
            const logoutRoute = route('logout.destroy');

            // If route exists, proceed with logout
            router.post(logoutRoute, {}, {
                onError: (errors) => {
                    console.error('Logout failed', errors);
                    alert('Logout failed. Please try again.');
                },
                onSuccess: () => {
                    // Optional: add any success handling
                    console.log('Logout successful');
                }
            });
        } catch (error) {
            console.error('Route error:', error);
            alert('Logout route not found. Please contact support.');
        }
    };
</script>