<template>
  <div class="login-wrapper">
    <v-container fluid class="fill-height pa-0">
      <v-row no-gutters class="fill-height">
        <!-- Left Panel - Login Form -->
        <v-col cols="12" md="5" lg="4" xl="3" class="login-panel">
          <div class="login-content">
            <!-- Brand/Logo Section -->
            <div class="brand-section mb-8">
              <div class="brand-logo mb-4">
                <v-icon size="40" color="primary">mdi-view-grid</v-icon>
                <span class="brand-text">TheCubeFactory</span>
              </div>
            </div>

            <!-- Welcome Section -->
            <div class="welcome-section mb-8">
              <h1 class="welcome-title">Welcome back</h1>
              <p class="welcome-subtitle">Please enter your details</p>
            </div>

            <!-- Login Form -->
            <v-form @submit.prevent="submit" class="login-form">
              <div class="form-group mb-6">
                <label class="form-label">Email address</label>
                <v-text-field
                  v-model="form.email"
                  type="email"
                  variant="outlined"
                  :error-messages="form.errors.email"
                  :disabled="form.processing"
                  hide-details="auto"
                  class="custom-input"
                />
              </div>

              <div class="form-group mb-6">
                <label class="form-label">Password</label>
                <v-text-field
                  v-model="form.password"
                  :type="showPassword ? 'text' : 'password'"
                  variant="outlined"
                  :append-inner-icon="showPassword ? 'mdi-eye-off' : 'mdi-eye'"
                  @click:append-inner="showPassword = !showPassword"
                  :error-messages="form.errors.password"
                  :disabled="form.processing"
                  hide-details="auto"
                  class="custom-input"
                />
              </div>

              <!-- Remember me and Forgot password -->
              <div class="form-options mb-8">
                <v-checkbox
                  v-model="form.remember"
                  label="Remember for 30 days"
                  color="primary"
                  density="compact"
                  hide-details
                  class="remember-checkbox"
                />
                <v-btn
                  variant="text"
                  color="primary"
                  size="small"
                  class="forgot-link"
                >
                  Forgot password
                </v-btn>
              </div>

              <!-- Submit Button -->
              <v-btn
                type="submit"
                color="primary"
                size="large"
                :loading="form.processing"
                :disabled="!isFormValid"
                block
                class="submit-btn mb-6"
              >
                Sign in
              </v-btn>
            </v-form>

            <!-- Error Alert -->
            <v-alert
              v-if="form.errors.email || form.errors.password || form.errors.general"
              type="error"
              variant="tonal"
              class="error-alert"
            >
              {{ form.errors.email || form.errors.password || form.errors.general }}
            </v-alert>
          </div>
        </v-col>

        <!-- Right Panel - Illustration -->
        <v-col cols="12" md="7" lg="8" xl="9" class="illustration-panel d-none d-md-flex">
          <div class="illustration-content">
            <!-- Background Pattern -->
            <div class="bg-pattern"></div>
            
            <!-- Main Illustration -->
            <div class="main-illustration">
              <div class="user-avatar">
                <div class="avatar-bg"></div>
                <div class="avatar-silhouette"></div>
              </div>
              
              <!-- Floating Icons -->
              <div class="floating-icons">
                <div class="icon icon-1">
                  <v-icon size="20" color="white">mdi-message-outline</v-icon>
                </div>
                <div class="icon icon-2">
                  <v-icon size="18" color="white">mdi-earth</v-icon>
                </div>
                <div class="icon icon-3">
                  <v-icon size="16" color="white">mdi-laptop</v-icon>
                </div>
                <div class="icon icon-4">
                  <v-icon size="20" color="white">mdi-email-outline</v-icon>
                </div>
                <div class="icon icon-5">
                  <v-icon size="18" color="white">mdi-check-circle-outline</v-icon>
                </div>
                <div class="icon icon-6">
                  <v-icon size="16" color="white">mdi-hand-heart-outline</v-icon>
                </div>
              </div>
            </div>
          </div>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { ref, computed } from 'vue'

const form = useForm({
  email: '',
  password: '',
  remember: false,
})

const showPassword = ref(false)

const isFormValid = computed(() => {
  return form.email && form.password && form.email.includes('@')
})

function submit() {
  if (!isFormValid.value) return
  form.post('/admin/login')
}
</script>

<style scoped>
.login-wrapper {
  min-height: 100vh;
  background: #ffffff;
}

