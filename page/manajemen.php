<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Manajemen SD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        .sidebar-item {
            transition: all 0.3s ease;
        }
        .sidebar-item:hover {
            background-color: rgba(59, 130, 246, 0.1);
            border-radius: 8px;
        }
        .sidebar-item.active {
            background-color: rgba(59, 130, 246, 0.1);
            border-radius: 8px;
            border-right: 3px solid #3b82f6;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg">
        <div class="flex items-center justify-center h-16 border-b">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-sm">SD</span>
                </div>
                <span class="text-xl font-bold text-gray-800">Manajemen SD</span>
            </div>
        </div>
        <nav class="mt-8 px-4">
            <div class="space-y-2">
                <a href="#" class="sidebar-item active flex items-center px-4 py-3 text-gray-700" onclick="showSection('dashboard')">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="#" class="sidebar-item flex items-center px-4 py-3 text-gray-700" onclick="showSection('classes')">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Manajemen Kelas
                </a>
                <a href="#" class="sidebar-item flex items-center px-4 py-3 text-gray-700" onclick="showSection('students')">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </svg>
                    Data Siswa
                </a>
                <a href="#" class="sidebar-item flex items-center px-4 py-3 text-gray-700" onclick="showSection('attendance')">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                    Absensi
                </a>
                <a href="#" class="sidebar-item flex items-center px-4 py-3 text-gray-700" onclick="showSection('progress')">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    Grafik Kemajuan
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-64 min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b h-16 flex items-center justify-between px-6">
            <h1 id="pageTitle" class="text-2xl font-semibold text-gray-800">Dashboard</h1>
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <p class="text-sm font-medium text-gray-900">Admin Sekolah</p>
                    <p class="text-xs text-gray-500">SD Negeri Cerdas</p>
                </div>
                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                    <span class="text-white font-medium">A</span>
                </div>
            </div>
        </header>

        <!-- Dashboard Section -->
        <div id="dashboard-section" class="p-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100 text-sm">Total Siswa</p>
                            <p class="text-3xl font-bold">248</p>
                        </div>
                        <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-100 text-sm">Total Kelas</p>
                            <p class="text-3xl font-bold">12</p>
                        </div>
                        <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white p-6 rounded-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-yellow-100 text-sm">Kehadiran Hari Ini</p>
                            <p class="text-3xl font-bold">95%</p>
                        </div>
                        <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-6 rounded-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-100 text-sm">Rata-rata Nilai</p>
                            <p class="text-3xl font-bold">82</p>
                        </div>
                        <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Aktivitas Terbaru</h3>
                <div class="space-y-4">
                    <div class="flex items-center p-4 bg-blue-50 rounded-lg">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Siswa baru ditambahkan ke Kelas 4A</p>
                            <p class="text-sm text-gray-500">2 jam yang lalu</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-green-50 rounded-lg">
                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Absensi Kelas 5B telah diperbarui</p>
                            <p class="text-sm text-gray-500">4 jam yang lalu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Classes Section -->
        <div id="classes-section" class="p-6 hidden">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Manajemen Kelas</h2>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700" onclick="openAddClassModal()">
                    + Tambah Kelas
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow-sm p-6 card-hover">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Kelas 1A</h3>
                            <p class="text-sm text-gray-500">Wali Kelas: Bu Sari</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-800" onclick="editClass('1A')">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                </svg>
                            </button>
                            <button class="text-red-600 hover:text-red-800" onclick="deleteClass('1A')">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Jumlah Siswa:</span>
                            <span class="font-medium">25</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Kehadiran Hari Ini:</span>
                            <span class="font-medium text-green-600">24/25</span>
                        </div>
                    </div>
                    <button class="w-full mt-4 bg-blue-50 text-blue-600 py-2 rounded-lg hover:bg-blue-100" onclick="viewClassDetails('1A')">
                        Lihat Detail
                    </button>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 card-hover">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Kelas 2A</h3>
                            <p class="text-sm text-gray-500">Wali Kelas: Bu Rina</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-800" onclick="editClass('2A')">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                </svg>
                            </button>
                            <button class="text-red-600 hover:text-red-800" onclick="deleteClass('2A')">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Jumlah Siswa:</span>
                            <span class="font-medium">23</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Kehadiran Hari Ini:</span>
                            <span class="font-medium text-green-600">22/23</span>
                        </div>
                    </div>
                    <button class="w-full mt-4 bg-blue-50 text-blue-600 py-2 rounded-lg hover:bg-blue-100" onclick="viewClassDetails('2A')">
                        Lihat Detail
                    </button>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 card-hover">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Kelas 3A</h3>
                            <p class="text-sm text-gray-500">Wali Kelas: Bu Maya</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-800" onclick="editClass('3A')">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                </svg>
                            </button>
                            <button class="text-red-600 hover:text-red-800" onclick="deleteClass('3A')">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Jumlah Siswa:</span>
                            <span class="font-medium">26</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Kehadiran Hari Ini:</span>
                            <span class="font-medium text-green-600">25/26</span>
                        </div>
                    </div>
                    <button class="w-full mt-4 bg-blue-50 text-blue-600 py-2 rounded-lg hover:bg-blue-100" onclick="viewClassDetails('3A')">
                        Lihat Detail
                    </button>
                </div>
            </div>
        </div>

        <!-- Students Section -->
        <div id="students-section" class="p-6 hidden">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Data Siswa</h2>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700" onclick="openAddStudentModal()">
                    + Tambah Siswa
                </button>
            </div>

            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-6 border-b">
                    <div class="flex space-x-4">
                        <input type="text" placeholder="Cari siswa..." class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <select class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Semua Kelas</option>
                            <option>Kelas 1A</option>
                            <option>Kelas 2A</option>
                            <option>Kelas 3A</option>
                        </select>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kelas</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Umur</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rata-rata Nilai</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                                            <span class="text-white font-medium text-sm">A</span>
                                        </div>
                                        <span class="font-medium text-gray-900">Ahmad Rizki</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">1A</td>
                                <td class="px-6 py-4 text-sm text-gray-900">7 tahun</td>
                                <td class="px-6 py-4 text-sm text-gray-900">85</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <button class="text-blue-600 hover:text-blue-800 mr-3" onclick="viewStudentProfile('Ahmad Rizki')">Lihat</button>
                                    <button class="text-red-600 hover:text-red-800" onclick="deleteStudent('Ahmad Rizki')">Hapus</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-pink-500 rounded-full flex items-center justify-center mr-3">
                                            <span class="text-white font-medium text-sm">S</span>
                                        </div>
                                        <span class="font-medium text-gray-900">Siti Nurhaliza</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">1A</td>
                                <td class="px-6 py-4 text-sm text-gray-900">7 tahun</td>
                                <td class="px-6 py-4 text-sm text-gray-900">92</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <button class="text-blue-600 hover:text-blue-800 mr-3" onclick="viewStudentProfile('Siti Nurhaliza')">Lihat</button>
                                    <button class="text-red-600 hover:text-red-800" onclick="deleteStudent('Siti Nurhaliza')">Hapus</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mr-3">
                                            <span class="text-white font-medium text-sm">B</span>
                                        </div>
                                        <span class="font-medium text-gray-900">Budi Santoso</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">2A</td>
                                <td class="px-6 py-4 text-sm text-gray-900">8 tahun</td>
                                <td class="px-6 py-4 text-sm text-gray-900">78</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <button class="text-blue-600 hover:text-blue-800 mr-3" onclick="viewStudentProfile('Budi Santoso')">Lihat</button>
                                    <button class="text-red-600 hover:text-red-800" onclick="deleteStudent('Budi Santoso')">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Attendance Section -->
        <div id="attendance-section" class="p-6 hidden">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Absensi</h2>
                <div class="flex space-x-3">
                    <select class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Semua Kelas</option>
                        <option>Kelas 1A</option>
                        <option>Kelas 2A</option>
                        <option>Kelas 3A</option>
                    </select>
                    <input type="date" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="2024-11-18">
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Daily Attendance -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Absensi Harian - Kelas 1A</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-white text-xs font-medium">A</span>
                                </div>
                                <span class="font-medium text-gray-900">Ahmad Rizki</span>
                            </div>
                            <span class="text-green-600 font-medium">Hadir</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-pink-500 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-white text-xs font-medium">S</span>
                                </div>
                                <span class="font-medium text-gray-900">Siti Nurhaliza</span>
                            </div>
                            <span class="text-green-600 font-medium">Hadir</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-red-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-white text-xs font-medium">D</span>
                                </div>
                                <span class="font-medium text-gray-900">Dewi Sartika</span>
                            </div>
                            <span class="text-red-600 font-medium">Sakit</span>
                        </div>
                    </div>
                </div>

                <!-- Weekly Summary -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Ringkasan Mingguan</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Total Siswa</span>
                            <span class="font-semibold text-gray-900">25</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Rata-rata Kehadiran</span>
                            <span class="font-semibold text-green-600">96%</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Tidak Hadir Hari Ini</span>
                            <span class="font-semibold text-red-600">1</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Izin/Sakit</span>
                            <span class="font-semibold text-yellow-600">1</span>
                        </div>
                    </div>
                    <div class="mt-6">
                        <canvas id="attendanceChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Progress Section -->
        <div id="progress-section" class="p-6 hidden">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Grafik Kemajuan Siswa</h2>
                <div class="flex space-x-3">
                    <select class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Semua Kelas</option>
                        <option>Kelas 1A</option>
                        <option>Kelas 2A</option>
                        <option>Kelas 3A</option>
                    </select>
                    <select class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Semua Mata Pelajaran</option>
                        <option>Matematika</option>
                        <option>Bahasa Indonesia</option>
                        <option>IPA</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Class Average Progress -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Rata-rata Nilai Kelas</h3>
                    <canvas id="classProgressChart" width="400" height="300"></canvas>
                </div>

                <!-- Individual Student Progress -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Kemajuan Siswa Individual</h3>
                    <canvas id="studentProgressChart" width="400" height="300"></canvas>
                </div>
            </div>

            <!-- Top Performers -->
            <div class="mt-6 bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Siswa Berprestasi</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="text-center p-4 bg-yellow-50 rounded-lg">
                        <div class="w-16 h-16 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-3">
                            <span class="text-white font-bold text-lg">🥇</span>
                        </div>
                        <h4 class="font-semibold text-gray-900">Siti Nurhaliza</h4>
                        <p class="text-sm text-gray-600">Kelas 1A</p>
                        <p class="text-lg font-bold text-yellow-600">92</p>
                    </div>
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <div class="w-16 h-16 bg-gray-400 rounded-full flex items-center justify-center mx-auto mb-3">
                            <span class="text-white font-bold text-lg">🥈</span>
                        </div>
                        <h4 class="font-semibold text-gray-900">Ahmad Rizki</h4>
                        <p class="text-sm text-gray-600">Kelas 1A</p>
                        <p class="text-lg font-bold text-gray-600">85</p>
                    </div>
                    <div class="text-center p-4 bg-orange-50 rounded-lg">
                        <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-3">
                            <span class="text-white font-bold text-lg">🥉</span>
                        </div>
                        <h4 class="font-semibold text-gray-900">Rina Sari</h4>
                        <p class="text-sm text-gray-600">Kelas 2A</p>
                        <p class="text-lg font-bold text-orange-600">83</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <!-- Add Class Modal -->
    <div id="addClassModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Tambah Kelas Baru</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kelas</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh: 4A">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Wali Kelas</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nama wali kelas">
                </div>
                <div class="flex space-x-3">
                    <button class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700" onclick="addClass()">Tambah</button>
                    <button class="flex-1 bg-gray-100 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-200" onclick="closeAddClassModal()">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Student Modal -->
    <div id="addStudentModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Tambah Siswa Baru</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nama siswa">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                    <select class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Pilih Kelas</option>
                        <option>1A</option>
                        <option>2A</option>
                        <option>3A</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Umur</label>
                    <input type="number" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="7">
                </div>
                <div class="flex space-x-3">
                    <button class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700" onclick="addStudent()">Tambah</button>
                    <button class="flex-1 bg-gray-100 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-200" onclick="closeAddStudentModal()">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Student Profile Modal -->
    <div id="studentProfileModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 max-w-2xl w-full mx-4 max-h-screen overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h3 id="profileStudentName" class="text-xl font-semibold text-gray-900">Profil Siswa</h3>
                <button onclick="closeStudentProfileModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Basic Info -->
                <div class="space-y-4">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-3">
                            <span class="text-white font-bold text-2xl">A</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900">Ahmad Rizki</h4>
                        <p class="text-gray-600">Kelas 1A • 7 tahun</p>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h5 class="font-medium text-gray-900 mb-2">Informasi Dasar</h5>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">NISN:</span>
                                <span class="font-medium">1234567890</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tanggal Lahir:</span>
                                <span class="font-medium">15 Mei 2017</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Alamat:</span>
                                <span class="font-medium">Jl. Merdeka No. 123</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Academic Performance -->
                <div class="space-y-4">
                    <div class="bg-blue-50 rounded-lg p-4">
                        <h5 class="font-medium text-gray-900 mb-3">Nilai Akademik</h5>
                        <div class="space-y-2">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Matematika</span>
                                <span class="font-semibold text-blue-600">85</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Bahasa Indonesia</span>
                                <span class="font-semibold text-green-600">90</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">IPA</span>
                                <span class="font-semibold text-purple-600">82</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">IPS</span>
                                <span class="font-semibold text-yellow-600">88</span>
                            </div>
                            <hr class="my-2">
                            <div class="flex justify-between items-center font-semibold">
                                <span class="text-gray-900">Rata-rata</span>
                                <span class="text-blue-600">86.25</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-green-50 rounded-lg p-4">
                        <h5 class="font-medium text-gray-900 mb-2">Kehadiran</h5>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600">96%</div>
                            <p class="text-sm text-gray-600">Tingkat kehadiran</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notes Section -->
            <div class="mt-6">
                <h5 class="font-medium text-gray-900 mb-3">Catatan Guru</h5>
                <div class="bg-yellow-50 rounded-lg p-4">
                    <textarea class="w-full h-24 bg-transparent border-none resize-none focus:outline-none text-sm" placeholder="Tambahkan catatan tentang siswa...">Ahmad adalah siswa yang aktif dan rajin. Perlu sedikit bantuan dalam matematika, namun sangat baik dalam bahasa Indonesia.</textarea>
                </div>
            </div>

            <div class="flex space-x-3 mt-6">
                <button class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700" onclick="saveStudentProfile()">Simpan Perubahan</button>
                <button class="flex-1 bg-gray-100 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-200" onclick="closeStudentProfileModal()">Tutup</button>
            </div>
        </div>
    </div>

    <script>
        // Navigation
        function showSection(section) {
            // Hide all sections
            const sections = ['dashboard', 'classes', 'students', 'attendance', 'progress'];
            sections.forEach(s => {
                document.getElementById(s + '-section').classList.add('hidden');
            });
            
            // Show selected section
            document.getElementById(section + '-section').classList.remove('hidden');
            
            // Update page title
            const titles = {
                'dashboard': 'Dashboard',
                'classes': 'Manajemen Kelas',
                'students': 'Data Siswa',
                'attendance': 'Absensi',
                'progress': 'Grafik Kemajuan'
            };
            document.getElementById('pageTitle').textContent = titles[section];
            
            // Update active sidebar item
            document.querySelectorAll('.sidebar-item').forEach(item => {
                item.classList.remove('active');
            });
            event.target.classList.add('active');

            // Initialize charts if needed
            if (section === 'attendance') {
                initAttendanceChart();
            } else if (section === 'progress') {
                initProgressCharts();
            }
        }

        // Class Management
        function openAddClassModal() {
            document.getElementById('addClassModal').classList.remove('hidden');
            document.getElementById('addClassModal').classList.add('flex');
        }

        function closeAddClassModal() {
            document.getElementById('addClassModal').classList.add('hidden');
            document.getElementById('addClassModal').classList.remove('flex');
        }

        function addClass() {
            alert('✅ Kelas baru berhasil ditambahkan!\n\nFitur ini akan menyimpan data kelas ke database.');
            closeAddClassModal();
        }

        function editClass(className) {
            alert(`✏️ Edit Kelas ${className}\n\nAnda dapat mengubah nama kelas, wali kelas, dan pengaturan lainnya.`);
        }

        function deleteClass(className) {
            if (confirm(`Apakah Anda yakin ingin menghapus Kelas ${className}?`)) {
                alert(`🗑️ Kelas ${className} berhasil dihapus!`);
            }
        }

        function viewClassDetails(className) {
            alert(`📋 Detail Kelas ${className}\n\nMenampilkan daftar siswa, jadwal pelajaran, dan statistik kelas.`);
        }

        // Student Management
        function openAddStudentModal() {
            document.getElementById('addStudentModal').classList.remove('hidden');
            document.getElementById('addStudentModal').classList.add('flex');
        }

        function closeAddStudentModal() {
            document.getElementById('addStudentModal').classList.add('hidden');
            document.getElementById('addStudentModal').classList.remove('flex');
        }

        function addStudent() {
            alert('✅ Siswa baru berhasil ditambahkan!\n\nData siswa akan disimpan ke database sekolah.');
            closeAddStudentModal();
        }

        function viewStudentProfile(studentName) {
            document.getElementById('profileStudentName').textContent = `Profil ${studentName}`;
            document.getElementById('studentProfileModal').classList.remove('hidden');
            document.getElementById('studentProfileModal').classList.add('flex');
        }

        function closeStudentProfileModal() {
            document.getElementById('studentProfileModal').classList.add('hidden');
            document.getElementById('studentProfileModal').classList.remove('flex');
        }

        function saveStudentProfile() {
            alert('💾 Profil siswa berhasil disimpan!\n\nSemua perubahan telah tersimpan ke database.');
            closeStudentProfileModal();
        }

        function deleteStudent(studentName) {
            if (confirm(`Apakah Anda yakin ingin menghapus data ${studentName}?`)) {
                alert(`🗑️ Data ${studentName} berhasil dihapus!`);
            }
        }

        // Charts
        function initAttendanceChart() {
            const ctx = document.getElementById('attendanceChart');
            if (ctx && !ctx.chart) {
                ctx.chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum'],
                        datasets: [{
                            label: 'Kehadiran (%)',
                            data: [96, 94, 98, 95, 97],
                            borderColor: 'rgb(59, 130, 246)',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100
                            }
                        }
                    }
                });
            }
        }

        function initProgressCharts() {
            // Class Progress Chart
            const classCtx = document.getElementById('classProgressChart');
            if (classCtx && !classCtx.chart) {
                classCtx.chart = new Chart(classCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Matematika', 'B. Indonesia', 'IPA', 'IPS'],
                        datasets: [{
                            label: 'Rata-rata Kelas',
                            data: [82, 85, 79, 83],
                            backgroundColor: [
                                'rgba(59, 130, 246, 0.8)',
                                'rgba(16, 185, 129, 0.8)',
                                'rgba(139, 92, 246, 0.8)',
                                'rgba(245, 158, 11, 0.8)'
                            ]
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100
                            }
                        }
                    }
                });
            }

            // Student Progress Chart
            const studentCtx = document.getElementById('studentProgressChart');
            if (studentCtx && !studentCtx.chart) {
                studentCtx.chart = new Chart(studentCtx, {
                    type: 'line',
                    data: {
                        labels: ['Sep', 'Oct', 'Nov'],
                        datasets: [{
                            label: 'Ahmad Rizki',
                            data: [80, 83, 85],
                            borderColor: 'rgb(59, 130, 246)',
                            tension: 0.4
                        }, {
                            label: 'Siti Nurhaliza',
                            data: [88, 90, 92],
                            borderColor: 'rgb(236, 72, 153)',
                            tension: 0.4
                        }, {
                            label: 'Budi Santoso',
                            data: [75, 76, 78],
                            borderColor: 'rgb(16, 185, 129)',
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100
                            }
                        }
                    }
                });
            }
        }

        // Initialize dashboard on load
        window.addEventListener('load', function() {
            // Animate stats numbers
            const statNumbers = document.querySelectorAll('.text-3xl.font-bold');
            statNumbers.forEach(stat => {
                const text = stat.textContent;
                const isPercentage = text.includes('%');
                const finalValue = parseInt(text);
                let currentValue = 0;
                const increment = finalValue / 30;
                
                const timer = setInterval(() => {
                    currentValue += increment;
                    if (currentValue >= finalValue) {
                        stat.textContent = isPercentage ? finalValue + '%' : finalValue;
                        clearInterval(timer);
                    } else {
                        stat.textContent = isPercentage ? Math.floor(currentValue) + '%' : Math.floor(currentValue);
                    }
                }, 50);
            });
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'96eaa3a9775f5c61',t:'MTc1NTExMzU1NS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
