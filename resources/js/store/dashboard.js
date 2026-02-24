import { defineStore } from 'pinia'
import api from '../utils/api'

export const useDashboardStore = defineStore('dashboard', {
  state: () => ({
    courses: [],
    notifications: [],
    loading: false,
    error: null,
  }),
  actions: {
    async fetchDashboard() {
      this.loading = true
      this.error = null
      try {
        const [courses, notifications] = await Promise.all([
          api.get('/api/courses'),
          api.get('/api/notifications'),
        ])
        this.courses = courses.data
        this.notifications = notifications.data
      } catch (e) {
        this.error = e
      } finally {
        this.loading = false
      }
    },
  },
}) 