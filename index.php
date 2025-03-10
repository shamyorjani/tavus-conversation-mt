<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Tutor Video Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script crossorigin src="https://unpkg.com/@daily-co/daily-js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        secondary: {
                            50: '#f5f3ff',
                            100: '#ede9fe',
                            200: '#ddd6fe',
                            300: '#c4b5fd',
                            400: '#a78bfa',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                            800: '#5b21b6',
                            900: '#4c1d95',
                        }
                    },
                    animation: {
                        'gradient': 'gradient 8s ease infinite',
                    },
                    keyframes: {
                        gradient: {
                            '0%, 100%': { 'background-position': '0% 50%' },
                            '50%': { 'background-position': '100% 50%' },
                        }
                    },
                    backgroundSize: {
                        'gradient-size': '200% 200%',
                    }
                }
            }
        }
    </script>
</head>
<body class="font-poppins bg-gradient-to-br from-gray-50 to-gray-100 text-gray-800 min-h-screen">
    <div class="container mx-auto px-4 py-12 flex flex-col items-center">
        <div class="w-full max-w-4xl">
            <!-- Enhanced Header with animated gradient -->
            <div class="text-center mb-12">
                <div class="flex justify-center mb-4">
                    <div class="bg-white p-3 rounded-full shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                </div>
                <h1 class="text-5xl font-bold mb-3 bg-clip-text text-transparent bg-gradient-to-r from-primary-600 to-secondary-600 animate-gradient bg-gradient-size">
                    Math Tutor Connect
                </h1>
                <p class="text-gray-500 text-lg max-w-lg mx-auto">Your personalized tutoring experience just a click away</p>
            </div>
            
            <!-- Main card with enhanced design -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-2xl border border-gray-100 transform transition-all duration-300 hover:shadow-xl">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-primary-50 to-secondary-50 p-6 border-b border-gray-200">
                    <h2 class="text-xl font-semibold flex items-center text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg>
                        Live Tutoring Session
                    </h2>
                    <p id="massage-conversation" class="text-gray-500 mt-2 text-sm">Connect with an expert math tutor in real-time</p>
                </div>
                
                <!-- Video Container with enhanced design -->
                <div class="px-6 pt-6">
                    <div id="video-call-container" class="w-full aspect-video bg-gradient-to-r from-gray-100 to-gray-50 rounded-xl overflow-hidden shadow-inner border border-gray-200 flex items-center justify-center relative group">
                        <div class="text-center p-6 transition-all duration-300 group-hover:scale-105">
                            <div class="rounded-full bg-white shadow-md p-4 inline-block mb-5 group-hover:bg-primary-50 transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary-400 group-hover:text-primary-600 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <p class="text-gray-700 font-medium text-lg">Your video call will appear here</p>
                            <p class="text-gray-400 mt-2">Click "Start Session" to begin connecting</p>
                        </div>
                    </div>
                </div>
                
                <!-- Card Body with improved button -->
                <div class="p-6">
                    <button id="start-session-button" onclick="createConversation()" class="w-full py-4 px-4 bg-gradient-to-r from-primary-600 to-secondary-600 text-white rounded-lg font-medium hover:from-primary-700 hover:to-secondary-700 transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        Start Session
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function createConversation() {
            const button = document.getElementById("start-session-button");
            button.disabled = true;
            button.classList.add("opacity-50", "cursor-not-allowed");

            document.getElementById("massage-conversation").innerText = "Connecting to your tutor...";
            document.getElementById("massage-conversation").className = "text-primary-500 mt-2 text-sm animate-pulse";

            fetch("lib/tavus.php", {
                method: "POST"
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                const container = document.getElementById('video-call-container');
                // Clear placeholder content
                container.innerHTML = '';

                const callFrame = window.DailyIframe.createFrame(container, {
                    iframeStyle: {
                        width: '100%',
                        height: '100%',
                        border: 'none',
                    }
                });

                callFrame.join({
                    url: data.conversation_url
                });
                
                document.getElementById("massage-conversation").innerText = "Session started successfully!";
                document.getElementById("massage-conversation").className = "text-green-600 mt-2 text-sm";
                videoId = data.video_id;
            })
            .catch(error => {
                document.getElementById("massage-conversation").innerText = "Connection error: " + error;
                document.getElementById("massage-conversation").className = "text-red-500 mt-2 text-sm";
                button.disabled = false;
                button.classList.remove("opacity-50", "cursor-not-allowed");
            });
        }
    </script>
</body>
</html>