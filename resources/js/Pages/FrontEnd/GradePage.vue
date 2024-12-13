<template>
    <div class="flex flex-col pt-4 bg-white h-screen">
        <Navbar />
        <!-- Section dengan full screen dan konten di tengah -->
        <section class="flex-grow flex items-center justify-center max-w-[900px] mx-auto px-4">
            <div class="flex items-center gap-6 flex-row max-w-full">
                <!-- Teks di sebelah kiri -->
                <div class="flex flex-col items-start max-md:max-w-full">
                    <h1 class="text-3xl md:text-4xl font-bold text-black">
                        <span class="text-orange-500">Grade</span> Supplier
                    </h1>
                    <p class="mt-4 text-base md:text-lg font-light text-black">
                        Sistem grade supplier ini membantu pengguna Finding Fabric dalam menilai supplier
                        berdasarkan
                        pengalaman pengguna lain dan kriteria harga sesuai yang di inginkan.
                    </p>
                </div>

                <!-- Gambar di sebelah kanan -->
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/c7468304ba93311e4b6d7feba6c6c9d5f0b2deb01b2e75331d1680ea6477a430?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf"
                    alt="Decorative image"
                    class="object-contain w-[300px] h-[300px] md:w-[400px] md:h-[400px] max-md:max-w-full max-md:h-auto" />
            </div>
        </section>

        <!-- Lingkaran dekoratif, dipindahkan ke posisi lebih tinggi -->
        <div class="flex flex-col items-end mt-2 gap-2 max-w-full w-[100px] mr-8">
            <div class="w-2.5 h-2.5 bg-green-500 rounded-full"></div>
            <div class="w-2.5 h-2.5 bg-yellow-300 rounded-full"></div>
        </div>
        <div v-if="selectedSupplier" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="w-4/5 max-w-6xl bg-white rounded-lg shadow-xl">
                <header class="flex flex-col w-full">
                    <section class="pt-8 pb-10 pl-10 pr-10 bg-orange-50 rounded-lg">
                        <div class="flex flex-col lg:flex-row gap-10">
                            <!-- Bagian Gambar -->
                            <div class="flex flex-col w-full lg:w-2/5 items-center">
                                <h1 class="text-4xl font-bold text-orange-500">Detail Supplier</h1>
                                <img :src="selectedSupplier.foto_supplier ? `/storage/${selectedSupplier.foto_supplier}` : '/images/default.png'"
                                    alt="Supplier detail image"
                                    class="mt-5 object-cover shadow-lg rounded-lg w-full max-w-xs" />
                            </div>

                            <!-- Bagian Detail -->
                            <div class="flex flex-col w-full lg:w-3/5">
                                <h2 class="text-3xl font-bold text-gray-800">{{ selectedSupplier.nama_supplier }}</h2>
                                <a :href="`mailto:${selectedSupplier.email}`"
                                    class="text-lg font-medium text-orange-600 underline mt-2">
                                    {{ selectedSupplier.email }}
                                </a>
                                <address class="mt-3 text-lg text-gray-600 not-italic">
                                    {{ selectedSupplier.alamat }}
                                </address>
                                <p class="mt-5 text-justify text-gray-700">
                                    {{ selectedSupplier.catatantambahan }}
                                </p>

                                <!-- Informasi Ketersediaan -->
                                <div class="mt-6">
                                    <p class="font-semibold text-lg text-gray-800">Ketersediaan Barang:</p>
                                    <div
                                        class="mt-2 py-2 px-4 text-lg font-semibold text-center border border-gray-400 rounded-lg bg-gray-50">
                                        {{ selectedSupplier.ketersediaan ? selectedSupplier.ketersediaan.ketersediaan : 'N/A' }}
                                    </div>
                                </div>

                                <!-- Harga dan Tombol -->
                                <div class="mt-6">
                                    <p class="font-semibold text-lg text-gray-800">Harga per Kg:</p>
                                    <p class="mt-2 text-2xl font-bold text-orange-600">
                                        {{ selectedSupplier.harga ? selectedSupplier.harga.harga : 'N/A' }}/Kg
                                    </p>
                                    <div class="mt-5 flex gap-4">
                                        <button @click="closeDetailModal"
                                            class="px-4 py-3 text-white bg-red-500 rounded-lg hover:bg-red-600">
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </header>
            </div>
        </div>

        <LineKain />
        <section class="flex flex-col mt-24 w-full max-md:mt-10 max-md:max-w-full">
            <h2 class="self-center text-5xl font-bold leading-tight text-center text-black max-md:text-4xl">
                Daftar Suppliers
            </h2>
            <div
                class="flex flex-col self-center px-px pt-7 mt-12 w-full font-extrabold text-center bg-white rounded-xl border border-solid border-black border-opacity-30 max-w-[1327px] shadow-[0px_4px_4px_rgba(0,0,0,0.25)] max-md:mt-10 max-md:max-w-full">
                <form
                    class="flex gap-3  items-start px-5 pb-4 ml-16 max-w-full bg-white rounded-xl max-md:pl-5 max-md:ml-2.5"
                    @submit.prevent="applyFilters">
                    <!-- Filter Harga -->
                    <div class="flex flex-col self-start">
                        <label for="hargaFilter" class="text-sm font-bold text-black">Filter Harga</label>
                        <select id="hargaFilter" v-model="selectedHarga" class="border rounded p-2">
                            <option value="">Semua Harga</option>
                            <option value="<100k">
                                < 100.000</option> <option value="100k-110k"> 100k - 110k
                            </option>
                            <option value="110k-120k">110k - 120k</option>
                            <option value="120k-130k">120k - 130k</option>
                            <option value=">130k"> > 130.000</option>
                        </select>
                    </div>

                    <!-- Filter Jenis Kain -->
                    <div class="flex flex-col self-start">
                        <label for="jenisFilter" class="text-sm font-bold text-black">Filter Jenis Kain</label>
                        <select id="jenisFilter" v-model="selectedJenis" class="border rounded p-2">
                            <option value="">Semua Jenis</option>
                            <option value="Katun Combed">Katun Combed</option>
                            <option value="Katun Carded">Katun Carded</option>
                            <option value="Polyester">Polyester</option>
                            <option value="Viscose">Viscose</option>
                            <option value="CVC (Cotton Viscose)">CVC (Cotton Viscose)</option>
                        </select>
                    </div>

                    <!-- Filter Ketersediaan -->
                    <div class="flex flex-col self-start">
                        <label for="ketersediaanFilter" class="text-sm font-bold text-black">Filter Ketersediaan</label>
                        <select id="ketersediaanFilter" v-model="selectedKetersediaan" class="border rounded p-2">
                            <option value="">Semua Ketersediaan</option>
                            <option value="Sangat Tersedia">Sangat Tersedia</option>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Cukup Tersedia">Cukup Tersedia</option>
                            <option value="Terbatas">Terbatas</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                </form>
                <div
                class="flex flex-wrap justify-center items-center mt-4 text-base text-black whitespace-nowrap
                bg-slate-100 min-h-[78px]">
                <div class="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full">No</div>
                <div class="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full">Logo</div>
                <div class="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full">Nama</div>
                <div class="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full">Jenis Kain</div>
                <div class="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full">Harga</div>
                <div class="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full">Ketersediaan</div>
                <div class="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full">Peringkat</div>
                <template v-if="$page.props.auth.user">
                    <div class="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full">Aksi</div>
                </template>
            </div>
            <div class="flex flex-col mt-1 mb-0 w-full text-base text-black max-md:mb-2.5 max-md:max-w-full">
                <div v-for="(supplier, index) in filteredSuppliers" :key="supplier.id"
                    class="flex flex-wrap items-center w-full whitespace-nowrap border-b border-black border-opacity-20 min-h-[80px] max-md:max-w-full">
                    <div class="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full text-center font-bold">
                        {{ index + 1 }}
                    </div>
                    <div class="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full">
                        <img :src="supplier.foto_supplier ? `/storage/${supplier.foto_supplier}` : '/images/default.png'"
                            class="h-16 w-16 mx-auto rounded-full object-cover" :alt="supplier.nama_supplier" />
                    </div>
                    <div class="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full">
                        {{ supplier.nama_supplier }}
                    </div>
                    <div class="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full">
                        {{ supplier.jenis ? supplier.jenis.jenis : 'N/A' }}
                    </div>
                    <div class="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full">
                        {{ supplier.harga ? `Rp ${supplier.harga.harga?.toLocaleString()}` : 'N/A' }}
                    </div>
                    <div class="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full">
                        {{ supplier.ketersediaan ? supplier.ketersediaan.ketersediaan : 'N/A' }}
                    </div>
                    <div class="hidden">
                        {{ supplier.vektor_v ? `Vektor V: ${supplier.vektor_v}` : 'N/A' }}
                    </div>
                    <div class="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full text-center font-bold">
    {{ supplier.initialRank }}
