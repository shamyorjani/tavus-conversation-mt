<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        medical: {
                            100: '#e1f5fe',
                            200: '#b3e5fc',
                            300: '#81d4fa',
                            400: '#4fc3f7',
                            500: '#29b6f6',
                            600: '#039be5',
                            700: '#0288d1',
                            800: '#0277bd',
                            900: '#01579b',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gradient-to-br from-medical-100 to-white min-h-screen flex items-center justify-center p-2 sm:p-6">
    <div class="max-w-xl w-full bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
        <!-- Header Section with medical themed gradient -->
        <div class="bg-gradient-to-r from-medical-700 to-medical-600 p-5 sm:p-8 relative overflow-hidden">
            <div class="absolute inset-0 bg-white/10 opacity-20 transform -skew-x-12"></div>
            <h2 class="text-3xl font-bold mb-2 text-white relative z-10">Create Conversation</h2>
            <p class="text-blue-50 text-sm relative z-10">Get your conversation URL for math tutor</p>
        </div>

        <div class="p-5 sm:p-8">
            <!-- Message Container -->
            <div id="message-container" class="mb-6 rounded-lg text-sm hidden"></div>

            <!-- Button to get conversation URL -->
            <button id="getConversationButton"
                class="w-full flex justify-center items-center space-x-2 py-3 px-4 bg-gradient-to-r from-medical-600 to-medical-700 text-white rounded-xl hover:from-medical-700 hover:to-medical-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-medical-500 transition duration-300 shadow-lg">
                <i class="fas fa-microscope mr-2"></i>
                <span class="font-medium">Get Conversation</span>
            </button>

            <!-- Iframe to display the conversation -->
            <div id="iframe-container" class="mt-6 hidden">
                <iframe id="conversationIframe" class="w-full h-96 border rounded-lg" src="" frameborder="0"></iframe>
            </div>
        </div>
        
        <!-- Footer with helpful info -->
        <div class="px-8 py-4 bg-gray-50 border-t border-gray-100">
            <p class="text-xs text-gray-500 text-center">Get Conversation</p>
        </div>
    </div>

    <!-- JavaScript to handle getting the conversation URL -->
    <script>
        function getConversationUrl() {
            const messageDiv = $("#message-container");
            const getConversationButton = $("#getConversationButton");
            const iframeContainer = $("#iframe-container");
            const conversationIframe = $("#conversationIframe");

            // Disable the button and show loader
            getConversationButton.prop("disabled", true).off("click");
            getConversationButton.html('<i class="fas fa-spinner fa-spin mr-2"></i> Generating...');

            fetch("lib/tavus.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    name: "Khan",
                    email: "khan@gmail.com",
                    textContent: "This is my document"
                })
            })
            .then(response => response.json())
            .then(data => {
                messageDiv.html("").removeClass("hidden");
                console.log("Response from tavus.php:", data);

                if (data.conversation_url) {
                    // Append the conversation URL to the iframe
                    conversationIframe.attr("src", data.conversation_url);
                    iframeContainer.removeClass("hidden");
                } else {
                    messageDiv.html(
                        '<div class="text-red-600 font-medium bg-red-50 p-3 border border-red-200 rounded-lg"><i class="fas fa-exclamation-circle"></i> ' +
                        data.message + '</div>'
                    );
                }

                // Re-enable the button
                getConversationButton.prop("disabled", false);
                getConversationButton.html(
                    '<i class="fas fa-microscope mr-2"></i> Get Conversation URL'
                );
            })
            .catch(error => {
                console.error("Error fetching conversation:", error);
                messageDiv.html(
                    '<div class="text-red-600 font-medium bg-red-50 p-3 border border-red-200 rounded-lg"><i class="fas fa-exclamation-circle"></i> Error generating conversation URL.</div>'
                );

                // Re-enable the button
                getConversationButton.prop("disabled", false);
                getConversationButton.html(
                    '<i class="fas fa-microscope mr-2"></i> Get Conversation URL'
                );
            });
        }

        $(document).ready(function() {
            $("#getConversationButton").on("click", function() {
                getConversationUrl();
            });
        });
    </script>
</body>

</html>