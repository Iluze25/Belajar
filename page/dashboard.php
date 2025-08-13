<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pembelajaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen font-inter">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white p-2 rounded-lg">
                        📚
                    </div>
                    <h1 class="ml-3 text-xl font-semibold text-gray-900">Dashboard Pembelajaran</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                        Profil Saya
                    </button>
                </div>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Section -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl p-6 text-white mb-8">
            <h2 class="text-2xl font-bold mb-2">Selamat Datang Kembali! 👋</h2>
            <p class="text-blue-100">Mari lanjutkan perjalanan belajar Anda hari ini</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center">
                    <div class="bg-green-100 p-3 rounded-lg">
                        <span class="text-2xl">✅</span>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Kursus Selesai</p>
                        <p class="text-2xl font-bold text-gray-900">12</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <span class="text-2xl">📖</span>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Sedang Belajar</p>
                        <p class="text-2xl font-bold text-gray-900">5</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center">
                    <div class="bg-yellow-100 p-3 rounded-lg">
                        <span class="text-2xl">⏰</span>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Jam Belajar</p>
                        <p class="text-2xl font-bold text-gray-900">48</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center">
                    <div class="bg-purple-100 p-3 rounded-lg">
                        <span class="text-2xl">🏆</span>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Sertifikat</p>
                        <p class="text-2xl font-bold text-gray-900">8</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Progress Section -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Kursus Sedang Berlangsung</h3>
                    
                    <div class="space-y-4">
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-medium text-gray-900">JavaScript Fundamental</h4>
                                <span class="text-sm text-blue-600 font-medium">75%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-3">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: 75%"></div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">12 dari 16 modul</span>
                                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                    Lanjutkan
                                </button>
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-medium text-gray-900">React Development</h4>
                                <span class="text-sm text-green-600 font-medium">45%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-3">
                                <div class="bg-green-600 h-2 rounded-full" style="width: 45%"></div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">9 dari 20 modul</span>
                                <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                    Lanjutkan
                                </button>
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-medium text-gray-900">UI/UX Design</h4>
                                <span class="text-sm text-purple-600 font-medium">30%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-3">
                                <div class="bg-purple-600 h-2 rounded-full" style="width: 30%"></div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">6 dari 18 modul</span>
                                <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                    Lanjutkan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Aktivitas Terbaru</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center p-3 bg-green-50 rounded-lg">
                            <div class="bg-green-100 p-2 rounded-full">
                                <span class="text-green-600">✅</span>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Menyelesaikan "Array Methods" di JavaScript</p>
                                <p class="text-xs text-gray-600">2 jam yang lalu</p>
                            </div>
                        </div>

                        <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                            <div class="bg-blue-100 p-2 rounded-full">
                                <span class="text-blue-600">📝</span>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Mengerjakan quiz "React Components"</p>
                                <p class="text-xs text-gray-600">1 hari yang lalu</p>
                            </div>
                        </div>

                        <div class="flex items-center p-3 bg-purple-50 rounded-lg">
                            <div class="bg-purple-100 p-2 rounded-full">
                                <span class="text-purple-600">🎨</span>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Memulai modul "Color Theory" di UI/UX</p>
                                <p class="text-xs text-gray-600">2 hari yang lalu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi Cepat</h3>
                    
                    <div class="space-y-3">
                        <button class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white p-3 rounded-lg font-medium transition-all transform hover:scale-105">
                            🔍 Jelajahi Kursus Baru
                        </button>
                        
                        <button class="w-full bg-green-600 hover:bg-green-700 text-white p-3 rounded-lg font-medium transition-colors">
                            📊 Lihat Progress Detail
                        </button>
                        
                        <button class="w-full bg-purple-600 hover:bg-purple-700 text-white p-3 rounded-lg font-medium transition-colors">
                            🏆 Sertifikat Saya
                        </button>
                        
                        <button class="w-full bg-yellow-600 hover:bg-yellow-700 text-white p-3 rounded-lg font-medium transition-colors">
                            💬 Forum Diskusi
                        </button>
                    </div>
                </div>

                <!-- Upcoming Deadlines -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Deadline Mendatang</h3>
                    
                    <div class="space-y-3">
                        <div class="border-l-4 border-red-500 pl-3 py-2">
                            <p class="text-sm font-medium text-gray-900">Quiz React Hooks</p>
                            <p class="text-xs text-red-600">2 hari lagi</p>
                        </div>
                        
                        <div class="border-l-4 border-yellow-500 pl-3 py-2">
                            <p class="text-sm font-medium text-gray-900">Project UI Design</p>
                            <p class="text-xs text-yellow-600">5 hari lagi</p>
                        </div>
                        
                        <div class="border-l-4 border-green-500 pl-3 py-2">
                            <p class="text-sm font-medium text-gray-900">Final JavaScript</p>
                            <p class="text-xs text-green-600">1 minggu lagi</p>
                        </div>
                    </div>
                </div>

                <!-- Learning Streak -->
                <div class="bg-gradient-to-br from-orange-400 to-red-500 rounded-xl p-6 text-white">
                    <div class="text-center">
                        <div class="text-4xl mb-2">🔥</div>
                        <h3 class="text-lg font-semibold mb-1">Streak Belajar</h3>
                        <p class="text-3xl font-bold mb-1">7 Hari</p>
                        <p class="text-orange-100 text-sm">Pertahankan semangat!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add interactive functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Add click handlers for all buttons
            const buttons = document.querySelectorAll('button');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    // Add visual feedback
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                    
                    // Show notification based on button text
                    const buttonText = this.textContent.trim();
                    let message = '';
                    
                    if (buttonText.includes('Lanjutkan')) {
                        message = 'Membuka kursus...';
                    } else if (buttonText.includes('Jelajahi')) {
                        message = 'Menampilkan kursus tersedia...';
                    } else if (buttonText.includes('Progress')) {
                        message = 'Memuat detail progress...';
                    } else if (buttonText.includes('Sertifikat')) {
                        message = 'Membuka koleksi sertifikat...';
                    } else if (buttonText.includes('Forum')) {
                        message = 'Menuju forum diskusi...';
                    } else {
                        message = 'Memproses permintaan...';
                    }
                    
                    showNotification(message);
                });
            });
        });

        function showNotification(message) {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            // Animate in
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 100);
            
            // Remove after 3 seconds
            setTimeout(() => {
                notification.style.transform = 'translateX(full)';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'96ea89d4515adf0c',t:'MTc1NTExMjQ5OC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
