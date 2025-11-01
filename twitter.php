<?php
$profile_data = [
    'username' => 'FurNest',
    'handle' => 'FurNest',
    'follower_count' => 3443,
    'following_count' => 152,
    'followers' => 77,
    'bio' => 'Where Happy Pets Come First!',
    'location' => 'Dhaka, Bangladesh',
    'website' => 'www.furnest.com',
    'joined_date' => 'November 2024'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($profile_data['username']); ?> Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9f9;
        }
    </style>
</head>
<body class="flex flex-col items-center">

    <!-- Main Content Container -->
    <div class="flex w-full max-w-7xl mx-auto px-4 mt-4">

        <!-- Left Sidebar (Simulated) -->
        <div class="hidden md:flex flex-col items-end w-1/4 pr-4">
            <div class="mt-4">
                <!-- Simulating a logo or home button -->
                <svg class="h-8 w-8 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </div>
        </div>

        <!-- Center Content - Profile Section -->
        <div class="w-full md:w-1/2 bg-white rounded-lg shadow-md">
            <!-- Header Section -->
            <div class="p-4 border-b border-gray-200">
                <div class="flex items-center space-x-4">
                    <svg class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <div>
                        <h1 class="text-xl font-bold"><?php echo htmlspecialchars($profile_data['username']); ?></h1>
                        <p class="text-gray-500 text-sm"><?php echo htmlspecialchars($profile_data['follower_count']); ?> posts</p>
                    </div>
                </div>
            </div>

            <!-- Profile Cover and Avatar -->
            <div class="relative mb-20">
                <img src="images/twitter.jpg" alt="Profile cover" class="w-full h-48 object-cover">
                <div class="absolute -bottom-16 left-4 flex items-end">
                    <img src="images/logo.jpeg" alt="Profile avatar" class="w-32 h-32 rounded-full border-4 border-white shadow-lg">
                </div>
                <button class="absolute bottom-4 right-4 bg-gray-900 text-white font-semibold py-2 px-6 rounded-full hover:bg-gray-700 transition duration-300">Follow</button>
            </div>

            <!-- Profile Info -->
            <div class="p-4 pt-0">
                <h2 class="text-2xl font-bold"><?php echo htmlspecialchars($profile_data['username']); ?></h2>
                <p class="text-gray-500 mb-2"><?php echo htmlspecialchars($profile_data['handle']); ?></p>
                <p class="text-gray-700 mb-4"><?php echo htmlspecialchars($profile_data['bio']); ?></p>
                <div class="flex items-center text-gray-500 text-sm mb-2">
                    <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span><?php echo htmlspecialchars($profile_data['location']); ?></span>
                </div>
                <div class="flex items-center text-gray-500 text-sm mb-2">
                    <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.815l4.636-4.636a4 4 0 00-5.656-5.656l-1.102 1.101" />
                    </svg>
                    <a href="http://<?php echo htmlspecialchars($profile_data['website']); ?>" class="text-blue-500 hover:underline"><?php echo htmlspecialchars($profile_data['website']); ?></a>
                </div>
                <div class="flex items-center text-gray-500 text-sm mb-4">
                    <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Joined <?php echo htmlspecialchars($profile_data['joined_date']); ?></span>
                </div>
                <div class="flex space-x-4 text-gray-700 text-sm">
                    <p><span class="font-bold"><?php echo htmlspecialchars($profile_data['following_count']); ?></span> Following</p>
                    <p><span class="font-bold"><?php echo htmlspecialchars($profile_data['followers']); ?></span> Followers</p>
                </div>
                
                <!-- Navigation Tabs -->
                <div class="flex justify-around border-b border-gray-200 mt-4">
                    <button class="py-4 px-6 text-blue-500 border-b-2 border-blue-500 font-bold">Posts</button>
                    <button class="py-4 px-6 text-gray-500 hover:text-blue-500">Replies</button>
                    <button class="py-4 px-6 text-gray-500 hover:text-blue-500">Media</button>
                </div>
                
                <!-- Content Placeholder -->
                <div class="flex flex-col items-center py-10 text-gray-500">
                    <p class="font-bold text-lg">@<?php echo htmlspecialchars($profile_data['handle']); ?> hasn't</p>
                    <p>Don't miss what's happening</p>
                    <p>People on X are the first to know.</p>
                </div>
            </div>
        </div>

        <!-- Right Sidebar (Simulated) -->
        <div class="hidden lg:block w-1/4 pl-4">
            <div class="bg-white rounded-lg p-4 shadow-md mt-4">
                <h3 class="font-bold text-lg mb-4">New to X?</h3>
                <p class="text-sm text-gray-600 mb-4">Sign up now to get your own personalized timeline!</p>
                <button class="flex items-center justify-center w-full py-2 mb-2 bg-gray-100 rounded-full font-bold">
                    <svg class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.5 12.01c0-.75-.06-1.48-.2-2.18H12v4.2h6.14a5.05 5.05 0 01-2.19 3.32v2.7h3.48c2.04-1.89 3.22-4.73 3.22-8.04z" fill="#4285F4"/>
                        <path d="M12 22.5c3.08 0 5.67-1.02 7.56-2.76l-3.48-2.7c-1 1.25-2.29 2.06-4.08 2.06-3.14 0-5.83-2.11-6.79-4.94H1.72v2.79c1.94 3.84 5.92 6.45 10.28 6.45z" fill="#34A853"/>
                        <path d="M5.21 15.2c-.25-.75-.38-1.54-.38-2.34s.13-1.59.38-2.34V7.72H1.72a11.96 11.96 0 000 8.56L5.21 15.2z" fill="#FBBC05"/>
                        <path d="M12 4.09c1.78 0 3.37.61 4.64 1.8l3.09-3.09C17.67 1.21 15.08 0 12 0 7.72 0 3.74 2.61 1.8 6.45l3.49 2.7c.96-2.83 3.65-4.94 6.71-4.94z" fill="#EA4335"/>
                    </svg>
                    Sign up with Google
                </button>
                <button class="flex items-center justify-center w-full py-2 mb-2 bg-gray-100 rounded-full font-bold">
                    <svg class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 0C5.372 0 0 5.372 0 12c0 5.944 3.447 11.027 8.356 13.535l1.09-1.996C5.035 22.456 2.5 18.91 2.5 15c0-4.142 3.358-7.5 7.5-7.5h.5c4.142 0 7.5 3.358 7.5 7.5 0 3.91-2.535 7.456-6.944 9.535L14.653 24c4.909-2.508 8.356-7.591 8.356-13.535C24 5.372 18.628 0 12 0z" fill="#000000"/>
                </svg>
                    Sign up with Apple
                </button>
                <div class="flex items-center my-4">
                    <div class="flex-grow border-t border-gray-300"></div>
                    <span class="flex-shrink mx-4 text-gray-500 text-sm">or</span>
                    <div class="flex-grow border-t border-gray-300"></div>
                </div>
                <button class="w-full py-2 mb-2 bg-black text-white rounded-full font-bold">Create account</button>
                <p class="text-xs text-gray-500 mt-4">By signing up, you agree to the <a href="#" class="text-blue-500">Terms of Service</a> and <a href="#" class="text-blue-500">Privacy Policy</a>, including <a href="#" class="text-blue-500">Cookie Use</a>.</p>
            </div>
        </div>
    </div>
    
    <!-- Bottom Bar (Simulated) -->
    <div class="fixed bottom-0 left-0 right-0 bg-blue-500 text-white p-4 flex justify-between items-center text-sm">
        <div>
            <p class="font-bold">Don't miss what's happening</p>
            <p>People on X are the first to know.</p>
        </div>
        <div class="flex space-x-2">
            <button class="border border-white text-white py-2 px-4 rounded-full font-bold">Log in</button>
            <button class="bg-white text-blue-500 py-2 px-4 rounded-full font-bold">Sign up</button>
        </div>
    </div>
</body>
</html>
