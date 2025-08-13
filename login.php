<?php
include "service/database.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .login-animation {
            animation: slideUp 0.6s ease-out;
        }
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }
        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }
        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }
        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }
        .shape:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 10%;
            right: 20%;
            animation-delay: 3s;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4 relative">
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <!-- Login Container -->
    <div class="glass-effect rounded-2xl p-8 w-full max-w-md login-animation relative z-10">
        <!-- Back Button -->
        <a href="index.php" class="mb-4 text-white/80 hover:text-white transition-colors flex items-center space-x-2 group">
            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            <span>Kembali</span>
        </a>

        <!-- Logo/Brand -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                <svg class="w-8 h-8 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-white mb-2">Selamat Datang Kembali</h1>
            <p class="text-white/80 text-sm">Masuk ke akun Anda untuk melanjutkan</p>
        </div>

        <!-- Login Form -->
        <form id="loginForm" class="space-y-6" method="POST>
            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-white/90 mb-2">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required
                    class="input-focus w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all duration-300"
                    placeholder="nama@email.com"
                >
                <div id="emailError" class="text-red-300 text-xs mt-1 hidden">Format email tidak valid</div>
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-medium text-white/90 mb-2">Kata Sandi</label>
                <div class="relative">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required
                        class="input-focus w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all duration-300 pr-12"
                        placeholder="Masukkan kata sandi"
                    >
                    <button 
                        type="button" 
                        id="togglePassword"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-white/60 hover:text-white transition-colors"
                    >
                        <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>
                <div id="passwordError" class="text-red-300 text-xs mt-1 hidden">Kata sandi minimal 6 karakter</div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <label class="flex items-center">
                    <input type="checkbox" id="rememberMe" class="w-4 h-4 text-indigo-600 bg-white/20 border-white/30 rounded focus:ring-white/50">
                    <span class="ml-2 text-sm text-white/80">Ingat saya</span>
                </label>
            </div>

            <!-- Login Button -->
            <button 
                type="submit" 
                id="loginBtn"
                class="w-full bg-white text-indigo-600 py-3 px-4 rounded-lg font-semibold hover:bg-white/90 focus:outline-none focus:ring-2 focus:ring-white/50 transform hover:scale-105 transition-all duration-300 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none"
            >
                <span id="loginBtnText">Masuk</span>
                <svg id="loadingIcon" class="animate-spin -ml-1 mr-3 h-5 w-5 text-indigo-600 hidden inline" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        </form>



        <!-- Register Link -->
        <div class="text-center mt-6">
            <p class="text-white/80 text-sm">
                Belum punya akun? 
                <a href="register.html" class="text-white font-medium hover:underline">Daftar sekarang</a>
            </p>
        </div>

        <!-- Additional Info -->
        <div class="text-center mt-4">
            <p class="text-white/60 text-xs">
                Dengan masuk, Anda menyetujui 
                <a href="#" class="text-white/80 hover:text-white underline">Syarat Layanan</a> kami
            </p>
        </div>
    </div>

    <!-- Success Message (Hidden by default) -->
    <div id="successMessage" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="flex items-center space-x-2">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span>Login berhasil! Selamat datang kembali.</span>
        </div>
    </div>

    <!-- Error Message (Hidden by default) -->
    <div id="errorMessage" class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="flex items-center space-x-2">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            <span>Email atau kata sandi salah!</span>
        </div>
    </div>

    <script>
        // Form elements
        const loginForm = document.getElementById('loginForm');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const rememberMeCheckbox = document.getElementById('rememberMe');
        const loginBtn = document.getElementById('loginBtn');
        const loginBtnText = document.getElementById('loginBtnText');
        const loadingIcon = document.getElementById('loadingIcon');
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');

        // Password visibility toggle
        const togglePassword = document.getElementById('togglePassword');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            if (type === 'text') {
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"/>
                `;
            } else {
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                `;
            }
        });

        // Email validation
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // Real-time validation
        emailInput.addEventListener('blur', function() {
            const emailError = document.getElementById('emailError');
            if (!validateEmail(this.value)) {
                emailError.classList.remove('hidden');
                this.classList.add('border-red-400');
            } else {
                emailError.classList.add('hidden');
                this.classList.remove('border-red-400');
            }
        });

        passwordInput.addEventListener('blur', function() {
            const passwordError = document.getElementById('passwordError');
            if (this.value.length < 6) {
                passwordError.classList.remove('hidden');
                this.classList.add('border-red-400');
            } else {
                passwordError.classList.add('hidden');
                this.classList.remove('border-red-400');
            }
        });

        // Show message function
        function showMessage(messageElement, duration = 3000) {
            messageElement.classList.remove('translate-x-full');
            messageElement.classList.add('translate-x-0');
            
            setTimeout(() => {
                messageElement.classList.remove('translate-x-0');
                messageElement.classList.add('translate-x-full');
            }, duration);
        }

        // Form submission
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = emailInput.value;
            const password = passwordInput.value;
            
            // Validate inputs
            const isEmailValid = validateEmail(email);
            const isPasswordValid = password.length >= 6;
            
            if (!isEmailValid || !isPasswordValid) {
                showMessage(errorMessage);
                return;
            }
            
            // Show loading state
            loginBtn.disabled = true;
            loginBtnText.textContent = 'Memproses...';
            loadingIcon.classList.remove('hidden');
            
            // Simulate login process
            setTimeout(() => {
                // Demo: Accept any valid email/password combination
                if (isEmailValid && isPasswordValid) {
                    // Show success message
                    showMessage(successMessage, 4000);
                    
                    // Save remember me preference
                    if (rememberMeCheckbox.checked) {
                        localStorage.setItem('rememberMe', 'true');
                        localStorage.setItem('userEmail', email);
                    }
                    
                    // Reset form
                    loginForm.reset();
                    
                    // Simulate redirect after success
                    setTimeout(() => {
                        // window.location.href = 'dashboard.html';
                        console.log('Redirecting to dashboard...');
                    }, 2000);
                } else {
                    showMessage(errorMessage);
                }
                
                // Reset button state
                loginBtn.disabled = false;
                loginBtnText.textContent = 'Masuk';
                loadingIcon.classList.add('hidden');
                
            }, 1500);
        });

        // Load remembered email
        window.addEventListener('load', function() {
            if (localStorage.getItem('rememberMe') === 'true') {
                const savedEmail = localStorage.getItem('userEmail');
                if (savedEmail) {
                    emailInput.value = savedEmail;
                    rememberMeCheckbox.checked = true;
                }
            }
        });

        // Input focus animations
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Enter key support for quick login
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && (emailInput === document.activeElement || passwordInput === document.activeElement)) {
                loginForm.dispatchEvent(new Event('submit'));
            }
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'96e4bdc095793e12',t:'MTc1NTA1MTcwOS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
