<script setup>
import { useForm, router } from '@inertiajs/vue3';
import DefaultCard from '@/Components/Forms/DefaultCard.vue';

defineProps({
    errors: {
        type: Object,
        default: () => ({}),
    },
    jenis: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({
    jenis: null,
    bobot: null,
});

function submit() {
    form.post('/jenis', {
        forceFormData: true, // Ensures file uploads are sent as multipart/form-data
        onSuccess: () => {
            clearForm();
            router.get(route('jenis.index')); // Redirect after successful form submission
        },
    });
}

function clearForm() {
    form.reset();
}
</script>

<template>
    <!-- ====== Form Elements Section Start -->
    <div class="grid grid-cols-1 gap-9">
        <div class="flex flex-col gap-9">
            <!-- Input Fields Start -->
            <DefaultCard cardTitle="Input Jenis Kain">
                <form @submit.prevent="submit">
                    <div class="flex flex-col gap-5.5 p-6.5">
                        <div>
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Jenis Kain
                            </label>
                            <input
                                type="text"
                                v-model="form.jenis"
                                placeholder="Jenis Kain"
                                class="w-full rounded-lg border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                            />
                            <div class="text-danger text-xs" v-if="errors.jenis">{{ errors.jenis }}</div>
                        </div>
                        <div>
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Bobot
                            </label>
                            <select
                                v-model="form.bobot"
                                class="w-full rounded-lg border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                            >
                                <option disabled value="">Pilih Bobot</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <div class="text-danger text-xs" v-if="errors.bobot">{{ errors.bobot }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <button type="submit" class="bg-meta-3 text-white rounded-full mr-3 px-8 py-4 text-lg">Submit</button>
                            <button type="button" @click="clearForm" class="bg-slate-600 text-white rounded-full ml-3 px-8 py-4 text-lg">Clear</button>
                        </div>
                    </div>
                </form>
            </DefaultCard>
            <!-- Input Fields End -->
        </div>
    </div>
    <!-- ====== Form Elements Section End -->
</template>
