<script setup>
import Navbar from '@/Components/Navbar.vue'
import Footer from '@/Components/Footer.vue'
</script>

<template>
  <Navbar/>
  <main>
    <slot></slot>
  </main>
  <Footer/>
</template>
