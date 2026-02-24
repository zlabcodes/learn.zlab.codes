<template>
  <v-list>
    <v-list-item v-for="notification in notifications" :key="notification.id">
      <v-list-item-content>
        <v-list-item-title>{{ notification.title }}</v-list-item-title>
        <v-list-item-subtitle>{{ notification.body }}</v-list-item-subtitle>
      </v-list-item-content>
      <v-list-item-action>
        <v-btn icon>
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </v-list-item-action>
    </v-list-item>
  </v-list>
</template>

<script setup>
import { defineProps } from 'vue'
const props = defineProps({
  notifications: {
    type: Array,
    required: true,
    validator: n => Array.isArray(n),
  },
})
</script>

<!--
  NotificationList.vue
  Reusable list for displaying notifications
  Props:
    - notifications: Array<{ id, title, body }>
  Emits: none
  Usage: <NotificationList :notifications="notifications" />
--> 