/* Left Panel Styles */
.login-panel {
  background: #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2rem;
}

.login-content {
  width: 100%;
  max-width: 400px;
}

.brand-section {
  text-align: left;
}

.brand-logo {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.brand-text {
  font-size: 1.5rem;
  font-weight: 600;
  color: #1a1a1a;
}

.welcome-section {
  text-align: left;
}

.welcome-title {
  font-size: 2rem;
  font-weight: 700;
  color: #1a1a1a;
  margin-bottom: 0.5rem;
}

.welcome-subtitle {
  color: #6b7280;
  font-size: 1rem;
  margin: 0;
}

.form-group {
  margin-bottom: 1.5rem;
}

.form-label {
  display: block;
  font-size: 0.875rem;
  font-weight: 500;
  color: #374151;
  margin-bottom: 0.5rem;
}

.custom-input :deep(.v-field) {
  border-radius: 8px;
  background-color: #ffffff;
}

.custom-input :deep(.v-field--variant-outlined .v-field__outline) {
  --v-field-border-width: 1px;
}

.custom-input :deep(.v-field__input) {
  padding: 12px 16px;
  min-height: 48px;
}

.form-options {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.remember-checkbox :deep(.v-label) {
  font-size: 0.875rem;
  color: #374151;
}

.forgot-link {
  text-transform: none;
  font-size: 0.875rem;
  padding: 0;
  min-width: auto;
  height: auto;
}

.submit-btn {
  background: #7c3aed !important;
  border-radius: 8px;
  text-transform: none;
  font-weight: 600;
  height: 48px;
  box-shadow: none;
}

.submit-btn:hover {
  background: #6d28d9 !important;
}

.error-alert {
  border-radius: 8px;
}

/* Right Panel Styles */
.illustration-panel {
  background: linear-gradient(135deg, #a855f7 0%, #8b5cf6 100%);
  position: relative;
  overflow: hidden;
}

.illustration-content {
  width: 100%;
  height: 100%;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}

.bg-pattern {
  position: absolute;
  inset: 0;
  background-image: 
    radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
    radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
    radial-gradient(circle at 40% 70%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
}

.main-illustration {
  position: relative;
  z-index: 2;
}

.user-avatar {
  width: 300px;
  height: 300px;
  position: relative;
  margin: 0 auto;
}

.avatar-bg {
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  backdrop-filter: blur(20px);
  border: 2px solid rgba(255, 255, 255, 0.3);
}

.avatar-silhouette {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 120px;
  height: 120px;
  background: #1a1a1a;
  border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
  opacity: 0.8;
}

.avatar-silhouette::before {
  content: '';
  position: absolute;
  top: 20%;
  left: 50%;
  transform: translateX(-50%);
  width: 40px;
  height: 40px;
  background: #ffffff;
  border-radius: 50%;
}

.avatar-silhouette::after {
  content: '';
  position: absolute;
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
  width: 80px;
  height: 60px;
  background: #1a1a1a;
  border-radius: 50px 50px 0 0;
}

.floating-icons {
  position: absolute;
  inset: 0;
}

.icon {
  position: absolute;
  width: 40px;
  height: 40px;
  background: rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(10px);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  animation: float 3s ease-in-out infinite;
  border: 1px solid rgba(255, 255, 255, 0.3);
}

.icon-1 { top: 10%; left: 15%; animation-delay: -0.5s; }
.icon-2 { top: 20%; right: 20%; animation-delay: -1s; }
.icon-3 { top: 60%; left: 10%; animation-delay: -1.5s; }
.icon-4 { bottom: 20%; right: 15%; animation-delay: -2s; }
.icon-5 { top: 40%; right: 5%; animation-delay: -2.5s; }
.icon-6 { bottom: 40%; left: 5%; animation-delay: -3s; }

@keyframes float {
  0%, 100% { transform: translateY(0px) rotate(0deg); }
  50% { transform: translateY(-10px) rotate(3deg); }
}

/* Responsive adjustments */
@media (max-width: 960px) {
  .login-panel {
    padding: 1.5rem;
  }
  
  .welcome-title {
    font-size: 1.75rem;
  }
}

@media (max-width: 600px) {
  .login-panel {
    padding: 1rem;
  }
  
  .welcome-title {
    font-size: 1.5rem;
  }
  
  .form-options {
    flex-direction: column;
    align-items: flex-start;
    gap: 1rem;
  }
}
</style>
