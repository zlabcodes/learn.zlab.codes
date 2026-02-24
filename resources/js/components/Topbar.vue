<template>
  <v-app-bar app color="primary" dark>
    <v-toolbar-title>LMS Dashboard</v-toolbar-title>
    <v-spacer />
    <v-btn icon>
      <v-icon>mdi-bell</v-icon>
    </v-btn>
    <v-avatar>
      <img src="https://i.pravatar.cc/40" alt="User" />
    </v-avatar>
  </v-app-bar>
</template>

<script setup>
// Topbar logic can be extended for notifications, user menu, etc.
</script>

<!--
  Topbar.vue
  Reusable top navigation bar for LMS dashboard
  Props: none
  Emits: none
  Usage: <Topbar />
--> 