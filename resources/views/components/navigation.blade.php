<nav class=" sticky top-0 z-10">
    <div class="h-[60px] border-b border-secondary-3 flex items-center justify-between px-5 bg-color-1-300 w-full">
        <button class="p-2 group" id="fullscreen-button">
            <svg class="w-5 h-5 text-white group-hover:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 4H4m0 0v4m0-4 5 5m7-5h4m0 0v4m0-4-5 5M8 20H4m0 0v-4m0 4 5-5m7 5h4m0 0v-4m0 4-5-5" />
            </svg>
        </button>

        <div>
            <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                data-dropdown-placement="bottom-end"
                class="flex text-sm p-3 focus:bg-color-1-400 hover:bg-color-1-400 items-center gap-3" type="button">
                <div class="text-end">
                    <p class="text-sm text-white tracking-tight max-w-32 truncate">{{ Auth::user()->name }}</p>
                </div>
                <img class="w-8 h-8 rounded-full" src="{{ asset('assets/images/placeholder-image.jpg') }}"
                    alt="User Photo">
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownAvatar"
                class="z-30 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 border">
                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                    <p class="text-xs line-clamp-1">{{ Auth::user()->name }}</p>
                    <div class="font-medium truncate text-xs">{{ Auth::user()->email }}
                    </div>
                </div>
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                    <li>
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 hover:bg-gray-100 text-xs">Profil</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                class="block px-4 py-2 hover:bg-gray-100 text-xs">Logout</a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<script>
    document.getElementById("fullscreen-button").addEventListener("click", function() {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen().catch(err => {
                console.log(`Error attempting fullscreen: ${err.message}`);
            });
        } else {
            document.exitFullscreen();
        }
    });
</script>
