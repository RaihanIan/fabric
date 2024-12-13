<script setup>
import FormHarga from '@/Pages/Forms/FormHarga.vue'
import TableHarga from '@/Components/Tables/TableHarga.vue'
import DefaultLayout from '@/Layouts/DefaultLayout.vue'
import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue'

const { props } = usePage();
const hargaData = ref(props.harga || []);
</script>

<template>
    <DefaultLayout>
      <FormHarga :harga="hargaData" />
      <TableHarga :harga="hargaData" />
      </DefaultLayout>
</template>
