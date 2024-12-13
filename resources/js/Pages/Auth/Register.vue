<template>
    <div class="min-h-screen bg-[#FEF7F3] flex flex-col">
        <div class="flex-grow flex items-center justify-center px-3 py-6">
            <div
                class="w-full max-w-5xl flex items-center justify-between space-x-12 max-md:flex-col max-md:space-x-0 max-md:space-y-8">
                <main class="mt-10 w-full max-w-[1097px] max-md:mt-8 max-md:max-w-full flex">
                    <!-- Teks Utama dan Gambar dalam Flex -->
                    <section class="flex items-center w-full max-md:flex-col max-md:w-full">
                        <div class="flex-1 max-md:text-center max-md:flex max-md:flex-col max-md:items-center">
                            <h4 class="text-2xl font-bold text-red-600 max-md:text-3xl mb-3">Welcome to</h4>
                            <h4 class="text-3xl font-bold text-orange-500 max-md:text-3xl mb-4">
                                Finding <span class="text-black">Fabric</span>
                            </h4>
                            <p class="text-base font-light text-gray-600 mb-6">"Kain Tepat, Pilihan Cermat."</p>

                            <Link href="/" class="inline-block px-4 py-3 text-sm font-semibold text-black bg-orange-500 
                               rounded-lg hover:bg-orange-600 focus:outline-none focus:ring-2 
                               focus:ring-offset-2 focus:ring-orange-500 transition duration-300">
                            Explore our website
                            </Link>
                        </div>
                        <!-- Gambar Ilustrasi di Samping Teks -->
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/9b737e1b0b1e72129b38d1b4a2977759bc61696df4c1bfd25f0dc0512bcf9e32?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
                            alt="Finding Fabric visual representation"
                            class="ml-6 w-[350px] h-auto max-md:mt-4 max-md:ml-0 max-md:w-[150px]" />
                    </section>

                    <!-- Formulir Registrasi -->
                    <section class="w-full max-w-[400px] bg-white p-10 rounded-xl shadow-2xl">
                        <h2 class="text-2xl font-bold text-center text-orange-600 mb-6">Sign Up to Finding Fabric</h2>
                        <form @submit.prevent="handleRegister" class="flex flex-col gap-3 text-sm">
                            <div v-if="form.errors.name" class="text-red-500 text-sm">
                                {{ form.errors.name }}
                            </div>
                            <input id="name" v-model="form.name"
                                class="px-3 py-2 text-black bg-gray-50 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-orange-500"
                                placeholder="Full Name" required />

                            <div v-if="form.errors.email" class="text-red-500 text-sm">
                                {{ form.errors.email }}
                            </div>
                            <input id="email" v-model="form.email"
                                class="px-3 py-2 text-black bg-gray-50 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-orange-500"
                                placeholder="Email" required />

                            <div v-if="form.errors.password" class="text-red-500 text-sm">
                                {{ form.errors.password }}
                            </div>
                            <input id="password" type="password" v-model="form.password"
                                class="px-3 py-2 text-black bg-gray-50 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-orange-500"
                                placeholder="Password" required />

                            <input id="password_confirmation" type="password" v-model="form.password_confirmation"
                                class="px-3 py-2 text-black bg-gray-50 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-orange-500"
                                placeholder="Confirm Password" required />

                            <button type="submit"
                                class="w-full py-2 mt-3 text-lg font-semibold text-white bg-orange-500 rounded-md shadow-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                SIGN UP
                            </button>
                            <div class="text-center mt-4">
                                <p class="text-sm text-gray-600">
                                    Already have an account?
                                    <Link href="/login" class="font-medium text-orange-600 hover:text-orange-500">
                                    Sign In
                                    </Link>
                                </p>
                            </div>
                        </form>
                    </section>
                </main>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import { Link, router } from '@inertiajs/vue3';

// Using Inertia's useForm for better form handling
const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
});

// Simplified handleRegister using Inertia's form submission
const handleRegister = () => {
    form.post('/register', {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
        }
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