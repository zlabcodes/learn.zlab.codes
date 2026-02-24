<template>
  <v-card class="ma-2" max-width="400">
    <v-img :src="course.image" height="200px" />
    <v-card-title>{{ course.title }}</v-card-title>
    <v-card-subtitle>{{ course.instructor }}</v-card-subtitle>
    <v-card-text>{{ course.description }}</v-card-text>
    <v-card-actions>
      <v-btn color="primary">View</v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { defineProps } from 'vue'
const props = defineProps({
  course: {
    type: Object,
    required: true,
    validator: c => !!c.title && !!c.description && !!c.image && !!c.instructor,
  },
})
</script>

<!--
  CourseCard.vue
  Reusable card for displaying course information
  Props:
    - course: { title, description, image, instructor }
  Emits: none
  Usage: <CourseCard :course="course" />
--> 