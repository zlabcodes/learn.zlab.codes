<template>
  <v-row>
    <v-col cols="12" sm="4" v-for="stat in stats" :key="stat.label">
      <v-card class="pa-4 text-center">
        <v-icon size="36">{{ stat.icon }}</v-icon>
        <div class="text-h5 mt-2">{{ stat.value }}</div>
        <div class="text-caption">{{ stat.label }}</div>
      </v-card>
    </v-col>
  </v-row>
</template>

<script setup>
import { defineProps } from 'vue'
const props = defineProps({
  stats: {
    type: Array,
    required: false,
    default: () => [
      { label: 'Courses', value: 12, icon: 'mdi-book-open-page-variant' },
      { label: 'Users', value: 120, icon: 'mdi-account-group' },
      { label: 'Notifications', value: 5, icon: 'mdi-bell' },
    ],
  },
})
</script>

<!--
  StatsWidget.vue
  Reusable widget for displaying dashboard statistics
  Props:
    - stats: Array<{ label, value, icon }>
  Emits: none
  Usage: <StatsWidget :stats="stats" />
--> 