<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Tutor Video Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script crossorigin src="https://unpkg.com/@daily-co/daily-js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        gray: {
                            50: '#f9fafb',
                            100: '#f3f4f6',
                            200: '#e5e7eb',
                            300: '#d1d5db',
                            400: '#9ca3af',
                            500: '#6b7280',
                            600: '#4b5563',
                            700: '#374151',
                            800: '#1f2937',
                            900: '#111827',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="font-inter bg-gradient-to-br from-white to-gray-100 text-gray-800 min-h-screen">
    <div class="container mx-auto px-4 py-12 flex flex-col items-center">
        <div class="w-full max-w-4xl">
            <!-- Header with subtle shadow -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold mb-2 bg-clip-text text-transparent bg-gradient-to-r from-gray-800 to-gray-600">
                    Math Tutor Connect
                </h1>
                <p class="text-gray-500">Start a video conversation with your math tutor</p>
            </div>
            
            <!-- Main card with enhanced design -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-xl border border-gray-100">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 p-6 border-b border-gray-200">
                    <h2 class="text-xl font-semibold flex items-center text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg>
                        Live Tutoring Session
                    </h2>
                    <p id="massage-conversation" class="text-gray-500 mt-2 text-sm">Start a new video conversation with your tutor.</p>
                </div>
                
                <!-- Card Body -->
                <div class="p-6">
                    <button onclick="createConversation()" class="w-full py-3 px-4 bg-gradient-to-r from-gray-700 to-gray-800 text-white rounded-lg font-medium hover:from-gray-800 hover:to-gray-900 transition duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        Start Conversation
                    </button>
                </div>
                
                <!-- Video Container with enhanced design -->
                <div class="px-6 pb-6">
                    <div id="video-call-container" class="w-full aspect-video bg-gradient-to-r from-gray-100 to-gray-50 rounded-xl overflow-hidden shadow-inner border border-gray-200 flex items-center justify-center">
                        <div class="text-center p-6">
                            <div class="rounded-full bg-gray-100 p-4 inline-block mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <p class="text-gray-600 font-medium">Your video call will appear here</p>
                            <p class="text-gray-400 text-sm mt-2">Click "Start Conversation" to begin</p>
                        </div>
                    </div>
                </div>
                
                <!-- Footer with helpful tips -->
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-100">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Make sure your camera and microphone are enabled for the best experience
                    </div>
                </div>
            </div>
            
            <!-- Additional help text -->
            <div class="mt-6 text-center">
                <p class="text-gray-500 text-sm">Having issues? <a href="#" class="text-gray-700 underline hover:text-gray-900">Contact support</a></p>
            </div>
        </div>
    </div>

    <script>
        function createConversation() {
            document.getElementById("massage-conversation").innerText = "Creating conversation...";
            document.getElementById("massage-conversation").className = "text-gray-500 mt-2 text-sm animate-pulse";

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
                
                document.getElementById("massage-conversation").innerText = "Conversation started successfully";
                document.getElementById("massage-conversation").className = "text-green-600 mt-2 text-sm";
                videoId = data.video_id;
            })
            .catch(error => {
                document.getElementById("massage-conversation").innerText = "Error: " + error;
                document.getElementById("massage-conversation").className = "text-red-500 mt-2 text-sm";
            });
        }
    </script>
</body>
</html>