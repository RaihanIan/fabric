<template>
  <DefaultLayout>
      <FormSupplier :hargaOptions="hargaOptions" :jenisKainOptions="jenisKainOptions" :ketersediaanOptions="ketersediaanOptions" />
      <TableSupplier :hargaOptions="hargaOptions" :jenisKainOptions="jenisKainOptions" :ketersediaanOptions="ketersediaanOptions" :suppliers="suppliers" :supplier_scores="supplier_scores" />
  </DefaultLayout>
</template>

<script setup>
import FormSupplier from '@/Pages/Forms/FormSupplier.vue';
import TableSupplier from '@/Components/Tables/TableSupplier.vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import { defineProps } from 'vue';

const props = defineProps({
  hargaOptions: Array,
  jenisKainOptions: Array,
  ketersediaanOptions: Array,
  suppliers: Array, // Add suppliers as a prop here
  supplier_scores: Array, // Add supplier_scores as a prop
});
</script>