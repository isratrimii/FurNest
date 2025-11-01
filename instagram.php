<?php
// This is a simple PHP script that holds the profile data.
// In a real application, this data would be fetched from a database.
$profile_data = [
    'username' => 'FurNest',
    'follower_count' => '30.8K',
    'following_count' => '4,318',
    'posts_count' => '753',
    'bio' => 'pet Shop🐾',
];

$highlights = [

    ['text' => 'Israt Rimi', 'image' => '<img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Klient Flumtur">'],
    ['text' => 'Saif', 'image' => '<img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Foto Klientet">'],
    ['text' => 'Rifat Jahan', 'image' => '<img src="https://randomuser.me/api/portraits/women/22.jpg" alt="Ciao Churu">'],
    ['text' => 'Talha', 'image' => '<img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Pedigree">'],
    ['text' => 'Nusrat', 'image' => '<img src="https://randomuser.me/api/portraits/women/43.jpg" alt="Whiskas">'],
    ['text' => 'Doreamon', 'image' => '<img src="https://randomuser.me/api/portraits/men/18.jpg" alt="Trixie">'],
    ['text' => 'Tahiya', 'image' => '<img src="https://randomuser.me/api/portraits/women/35.jpg" alt="Royal Canine">'],
    

];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($profile_data['username']); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9f9;
        }
    </style>
