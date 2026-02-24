<template>
  <LmsLayout>
    <template #default>
      <StatsWidget />
      <CourseCard v-for="course in courses" :key="course.id" :course="course" />
      <NotificationList :notifications="notifications" />
    </template>
  </LmsLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import LmsLayout from '../layouts/LmsLayout.vue'
import StatsWidget from '../components/StatsWidget.vue'
import CourseCard from '../components/CourseCard.vue'
import NotificationList from '../components/NotificationList.vue'
import { useDashboardStore } from '../store/dashboard'

const dashboardStore = useDashboardStore()
const courses = ref([])
const notifications = ref([])

onMounted(async () => {
  await dashboardStore.fetchDashboard()
  courses.value = dashboardStore.courses
  notifications.value = dashboardStore.notifications
})
</script> 