</div>
                    <template v-if="$page.props.auth.user">
                        <div class="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full">
                            <button @click="showSupplierDetail(supplier)"
                                class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600">
                                Detail
                            </button>
                        </div>
                    </template>
                </div>
            </div>
            </div>
        </section>
        <Tutorial />
        <Footer />
    </div>
</template>

<script setup>
    import Navbar from '@/Components/Navbar.vue'
    import Footer from '@/Components/Footer.vue'
    import {
        ref,
        computed
    } from 'vue';
    import {
        onMounted
    } from 'vue';
    import LineKain from '@/Components/LandingComponents/LineKain.vue';
    import Tutorial from '@/Components/LandingComponents/Tutorial.vue';
    import GradeLayout from '@/Components/LandingComponents/GradeLayout.vue';

    const props = defineProps({
        suppliers: {
            type: Array,
            required: true,
            default: () => []
        },
        supplier_scores: {
            type: Array,
            default: () => []
        }
    });

    onMounted(() => {
        console.log('Suppliers data:', props.suppliers); // For debugging
    });
    // Compute initial ranking based on vektor_v
    const initialRankings = computed(() => {
        // Create a copy of suppliers and sort by vektor_v
        const rankedSuppliers = props.suppliers
            .map(supplier => {
                const scoreEntry = props.supplier_scores.find(score => score.id === supplier.id);
                const vektor_v = scoreEntry ? parseFloat(scoreEntry.vektor_v).toFixed(3) : "0.000";
                return {
                    ...supplier,
                    vektor_v
                };
            })
            .sort((a, b) => {
                const vektorA = parseFloat(a.vektor_v || 0);
                const vektorB = parseFloat(b.vektor_v || 0);
                return vektorB - vektorA;
            });

        // Create a mapping of supplier ID to its initial rank
        const rankings = {};
        rankedSuppliers.forEach((supplier, index) => {
            rankings[supplier.id] = index + 1;
        });

        return rankings;
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

    const selectedSupplier = ref(null);

    // Show supplier details in modal
    const showSupplierDetail = (supplier) => {
        selectedSupplier.value = supplier;
    };

    // Close detail modal
    const closeDetailModal = () => {
        selectedSupplier.value = null;
    };


    // State untuk filter
    const selectedHarga = ref('');
    const selectedJenis = ref('');
    const selectedKetersediaan = ref('');

    // Data hasil filter
    const filteredSuppliers = computed(() => {
        // Filter suppliers berdasarkan harga, jenis kain, dan ketersediaan
        const filtered = props.suppliers.filter((supplier) => {
            // Filter Harga
            const harga = supplier.harga?.harga || 0;
            const hargaFilter = selectedHarga.value;
            if (hargaFilter) {
                if (hargaFilter === '<100k' && harga >= 100000) return false;
                if (hargaFilter === '100k-110k' && (harga < 100000 || harga > 110000)) return false;
                if (hargaFilter === '110k-120k' && (harga < 110000 || harga > 120000)) return false;
                if (hargaFilter === '120k-130k' && (harga < 120000 || harga > 130000)) return false;
                if (hargaFilter === '>130k' && harga <= 130000) return false;
            }

            // Filter Jenis Kain
            if (selectedJenis.value && supplier.jenis?.jenis !== selectedJenis.value) {
                return false;
            }

            // Filter Ketersediaan
            if (selectedKetersediaan.value && supplier.ketersediaan?.ketersediaan !==
                selectedKetersediaan.value) {
                return false;
            }

            return true;
        }).map(supplier => {
            // Add vektor_v and initial ranking to each supplier
            const scoreEntry = props.supplier_scores.find(score => score.id === supplier.id);
            const vektor_v = scoreEntry ? parseFloat(scoreEntry.vektor_v).toFixed(3) : "0.000";
            return {
                ...supplier,
                vektor_v,
                initialRank: initialRankings.value[supplier.id] || 0
            };
        }).sort((a, b) => a.initialRank - b.initialRank);  // Sort by initial ranking

        return filtered;
    });


    // Fungsi untuk menangani filter
    const applyFilters = () => {
        console.log('Filters applied:', {
            selectedHarga: selectedHarga.value,
            selectedJenis: selectedJenis.value,
            selectedKetersediaan: selectedKetersediaan.value,
        });
    };

</script>

<style scoped>
    .visually-hidden {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
    }

</style>
