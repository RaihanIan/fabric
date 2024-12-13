<script setup>
import { useSidebarStore } from '@stores/sidebar'
import { useRoute, useRouter } from 'vue-router'

// Mendapatkan router dan store untuk sidebar
const router = useRouter()
const sidebarStore = useSidebarStore()

// Menerima props item dan index
const props = defineProps({
  item: {
    type: Object,
    required: true
  },
  index: {
    type: Number,
    required: true
  }
})

// Mendapatkan nama halaman saat ini
const currentPage = useRoute().name

// Fungsi untuk menangani klik pada item sidebar
const handleItemClick = () => {
  // Pastikan item ada dan memiliki aksi jika didefinisikan
  if (props.item && typeof props.item.action === 'function') {
    props.item.action()
    return
  }

  // Pastikan item memiliki properti route dan properti route tersebut adalah string
  if (props.item && typeof props.item.route === 'string') {
    router.push(props.item.route).catch((err) => {
      if (err.name !== 'NavigationDuplicated') throw err
    })
  }

  // Toggle sidebar page untuk memperlihatkan atau menyembunyikan dropdown
  if (props.item) {
    sidebarStore.page = sidebarStore.page === props.item.label ? '' : props.item.label
  }
}
</script>

<template>
  <li>
    <!-- Pastikan item.route terdefinisi dan valid -->
    <router-link
      v-if="item?.route && typeof item.route === 'string'"
      :to="item.route"
      class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
      @click.prevent="handleItemClick"
      :class="{
        'bg-graydark dark:bg-meta-4': sidebarStore.page === item.label
      }"
    >
      <span v-html="item.icon"></span>
      {{ item.label }}
    </router-link>

    <!-- Jika tidak ada route tapi ada children -->
    <div v-else-if="item?.children" class="translate transform overflow-hidden" v-show="sidebarStore.page === item.label">
      <SidebarDropdown
        :items="item.children"
        :currentPage="currentPage"
        :page="item.label"
      />
    </div>
  </li>
</template>
