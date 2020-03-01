<nav-header inline-template>
    <div>
        <div class="bg-blue-dark">
            <div class="container mx-auto px-4">
                <div class="flex items-center md:justify-between py-4">
                    <div class="w-1/4 md:hidden">
                        <svg @click.prevent="showMenu = !showMenu" class="fill-current text-white h-8 w-8"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M16.4 9H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zm0 4H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zM3.6 7h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1z" />
                        </svg>
                    </div>
                    <div class="w-1/2 md:w-auto text-center text-white text-2xl font-medium">
                        КВН Статистика
                    </div>
                    <div class="w-1/4 md:w-auto md:flex text-right items-center">
                        @if (Route::has('login'))
                        @auth
                        <div class="relative group" @click="showSubMenu = !showSubMenu">
                            <div class="flex items-center cursor-pointer text-sm text-white py-1 px-2">
                                <div>
                                    <img class="inline-block h-8 w-8 rounded-full"
                                        src="{{ auth()->user()->gravatar_link }}" alt="">
                                </div>
                                <div class="hidden md:block md:flex md:items-center ml-2">
                                    <span class="text-white text-sm mr-1">{{ auth()->user()->name }}</span>
                                    <div>
                                        <svg class="fill-current text-white h-4 w-4 block opacity-50"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path
                                                d="M4.516 7.548c.436-.446 1.043-.481 1.576 0L10 11.295l3.908-3.747c.533-.481 1.141-.446 1.574 0 .436.445.408 1.197 0 1.615-.406.418-4.695 4.502-4.695 4.502a1.095 1.095 0 0 1-1.576 0S4.924 9.581 4.516 9.163c-.409-.418-.436-1.17 0-1.615z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div v-cloak class="absolute bg-blue-dark items-center pt-4 w-full z-10"
                                :class="showSubMenu ? 'visible' : 'invisible'">
                                <a href="{{ route('dashboard') }}"
                                    class="px-3 py-2 block text-white hover:text-gray-800 hover:bg-blue-500">Панель
                                    управл.</a>
                                @if(auth()->user()->is_admin)
                                <a href="{{ route('admin.enter-data.index') }}"
                                    class="px-3 py-2 block text-white hover:text-gray-800 hover:bg-blue-500">Ввод
                                    данных</a>
                                @endif
                                <hr class="border-t mx-2 border-grey-light">
                                <a href="{{ route('logout') }}"
                                    class="px-3 py-2 block text-white hover:text-gray-800 hover:bg-blue-500" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Выход
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                        @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="md:block bg-blue-dark block bg-white border-b" :class="showMenu ? '' : 'hidden'">
            <div class="container mx-auto px-4">
                <div class="flex justify-between">
                    <div class="flex">
                        <div class="flex -mb-px mr-8">
                            <a href="{{ route('statistics.teams') }}"
                                class="no-underline {{ request()->routeIs('statistics.teams') ? 'text-blue-500 md:hover:border-blue-500' : 'text-gray-500 opacity-100 md:hover:border-gray-500' }} flex items-center py-4 border-b border-transparent hover:opacity-100">
                                <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M15.989 19.129c0-2.246-2.187-3.389-4.317-4.307-2.123-.914-2.801-1.684-2.801-3.334 0-.989.648-.667.932-2.481.12-.752.692-.012.802-1.729 0-.684-.313-.854-.313-.854s.159-1.013.221-1.793c.064-.817-.398-2.56-2.301-3.095-.332-.341-.557-.882.467-1.424-2.24-.104-2.761 1.068-3.954 1.93-1.015.756-1.289 1.953-1.24 2.59.065.78.223 1.793.223 1.793s-.314.17-.314.854c.11 1.718.684.977.803 1.729.284 1.814.933 1.492.933 2.481 0 1.65-.212 2.21-2.336 3.124C.663 15.53 0 17 .011 19.129.014 19.766 0 20 0 20h16s-.011-.234-.011-.871zm2.539-5.764c-1.135-.457-1.605-1.002-1.605-2.066 0-.641.418-.432.602-1.603.077-.484.447-.008.518-1.115 0-.441-.202-.551-.202-.551s.103-.656.143-1.159c.05-.627-.364-2.247-2.268-2.247-1.903 0-2.318 1.62-2.269 2.247.042.502.144 1.159.144 1.159s-.202.109-.202.551c.071 1.107.441.631.518 1.115.184 1.172.602.963.602 1.603 0 1.064-.438 1.562-1.809 2.152-.069.029-.12.068-.183.102 1.64.712 4.226 1.941 4.838 4.447H20v-2.318c0-1-.273-1.834-1.472-2.317z" />
                                </svg>
                                <span class="hidden md:inline">Команды</span>
                            </a>
                        </div>
                        <div class="flex -mb-px mr-8">
                            <a href="{{ route('statistics.games') }}"
                                class="no-underline {{ request()->routeIs('statistics.games') ? 'text-blue-500 md:hover:border-blue-500' : 'text-gray-500 opacity-100 md:hover:border-gray-500' }} flex items-center py-4 border-b border-transparent hover:opacity-100">
                                <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M11.18 14.356c0-1.451 1.1-2.254 2.894-3.442C16.268 9.458 19 7.649 19 3.354a.703.703 0 0 0-.709-.699h-3.43C14.377 1.759 12.932.8 10 .8c-2.934 0-4.377.959-4.862 1.855H1.707A.703.703 0 0 0 1 3.354c0 4.295 2.73 6.104 4.926 7.559 1.794 1.188 2.894 1.991 2.894 3.442v1.311c-1.884.209-3.269.906-3.269 1.736 0 .994 1.992 1.799 4.449 1.799s4.449-.805 4.449-1.799c0-.83-1.385-1.527-3.269-1.736v-1.31zM13.957 9.3c.566-1.199 1.016-2.826 1.088-5.246h2.51c-.24 2.701-1.862 4.064-3.598 5.246zM10 2.026c2.732-.002 3.799 1.115 3.798 1.529 0 .418-1.066 1.533-3.798 1.535-2.732-.001-3.799-1.116-3.799-1.534C6.2 3.142 7.268 2.024 10 2.026zM2.445 4.054h2.509c.073 2.42.521 4.047 1.089 5.246-1.736-1.182-3.359-2.545-3.598-5.246z" />
                                </svg>
                                <span class="hidden md:inline">Игры</span>
                            </a>
                        </div>
                        <div class="flex -mb-px mr-8">
                            <a href="{{ route('statistics.videos') }}"
                                class="no-underline {{ request()->routeIs('statistics.videos') ? 'text-blue-500 md:hover:border-blue-500' : 'text-gray-500 opacity-100 md:hover:border-gray-500' }} flex items-center py-4 border-b border-transparent hover:opacity-100">
                                <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M20 5V3.799A.798.798 0 0 0 19.201 3H.801A.8.8 0 0 0 0 3.799V5h2v2H0v2h2v2H0v2h2v2H0v1.199A.8.8 0 0 0 .801 17h18.4a.8.8 0 0 0 .799-.801V15h-2v-2h2v-2h-2V9h2V7h-2V5h2zM8 13V7l5 3-5 3z" />
                                </svg>
                                <span class="hidden md:inline">Смотреть</span>
                            </a>
                        </div>
                        <div class="flex -mb-px mr-8">
                            <a href="{{ route('blog.index', ['tag' => 'useless-kvn']) }}"
                                class="no-underline {{ request()->routeIs('blog.index') ? 'text-blue-500 md:hover:border-blue-500' : 'text-gray-500 opacity-100 md:hover:border-gray-500' }} flex items-center py-4 border-b border-transparent hover:opacity-100">
                                <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 20 20">
                                    <path 
                                    d="M17 5.95v10.351c0 .522-.452.771-1 1.16-.44.313-1-.075-1-.587V6.76c0-.211-.074-.412-.314-.535-.24-.123-7.738-4.065-7.738-4.065-.121-.045-.649-.378-1.353-.016-.669.344-1.033.718-1.126.894l8.18 4.482c.217.114.351.29.351.516v10.802a.67.67 0 0 1-.369.585.746.746 0 0 1-.333.077.736.736 0 0 1-.386-.104c-.215-.131-7.774-4.766-8.273-5.067-.24-.144-.521-.439-.527-.658L3 3.385c0-.198-.023-.547.289-1.032C3.986 1.269 6.418.036 7.649.675l8.999 4.555c.217.112.352.336.352.72z"/>
                                </svg>
                                <span class="hidden md:inline">Читать</span>
                            </a>
                        </div>
                    </div>

                    <div class="pl-4 flex items-center">
                        <div id="search-toggle" @click="showSearch=!showSearch" v-show="!isComparing"
                            class="search-icon cursor-pointer pl-6 mr-2 {{ request()->routeIs('statistics.teams') ? '' : 'hidden' }}">
                            <svg class="fill-current pointer-events-none text-grey-darkest w-4 h-4 inline"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                                </path>
                            </svg>
                        </div>
                        <div 
                        @click="showSortSubMenu = !showSortSubMenu"
                        class="relative group cursor-pointer pl-2 {{ request()->routeIs('statistics.teams') ? '' : 'hidden' }}" 
                        v-show="!isComparing">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="fill-current pointer-events-none text-grey-darkest w-4 h-4">
                                <path d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/>
                            </svg>
                            <div v-cloak class="absolute bg-white right-0 pt-4 z-10"
                                style="width:8em;"
                                :class="showSortSubMenu ? 'visible' : 'invisible'">
                                <div 
                                    @click="sortDesc"
                                    class="px-3 py-2 block text-gray-600 hover:text-gray-900"
                                    :class="sortDirection == 'desc' ? 'font-semibold' : ''">
                                    Высокий ОКГ
                                </div>
                                <div 
                                    @click="sortAsc"
                                    class="px-3 py-2 block text-gray-600 hover:text-gray-900"
                                    :class="sortDirection == 'asc' ? 'font-semibold' : ''">
                                    Низкий ОКГ
                                </div>
                            </div>
                        </div>           
                    </div>
                </div>
            </div>
        </div>
        <div class="relative w-full bg-white shadow-xl" id="search-content" v-cloak>
            <div v-if="showSearch" class="container mx-auto p-4 text-black">
                <input id="searchfield" type="search" placeholder="Поиск..." :autofocus="showSearch"
                    v-model="searchText"
                    class="w-full text-gray-800 transition focus:outline-none focus:border-transparent appearance-none leading-normal text-lg">
            </div>
        </div>
    </div>
</nav-header>