<?php
// PHP variables to simulate dynamic data
$pageName = "FurNest";
$profilePhoto = "https://placehold.co/150x150/E2E8F0/1A202C?text=Kutish";
$coverPhoto = "https://placehold.co/1000x300/E2E8F0/1A202C?text=Kutish+Pet+Shop+Cover";
$followers = "2.1K";
$following = "0";
$introText = "Your trusted and reliable pet equipments store!";
$address = "Dhaka, Bangladesh";
$phone = "013********";
$email = "furnest@gmail.com";
$website = "www.furnest.com";
$postDate = "3d";
$postTitle = "Your one stop pet solution! Whatever you need, we are here to serve you and your furry companions!";
$postImage1 = "https://placehold.co/800x600/E2E8F0/1A202C?text=Pet+Product+Mix";
$introDetails = "Pet supplies, Animals and pets - Pet shop";
$phoneDetails = "017********";
$addressDetails = "Jatrabari, Dhaka-1236";
$locationDetails = "furnest@gmail.com";
$reviews = "100%";
$reviewCount = "9 reviews";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageName); ?> - Facebook</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f2f5;
        }
        .container-bg {
            background-color: white;
            border-radius: 0.75rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        .tab-link.active {
            border-bottom: 2px solid #1877f2;
            color: #1877f2;
            font-weight: 600;
        }
        .btn-blue {
            background-color: #1877f2;
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
        }
        .btn-green {
            background-color: #42b72a;
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="max-w-7xl mx-auto py-8">
        <!-- Main Content Area -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Cover Photo and Profile Section -->
            <div class="relative">
                <img src="images/cover2.jpg" alt="Cover photo" class="w-full h-80 object-cover">
                <div class="absolute inset-x-0 -bottom-16 flex flex-col items-center">
                    <div class="w-36 h-36 rounded-full border-4 border-white overflow-hidden">
                        <img src="images/logo.jpeg" alt="Profile photo" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Page Name and Stats -->
            <div class="pt-20 pb-4 text-center">
                <h1 class="text-3xl font-bold"><?php echo htmlspecialchars($pageName); ?></h1>
                <p class="text-sm text-gray-500 mt-1"><?php echo htmlspecialchars($followers); ?> followers · <?php echo htmlspecialchars($following); ?> following</p>
            </div>

            <!-- Navigation Tabs -->
            <div class="border-t border-gray-200">
                <div class="flex justify-center -mb-px px-4 py-2 space-x-8">
                    <a href="#" class="tab-link active px-3 py-2 text-sm text-gray-600 transition duration-150 ease-in-out">Posts</a>
                    <a href="#" class="tab-link px-3 py-2 text-sm text-gray-600 transition duration-150 ease-in-out">About</a>
                    <a href="#" class="tab-link px-3 py-2 text-sm text-gray-600 transition duration-150 ease-in-out">Reels</a>
                    <a href="#" class="tab-link px-3 py-2 text-sm text-gray-600 transition duration-150 ease-in-out">Photos</a>
                    <a href="#" class="tab-link px-3 py-2 text-sm text-gray-600 transition duration-150 ease-in-out">Videos</a>
                    <a href="#" class="tab-link px-3 py-2 text-sm text-gray-600 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Secondary Content Section -->
        <div class="mt-8 flex flex-col md:flex-row gap-8">
            <!-- Intro Section -->
            <div class="w-full md:w-1/3 container-bg p-6 h-fit">
                <h2 class="text-lg font-bold">Intro</h2>
                <div class="mt-4 space-y-3 text-sm text-gray-700">
                    <p class="leading-relaxed"><?php echo htmlspecialchars($introText); ?></p>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-.758l4-4a4 4 0 00-5.656-5.656l-1.102 1.101" />
                        </svg>
                        <p><?php echo htmlspecialchars($introDetails); ?></p>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <p>Call/WhatsApp: <?php echo htmlspecialchars($phoneDetails); ?></p>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p><?php echo htmlspecialchars($addressDetails); ?></p>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <p><?php echo htmlspecialchars($locationDetails); ?></p>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v18h14V3H5z" />
                        </svg>
                        <p><?php echo htmlspecialchars($reviews); ?> recommend (<?php echo htmlspecialchars($reviewCount); ?>)</p>
                    </div>
                    <!-- Photos section within Intro -->
                    <div class="mt-4">
                        <h3 class="font-semibold text-lg">Photos</h3>
                        <div class="mt-2 grid grid-cols-2 gap-2">
                            <img src="images/cat1.webp" class="rounded-lg w-full">
                            <img src="images/dog1.webp" class="rounded-lg w-full">
                            <img src="images/canary.webp" class="rounded-lg w-full">
                            <img src="images/hamster.jpg" class="rounded-lg w-full">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Posts Section -->
            <div class="w-full md:w-2/3 space-y-8">
                <div class="container-bg p-6">
                    <!-- Post Header -->
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-start">
                            <img src="images/logo.jpeg" alt="Profile photo" class="w-10 h-10 rounded-full">
                            <div class="ml-4">
                                <h3 class="font-bold text-gray-900"><?php echo htmlspecialchars($pageName); ?></h3>
                                <p class="text-xs text-gray-500"><?php echo htmlspecialchars($postDate); ?></p>
                            </div>
                        </div>
                        <button class="bg-gray-200 text-gray-800 font-semibold px-4 py-2 rounded-full flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.97-4.03 9-9 9S3 16.97 3 12 7.03 3 12 3s9 4.03 9 9z" />
                            </svg>
                            Send message
                        </button>
                    </div>

                    <!-- Post Content -->
                    <div class="mt-4">
                        <p class="text-sm font-semibold"><?php echo htmlspecialchars($postTitle); ?></p>
                        <img src="images/groom.jpg" alt="Product image" class="mt-4 w-full rounded-lg">
                    </div>

                    <!-- Post Reactions and Comments -->
                    <div class="mt-4 flex justify-between items-center text-xs text-gray-500">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                            <span>25</span>
                        </div>
                        <div>
                            <span>3 Comments</span>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 mt-4 pt-4">
                        <div class="flex items-center space-x-2 text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM6 9a2 2 0 100-4 2 2 0 000 4zM14 9a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            <p class="font-bold">Like</p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.97-4.03 9-9 9S3 16.97 3 12 7.03 3 12 3s9 4.03 9 9z" />
                            </svg>
                            <p class="font-bold">Comment</p>
                        </div>
                    </div>

                    <!-- Comments Section -->
                    <div class="mt-6 space-y-4">
                        <!-- Comment 1 -->
                        <div class="flex items-start">
                            <img src="images/rimi.jpg" alt="User avatar" class="rounded-full w-10 h-10">
                            <div class="ml-3 bg-gray-100 rounded-xl px-4 py-2">
                                <p class="font-semibold text-sm">Israt Rimi</p>
                                <p class="text-sm">Hi, What is the total cost of trimming and ear cleaning?</p>
                            </div>
                        </div>
                        <!-- Comment 2 (Reply) -->
                        <div class="flex items-start ml-12">
                            <img src="images/logo.jpeg" alt="Page avatar" class="rounded-full w-10 h-10">
                            <div class="ml-3 bg-gray-100 rounded-xl px-4 py-2">
                                <p class="font-semibold text-sm">FurNest</p>
                                <p class="text-sm">
                                    <span class="text-blue-500 font-bold">Israt Rimi</span>
                                    <br>
                                     2700tk
                                </p>
                            </div>
                        </div>
                       
                    </div>
                </div>

                <!-- Login/Signup Section -->
                <div class="container-bg p-6 text-center">
                    <h2 class="text-lg font-bold">Log in or sign up</h2>
                    <p class="text-sm text-gray-600 mt-2">Log in or sign up for Facebook to connect with friends, family and people you know.</p>
                    <div class="mt-6 flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-4">
                        <button class="btn-blue w-full md:w-auto">Log In</button>
                        <span class="text-gray-500">or</span>
                        <button class="btn-green w-full md:w-auto">Create new account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
