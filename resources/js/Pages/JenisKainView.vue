<script setup>
import FormJenisKain from '@/Pages/Forms/FormJenisKain.vue'
import TableJenisKain from '@/Components/Tables/TableJenisKain.vue'
import DefaultLayout from '@/Layouts/DefaultLayout.vue'
import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue'

const { props } = usePage();
const jenisData = ref(props.jenis || []);

</script>

<template>
    <DefaultLayout>
      <FormJenisKain />
      <TableJenisKain :jenis="jenisData" />
      </DefaultLayout>
</template>
