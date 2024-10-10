<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Short URL</title>
        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            function copyToClipboard() {
                var copyText = document.getElementById("shortLinkInput");
                copyText.select();
                copyText.setSelectionRange(0, 99999); // For mobile devices

                try {
                    document.execCommand("copy");
                    alert("Copied to clipboard: " + copyText.value);
                } catch (err) {
                    alert("Failed to copy: ", err);
                }
            }
        </script>
    </head>

    <body class="bg-gray-100">

        <!-- Container -->
        <div class="container mx-auto mt-12 max-w-lg p-8 bg-white shadow-md rounded-lg">
            <!-- Title -->
            <h1 class="text-3xl font-semibold text-center text-blue-600 mb-6">Short URL</h1>

            <!-- URL Input Section -->
            <p class="text-center text-gray-700 mb-4">Paste the URL to be shortened</p>
            <form action="{{ route('generate') }}" method="POST">
                @csrf
                <div class="flex mb-4">
                    <input id="original_url" name="original_url" type="url" placeholder="Enter the link here"
                        class="flex-grow border border-gray-300 rounded-l-lg px-4 py-2 outline-none focus:border-blue-500"
                        required>
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-r-lg hover:bg-blue-700">Shorten URL</button>
                </div>
            </form>

            <!-- Description -->
            <p class="text-gray-500 text-sm text-center">
                ShortURL is a free tool to shorten URLs and generate short links.
                URL shortener allows you to create a shortened link, making it easy to share.
            </p>

            <!-- Premium Section -->
            @if (isset($shortCode))
                <div class="mt-8 border-t pt-6 text-center">
                    <h2 class="text-lg font-semibold mb-2">Your shorten link!</h2>
                    <p class="text-gray-500 text-sm mb-4">
                        <input type="text" id="shortLinkInput" value="{{ url($shortCode) }}" readonly
                            class="border-none bg-transparent text-center w-full focus:outline-none focus:bg-white focus:text-black">
                        <button onclick="copyToClipboard()"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 mt-2">Copy</button>
                    </p>
                </div>
            @endif

        </div>

    </body>

</html>
