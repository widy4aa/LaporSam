<aside id="logo-sidebar"
    class="fixed left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full flex flex-col px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium flex-grow list-none p-0 m-0">
            <li>
                <a href="/petugas/dashboard"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 22 21">
                        <i
                            class="fa-solid fa-house text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    </svg>
                    <span class="ms-3">Home</span>
                </a>
            </li>
            <li>
                <a href="/petugas/jobdesk"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 18 18">
                        <i
                            class="fa-solid fa-trash text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Jobdesk Sampah</span>
                </a>
            </li>

            <li>
                <a href="leaderboard"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 18">
                        <i
                            class="fa-solid fa-user text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Leaderboard</span>
                </a>
            </li>
        </ul>

        <div class="mt-auto">
            <form action="/logout" method="post">
                @csrf
                @method('post')
                <button type="submit"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <i
                        class="fa-solid fa-sign-out-alt text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Keluar</span>
            </a>
            </form>

        </div>
    </div>
</aside>