</head>
<body class="flex min-h-screen">

    <!-- Left Navigation Sidebar -->
    <div class="hidden md:flex flex-col w-64 bg-white border-r border-gray-200 p-4">
        <div class="flex items-center space-x-2 p-2 mb-4">
            <svg class="h-8 w-8 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
            </svg>
            <span class="text-xl font-bold">Instagram</span>
        </div>
        <nav class="flex-1 space-y-2">
            <a href="#" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-100">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>
                <span>Home</span>
            </a>
            <a href="#" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-100">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0017 10.5a6.5 6.5 0 10-6.5 6.5c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zM10.5 16C8.57 16 7 14.43 7 12.5S8.57 9 10.5 9 14 10.57 14 12.5 12.43 16 10.5 16z"/></svg>
                <span>Search</span>
            </a>
            <a href="#" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-100">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                <span>Explore</span>
            </a>
            <a href="#" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-100">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                <span>Reels</span>
            </a>
            <a href="#" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-100">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
                <span>Messages</span>
            </a>
            <a href="#" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-100">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                <span>Notifications</span>
            </a>
            <a href="#" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-100">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                <span>Create</span>
            </a>
            <a href="#" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-100 font-bold">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c2.76 0 5 2.24 5 5s-2.24 5-5 5-5-2.24-5-5 2.24-5 5-5zM12 18.5c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                <span>Profile</span>
            </a>
        </nav>
        <div class="mt-auto">
            <a href="#" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-100">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                <span>More</span>
            </a>
        </div>
    </div>

    <!-- Main Profile Content -->
    <div class="flex-1 overflow-y-auto p-4 md:p-8">
        <div class="max-w-4xl mx-auto">
            <!-- Profile Header -->
            <div class="flex flex-col md:flex-row items-center md:items-start space-y-4 md:space-y-0 md:space-x-12 mb-8">
                <div class="relative w-32 h-32 md:w-40 md:h-40 rounded-full border-4 border-transparent overflow-hidden">
                    <img src="images/logo.jpeg" alt="Profile avatar" class="w-full h-full object-cover">
                    <div class="absolute inset-0 rounded-full border-4 border-pink-500"></div>
                </div>
                <div class="flex flex-col md:flex-1 text-center md:text-left">
                    <div class="flex items-center space-x-4 mb-2">
                        <h1 class="text-xl md:text-2xl font-light"><?php echo htmlspecialchars($profile_data['username']); ?></h1>
                        <button class="bg-blue-500 text-white font-semibold py-1 px-4 rounded-md text-sm">Follow</button>
                        <button class="bg-gray-200 text-gray-800 font-semibold py-1 px-4 rounded-md text-sm">Message</button>
                        <svg class="h-6 w-6 text-gray-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        <svg class="h-6 w-6 text-gray-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    </div>
                    <div class="flex justify-center md:justify-start space-x-6 text-sm md:text-base mb-4">
                        <p><span class="font-bold"><?php echo htmlspecialchars($profile_data['posts_count']); ?></span> posts</p>
                        <p><span class="font-bold"><?php echo htmlspecialchars($profile_data['follower_count']); ?></span> followers</p>
                        <p><span class="font-bold"><?php echo htmlspecialchars($profile_data['following_count']); ?></span> following</p>
                    </div>
                    <div class="text-gray-800 text-sm md:text-base whitespace-pre-line">
                        <?php echo htmlspecialchars($profile_data['bio']); ?>
                    </div>
                </div>
            </div>

            <!-- Highlights/Stories Section -->
            <div class="flex space-x-4 overflow-x-auto py-2">
                <?php foreach ($highlights as $highlight) : ?>
                    <div class="flex flex-col items-center">
                        <div class="relative w-16 h-16 rounded-full border-2 border-transparent overflow-hidden">
                            <?php echo $highlight['image']; ?>
                            <div class="absolute inset-0 rounded-full border-2 border-gray-300"></div>
                        </div>
                        <p class="text-xs text-gray-600 mt-1"><?php echo htmlspecialchars($highlight['text']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Content Tabs -->
            <div class="flex justify-center md:justify-start space-x-12 border-t border-gray-300 my-4">
                <button class="flex items-center space-x-2 py-4 px-2 text-gray-800 border-t-2 border-black -mt-px font-bold">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M3 3h18v18H3V3zM9 9h6v6H9V9z"/></svg>
                    <span>POSTS</span>
                </button>
                <button class="flex items-center space-x-2 py-4 px-2 text-gray-500 hover:text-gray-800">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    <span>REELS</span>
                </button>
                <button class="flex items-center space-x-2 py-4 px-2 text-gray-500 hover:text-gray-800 border-t-2 border-black -mt-px font-bold">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                    <span>TAGGED</span>
                </button>
            </div>

            <!-- Content Grid (Posts) -->
            <div class="grid grid-cols-3 gap-1">
                <div class="relative">
                    <img src="images/cat2.webp" alt="Foleze per mac image" class="w-full h-auto object-cover aspect-square">
                    <div class="absolute inset-0 flex items-end justify-start p-2">
                        <p class="font-bold text-white text-sm md:text-lg"></p>
                    </div>
                </div>
                <div class="relative">
                    <img src="images/dog2.webp" alt="Foleze per mac image" class="w-full h-auto object-cover aspect-square">
                    <div class="absolute inset-0 flex items-end justify-start p-2">
                        <p class="font-bold text-white text-sm md:text-lg"></p>
                    </div>
                </div>
                <div class="relative">
                    <img src="images/hen.webp" alt="Foleze per mac image" class="w-full h-auto object-cover aspect-square">
                    <div class="absolute inset-0 flex items-end justify-start p-2">
                        <p class="font-bold text-white text-sm md:text-lg"></p>
                    </div>
                </div>

                <div class="relative">
                    <img src="images/forpus.jpg" alt="Foleze per mac image" class="w-full h-auto object-cover aspect-square">
                    <div class="absolute inset-0 flex items-end justify-start p-2">
                        <p class="font-bold text-white text-sm md:text-lg"></p>
                    </div>
                </div>

                <div class="relative">
                    <img src="images/duck.jpg" alt="Foleze per mac image" class="w-full h-auto object-cover aspect-square">
                    <div class="absolute inset-0 flex items-end justify-start p-2">
                        <p class="font-bold text-white text-sm md:text-lg"></p>
                    </div>
                </div>

                <div class="relative">
                    <img src="images/h1.jpg" alt="Foleze per mac image" class="w-full h-auto object-cover aspect-square">
                    <div class="absolute inset-0 flex items-end justify-start p-2">
                        <p class="font-bold text-white text-sm md:text-lg"></p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>
</html>
