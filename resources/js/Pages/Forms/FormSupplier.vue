<script setup>
import { ref, onMounted } from 'vue';
import { useForm, router } from '@inertiajs/vue3';
import DefaultCard from '@/Components/Forms/DefaultCard.vue';

const form = useForm({
    nama_supplier: '',
    foto_supplier: '',
    alamat: '',
    email: '',
    catatantambahan: '',
    harga_id: null,
    jenis_id: null,
    ketersediaan_id: null,
});

const suppliers = ref([]);
const supplierVectorV = ref({}); // Tambahkan vector V
const hargaOptions = ref([]);
const jenisKainOptions = ref([]);
const ketersediaanOptions = ref([]);
const error = ref(null);

// Fungsi untuk mengambil data dari API dengan error handling
const fetchOptions = async () => {
    try {
        const [hargaResponse, jenisKainResponse, ketersediaanResponse] = await Promise.all([
            fetch('/api/harga').then(res => res.json()),
            fetch('/api/jenis').then(res => res.json()),
            fetch('/api/ketersediaan').then(res => res.json())
        ]);

        if (!hargaResponse || !jenisKainResponse || !ketersediaanResponse) {
            throw new Error('Data tidak valid');
        }

        hargaOptions.value = hargaResponse;
        jenisKainOptions.value = jenisKainResponse;
        ketersediaanOptions.value = ketersediaanResponse;
        error.value = null;
    } catch (e) {
        console.error('Error fetching options:', e);
        error.value = 'Terjadi kesalahan saat mengambil data. Silakan coba lagi.';
        hargaOptions.value = [];
        jenisKainOptions.value = [];
        ketersediaanOptions.value = [];
    }
};

function submitForm() {
    // Tambahkan validasi sebelum submit
    if (!form.harga_id || !form.jenis_id || !form.ketersediaan_id) {
        error.value = 'Harap lengkapi semua pilihan yang wajib diisi';
        return;
    }

    form.post('/supplier', {
        forceFormData: true,
        onSuccess: () => {
            clearForm();
            router.get(route('supplier.index'));
        },
        onError: (errors) => {
            console.error('Form submission errors:', errors);
        }
    });
}

const logoPreview = ref(null);

function handleLogoChange(event) {
    const file = event.target.files[0];
    form.foto_supplier = file;

    if (file) {
        const reader = new FileReader();
        reader.onload = () => {
            logoPreview.value = reader.result;
        };
        reader.readAsDataURL(file);
    } else {
        logoPreview.value = null;
    }
}

const resetForm = () => {
    form.reset();
    error.value = null;
};

onMounted(() => {
    fetchOptions();
    
    // Tambahkan pengecekan sebelum parsing
    if (route().props && route().props.suppliers) {
        suppliers.value = JSON.parse(route().props.suppliers);
    }
    if (route().props && route().props.supplierVectorV) {
        supplierVectorV.value = JSON.parse(route().props.supplierVectorV);
    }
});
</script>

<template>
    <DefaultCard cardTitle="Input Supplier">
        <!-- Error Alert -->
        <div v-if="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            {{ error }}
        </div>

        <form @submit.prevent="submitForm" enctype="multipart/form-data">
            <div class="flex flex-col gap-5.5 p-6.5 grid grid-cols-3">
                <div>
                    <label class="mb-3 block text-sm font-semibold text-black dark:text-white">Nama Supplier</label>
                    <input type="text" placeholder="Nama Supplier" v-model="form.nama_supplier"
                        class="w-full rounded-lg border-[1.5px] py-3 px-5" />
                    <div v-if="form.errors.nama_supplier" class="text-red-500 text-sm mt-1">
                        {{ form.errors.nama_supplier }}
                    </div>
                </div>
                <div>
                    <label class="mb-3 block text-sm font-semibold text-black dark:text-white">Foto Supplier</label>
                    <input 
                    type="file" 
                    @change="handleLogoChange" 
                    class="w-full rounded-lg border border-stroke bg-transparent py-2 px-4 text-black placeholder-gray-400 outline-none focus:border-primary dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                />
                <div v-if="logoPreview" class="mt-4 flex justify-center">
                    <img :src="logoPreview" alt="Logo Preview" class="w-32 h-32 object-cover rounded-lg shadow-md"/>
                </div>
                    <div v-if="form.errors.foto_supplier" class="text-red-500 text-sm mt-1">
                        {{ form.errors.foto_supplier }}
                    </div>
                </div>

                <div>
                    <label class="mb-3 block text-sm font-semibold text-black dark:text-white">Alamat</label>
                    <input type="text" placeholder="Alamat" v-model="form.alamat"
                        class="w-full rounded-lg border-[1.5px] py-3 px-5" />
                    <div v-if="form.errors.alamat" class="text-red-500 text-sm mt-1">
                        {{ form.errors.alamat }}
                    </div>
                </div>
                <div>
                    <label class="mb-3 block text-sm font-semibold text-black dark:text-white">E-Mail</label>
                    <input type="email" placeholder="E-Mail" v-model="form.email"
                        class="w-full rounded-lg border-[1.5px] py-3 px-5" />
                    <div v-if="form.errors.email" class="text-red-500 text-sm mt-1">
                        {{ form.errors.email }}
                    </div>
                </div>
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">Catatan Tambahan</label>
                    <input type="text" placeholder="Catatan Tambahan" v-model="form.catatantambahan"
                        class="w-full rounded-lg border-[1.5px] py-3 px-5" />
                    <div v-if="form.errors.catatantambahan" class="text-red-500 text-sm mt-1">
                        {{ form.errors.catatantambahan }}
                    </div>
                </div>
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">Harga/Kg</label>
                    <select v-model="form.harga_id" class="w-full rounded border py-3 px-5">
                        <option value="" disabled selected>Pilih Harga/Kg</option>
                        <option v-for="option in hargaOptions" :key="option.id" :value="option.id">
                            {{ option.name }}
                        </option>
                    </select>
                    <div v-if="form.errors.harga_id" class="text-red-500 text-sm mt-1">
                        {{ form.errors.harga_id }}
                    </div>
                </div>
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">Jenis Kain</label>
                    <select v-model="form.jenis_id" class="w-full rounded border py-3 px-5">
                        <option value="" disabled selected>Pilih Jenis Kain</option>
                        <option v-for="option in jenisKainOptions" :key="option.id" :value="option.id">
                            {{ option.name }}
                        </option>
                    </select>
                    <div v-if="form.errors.jenis_id" class="text-red-500 text-sm mt-1">
                        {{ form.errors.jenis_id }}
                    </div>
                </div>
                <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">Ketersediaan Barang</label>
                    <select v-model="form.ketersediaan_id" class="w-full rounded border py-3 px-5">
                        <option value="" disabled selected>Pilih Ketersediaan Barang</option>
                        <option v-for="option in ketersediaanOptions" :key="option.id" :value="option.id">
                            {{ option.name }}
                        </option>
                    </select>
                    <div v-if="form.errors.ketersediaan_id" class="text-red-500 text-sm mt-1">
                        {{ form.errors.ketersediaan_id }}
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-5.5 p-6.5 grid grid-cols-2">
                <button type="submit" class="bg-meta-3 text-white rounded-full mr-3 px-8 py-4 text-lg">Submit</button>
                <button type="button" @click="resetForm"
                    class="bg-slate-600 text-white rounded-full ml-3 px-8 py-4 text-lg">Clear</button>
            </div>
        </form>
    </DefaultCard>
</template>