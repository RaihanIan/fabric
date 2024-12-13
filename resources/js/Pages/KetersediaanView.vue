<script setup>
import FormKetersediaan from '@/Pages/Forms/FormKetersediaan.vue'
import TableKetersediaan from '@/Components/Tables/TableKetersediaan.vue'
import DefaultLayout from '@/Layouts/DefaultLayout.vue'
import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue'

const { props } = usePage();
const ketersediaanData = ref(props.ketersediaan || []);

</script>

<template>
    <DefaultLayout>
      <FormKetersediaan />
      <TableKetersediaan :ketersediaan="ketersediaanData" />
      </DefaultLayout>
</template>