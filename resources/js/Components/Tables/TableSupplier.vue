<template>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Data Supplier</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Supplier</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Foto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Alamat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Catatan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Harga/Kg</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jenis Kain</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ketersediaan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Vector V</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="supplier in suppliers" :key="supplier.id">
                            <td class="px-6 py-4 whitespace-nowrap">{{ supplier.nama_supplier }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img :src="supplier.foto_supplier ? '/storage/' + supplier.foto_supplier : '/default-avatar.png'"
                                    class="h-16 w-16 rounded-full object-cover" :alt="supplier.nama_supplier" />
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ supplier.alamat }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ supplier.email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ supplier.catatantambahan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ supplier.harga ? supplier.harga.harga : 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ supplier.jenis ? supplier.jenis.jenis : 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ supplier.ketersediaan ? supplier.ketersediaan.ketersediaan : 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ supplier.vektor_v}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <button @click="openEditModal(supplier)"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                        Edit
                                    </button>
                                    <button @click="destroy(supplier.id)"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Edit Modal -->
        <div v-if="isEditModalOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-lg max-w-2xl w-full p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Edit Supplier</h3>
                    <button @click="closeEditModal" class="text-gray-500 hover:text-gray-700">
                        ✕
                    </button>
                </div>

                <form @submit.prevent="saveChanges" class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Foto Supplier</label>
                            <input type="file" @change="handleFileUpload" accept="image/jpg,image/jpeg,image/png"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Supplier</label>
                            <input type="text" v-model="form.nama_supplier"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" v-model="form.email"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Alamat</label>
                            <input type="text" v-model="form.alamat"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Harga</label>
                            <select v-model="form.harga"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="" disabled>Pilih Harga</option>
                                <option v-for="harga in hargaOptions" :key="harga.id" :value="harga.id">
                                    {{ harga.harga }}
                                </option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jenis Kain</label>
                            <select v-model="form.jenis"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="" disabled>Pilih Jenis</option>
                                <option v-for="jenis in jenisKainOptions" :key="jenis.id" :value="jenis.id">
                                    {{ jenis.jenis }}
                                </option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Ketersediaan</label>
                            <select v-model="form.ketersediaan"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="" disabled>Pilih Ketersediaan</option>
                                <option v-for="ketersediaan in ketersediaanOptions" :key="ketersediaan.id"
                                    :value="ketersediaan.id">
                                    {{ ketersediaan.ketersediaan }}
                                </option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Catatan Tambahan</label>
                            <textarea v-model="form.catatantambahan" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" @click="closeEditModal"
                            class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
    import {
        ref,
        computed
    } from 'vue';
    import {
        useForm,
        router
    } from '@inertiajs/vue3';

    const props = defineProps({
        suppliers: {
            type: Array,
            default: () => []
        },
        hargaOptions: {
            type: Array,
            default: () => []
        },
        jenisKainOptions: {
            type: Array,
            default: () => []
        },
        ketersediaanOptions: {
            type: Array,
            default: () => []
        },
        supplier_scores: {
            type: Array,
            default: () => []
        }
    });

    const suppliersWithScores = computed(() => {
        return props.suppliers.map(supplier => {
            const scoreEntry = props.supplier_scores.find(score => score.id === supplier.id);
            const vektor_v = scoreEntry ? parseFloat(scoreEntry.vektor_v).toFixed(3) : "0.000";
            return {
                ...supplier,
                vektor_v
            };
        });
    });

    const form = useForm({
        id: '',
        nama_supplier: '',
        foto_supplier: '',
        email: '',
        alamat: '',
        catatantambahan: '',
        harga: '',
        jenis: '',
        ketersediaan: '',
    });

    const isEditModalOpen = ref(false);

    function openEditModal(supplierData) {
        // Reset form dengan data supplier yang dipilih
        form.id = supplierData.id;
        form.nama_supplier = supplierData.nama_supplier || '';
        form.email = supplierData.email || '';
        form.alamat = supplierData.alamat || '';
        form.catatantambahan = supplierData.catatantambahan || '';

        // Pastikan pengisian data relasi dengan benar
        form.harga = supplierData.harga ? supplierData.harga.id : '';
        form.jenis = supplierData.jenis ? supplierData.jenis.id : '';
        form.ketersediaan = supplierData.ketersediaan ? supplierData.ketersediaan.id : '';

        // Reset foto supplier
        form.foto_supplier = null;

        // Buka modal
        isEditModalOpen.value = true;
    }

    function saveChanges() {
        const formData = new FormData();

        // Append semua field yang diperlukan dengan nama field yang sesuai
        formData.append('_method', 'PUT'); // Untuk metode PUT pada Laravel
        formData.append('nama_supplier', form.nama_supplier);
        formData.append('email', form.email);
        formData.append('alamat', form.alamat);
        formData.append('catatantambahan', form.catatantambahan || '');

        // Gunakan nama field sesuai dengan pesan error
        formData.append('harga_id', form.harga);
        formData.append('jenis_id', form.jenis);
        formData.append('ketersediaan_id', form.ketersediaan);

        // Tambahkan foto jika ada
        if (form.foto_supplier) {
            formData.append('foto_supplier', form.foto_supplier);
        }

        // Kirim data dengan Inertia
        router.post(`/supplier/${form.id}`, formData, {
            forceFormData: true,
            onSuccess: () => {
                closeEditModal();
            },
            onError: (errors) => {
                console.error(errors);
                // Optionally, you can handle and display these errors to the user
                Object.keys(errors).forEach(key => {
                    alert(errors[
                    key]); // Simple error display, you might want to replace this with a more user-friendly approach
                });
            }
        });
    }

    // Add file input handling
    function handleFileUpload(event) {
        form.foto_supplier = event.target.files[0];
    }

    function closeEditModal() {
        isEditModalOpen.value = false;
        form.reset();
    }

    function destroy(id) {
        if (confirm('Are you sure you want to delete this supplier?')) {
            form.delete(`/supplier/${id}`, {
                onSuccess: () => {
                    // You might want to add a success notification here
                },
                onError: () => {
                    // You might want to add error handling here
                },
            });
        }
    }

</script>
