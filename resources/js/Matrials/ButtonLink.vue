<script setup>
  import { Link } from "@inertiajs/vue3";
  import { defineProps } from "vue";
  defineProps({
    link: {
      type: String,
      required: true,
    },
  });
  </script>

<template>
    <Link
      :href="link"
      class="text-white px-4 py-2 rounded-lg"
    >
      <slot />
    </Link>
  </template>
  