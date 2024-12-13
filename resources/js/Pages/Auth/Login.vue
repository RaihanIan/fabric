<template>
    <div class="min-h-screen bg-[#FEF7F3] flex flex-col">
        <div class="flex-grow flex items-center justify-center px-6 py-12">
            <div class="w-full max-w-5xl flex items-center justify-between space-x-12 max-md:flex-col max-md:space-x-0 max-md:space-y-8">
                <!-- Left Side: Text Content -->
                <div class="flex-1 max-md:text-center max-md:flex max-md:flex-col max-md:items-center">
                    <h4 class="text-2xl font-bold text-red-600 max-md:text-3xl mb-3">Welcome to</h4>
                    <h4 class="text-3xl font-bold text-orange-500 max-md:text-3xl mb-4">
                        Finding <span class="text-black">Fabric</span>
                    </h4>
                    <p class="text-base font-light text-gray-600 mb-6">"Kain Tepat, Pilihan Cermat."</p>

                    <Link href="/"
                        class="inline-block px-4 py-3 text-sm font-semibold text-black bg-orange-500 
                               rounded-lg hover:bg-orange-600 focus:outline-none focus:ring-2 
                               focus:ring-offset-2 focus:ring-orange-500 transition duration-300">
                        Explore our website
                    </Link>
                </div>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/9b737e1b0b1e72129b38d1b4a2977759bc61696df4c1bfd25f0dc0512bcf9e32?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
                    alt="Finding Fabric visual representation"
                    class="ml-6 w-[350px] h-auto max-md:mt-4 max-md:ml-0 max-md:w-[150px]" />

                <!-- Right Side: Illustration and Login Form -->
                <div class="w-full max-w-[400px] bg-white p-10 rounded-xl shadow-2xl">
                    <h2 class="text-2xl font-bold text-center text-orange-600 mb-6">Sign In to Finding Fabric</h2>
                    <form @submit.prevent="submit" class="flex flex-col gap-5">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email
                                Address</label>
                            <input id="email" name="email" type="email" autocomplete="email"
                                :class="{'border-red-500': form.errors?.email, 'border-red-500': form.errors?.email}"
                                v-model="form.email" required class="w-full px-4 py-3 text-black bg-gray-50 border border-gray-300 
                                           rounded-lg shadow-md focus:outline-none focus:ring-2 
                                           focus:ring-orange-500 transition duration-300"
                                placeholder="Enter your email address" />
                            <p v-if="form.errors?.email" class="text-red-500 text-sm mt-1">
                                {{ form.errors.email }}
                            </p>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                :class="{'border-red-500': form.errors?.password}" v-model="form.password" required
                                class="w-full px-4 py-3 text-black bg-gray-50 border border-gray-300 
                                           rounded-lg shadow-md focus:outline-none focus:ring-2 
                                           focus:ring-orange-500 transition duration-300"
                                placeholder="Enter your password" />
                            <p v-if="form.errors?.password" class="text-red-500 text-sm mt-1">
                                {{ form.errors.password }}
                            </p>
                        </div>

                        <button type="submit" class="w-full py-3 mt-4 text-lg font-semibold text-white 
                                       bg-orange-500 rounded-lg shadow-md hover:bg-orange-600 
                                       focus:outline-none focus:ring-2 focus:ring-offset-2 
                                       focus:ring-orange-500 transition duration-300 
                                       disabled:opacity-50 disabled:cursor-not-allowed" :disabled="form.processing">
                            {{ form.processing ? 'Signing In...' : 'SIGN IN' }}
                        </button>

                        <div class="text-center mt-4">
                            <p class="text-sm text-gray-600">
                                Don't have an account?
                                <Link href="/register" class="font-medium text-orange-600 hover:text-orange-500">
                                Sign up
                                </Link>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import {
        Link,
        useForm
    } from '@inertiajs/vue3';

    // Deklarasi form dengan useForm dari Inertia.js
    const form = useForm({
        email: '',
        password: '',
    });

    // Fungsi submit untuk login
    const submit = () => {
        form.post('/login', {
            onError: (errors) => {
                console.error('Login errors:', errors);
            },
        });
    };

</script>

<style scoped>
    body {
        background-color: #FEF7F3;
        margin: 0;
        padding: 0;
    }

</style>
