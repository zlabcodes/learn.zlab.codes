<template>
  <v-navigation-drawer app permanent>
    <v-list>
      <v-list-item v-for="item in menu" :key="item.title" :to="item.route">
        <v-list-item-icon>
          <v-icon>{{ item.icon }}</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>{{ item.title }}</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script setup>
import { ref } from 'vue'
const menu = ref([
  { title: 'Dashboard', icon: 'mdi-view-dashboard', route: '/' },
  { title: 'Courses', icon: 'mdi-book-open-page-variant', route: '/courses' },
  { title: 'Users', icon: 'mdi-account-group', route: '/users' },
  { title: 'Notifications', icon: 'mdi-bell', route: '/notifications' },
])
</script>

<!--
  Sidebar.vue
  Reusable navigation sidebar for LMS dashboard
  Props: none
  Emits: none
  Usage: <Sidebar />
--> 