<div>
    <div class="bg-blue-dark">
        <div class="container mx-auto px-4">
            <div class="flex items-center md:justify-between py-4">
                <div class="w-1/4 md:hidden">
                    <svg class="fill-current text-white h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M16.4 9H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zm0 4H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zM3.6 7h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1z" />
                    </svg>
                </div>
                <div class="w-1/2 md:w-auto text-center text-white text-2xl font-medium">
                    КВН Статистика
                </div>
                <div class="w-1/4 md:w-auto md:flex text-right">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/home') }}">Home</a>
                    @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                    @endif
                    @endauth
                    @endif
                    <!-- <div>
                    <img class="inline-block h-8 w-8 rounded-full" src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
                    </div>
                    <div class="hidden md:block md:flex md:items-center ml-2">
                    <span class="text-white text-sm mr-1">Adam Wathan</span>
                    <div>
                        <svg class="fill-current text-white h-4 w-4 block opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4.516 7.548c.436-.446 1.043-.481 1.576 0L10 11.295l3.908-3.747c.533-.481 1.141-.446 1.574 0 .436.445.408 1.197 0 1.615-.406.418-4.695 4.502-4.695 4.502a1.095 1.095 0 0 1-1.576 0S4.924 9.581 4.516 9.163c-.409-.418-.436-1.17 0-1.615z"/></svg>
                    </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="bg-blue-dark block bg-white border-b">
        <div class="container mx-auto px-4">
            <div class="flex">
                <div class="flex -mb-px mr-8">
                    <a href="{{ route('statistics.teams') }}"
                        class="no-underline {{ request()->routeIs('statistics.teams') ? 'text-blue-500 md:hover:border-blue-500' : 'text-gray-500 opacity-100 md:hover:border-gray-500' }} flex items-center py-4 border-b border-transparent hover:opacity-100">
                        <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M15.989 19.129c0-2.246-2.187-3.389-4.317-4.307-2.123-.914-2.801-1.684-2.801-3.334 0-.989.648-.667.932-2.481.12-.752.692-.012.802-1.729 0-.684-.313-.854-.313-.854s.159-1.013.221-1.793c.064-.817-.398-2.56-2.301-3.095-.332-.341-.557-.882.467-1.424-2.24-.104-2.761 1.068-3.954 1.93-1.015.756-1.289 1.953-1.24 2.59.065.78.223 1.793.223 1.793s-.314.17-.314.854c.11 1.718.684.977.803 1.729.284 1.814.933 1.492.933 2.481 0 1.65-.212 2.21-2.336 3.124C.663 15.53 0 17 .011 19.129.014 19.766 0 20 0 20h16s-.011-.234-.011-.871zm2.539-5.764c-1.135-.457-1.605-1.002-1.605-2.066 0-.641.418-.432.602-1.603.077-.484.447-.008.518-1.115 0-.441-.202-.551-.202-.551s.103-.656.143-1.159c.05-.627-.364-2.247-2.268-2.247-1.903 0-2.318 1.62-2.269 2.247.042.502.144 1.159.144 1.159s-.202.109-.202.551c.071 1.107.441.631.518 1.115.184 1.172.602.963.602 1.603 0 1.064-.438 1.562-1.809 2.152-.069.029-.12.068-.183.102 1.64.712 4.226 1.941 4.838 4.447H20v-2.318c0-1-.273-1.834-1.472-2.317z" />
                        </svg>
                        Команды
                    </a>
                </div>
                <div class="flex -mb-px mr-8">
                    <a href="{{ route('statistics.videos') }}"
                        class="no-underline {{ request()->routeIs('statistics.videos') ? 'text-blue-500 md:hover:border-blue-500' : 'text-gray-500 opacity-100 md:hover:border-gray-500' }} flex items-center py-4 border-b border-transparent hover:opacity-100">
                        <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M20 5V3.799A.798.798 0 0 0 19.201 3H.801A.8.8 0 0 0 0 3.799V5h2v2H0v2h2v2H0v2h2v2H0v1.199A.8.8 0 0 0 .801 17h18.4a.8.8 0 0 0 .799-.801V15h-2v-2h2v-2h-2V9h2V7h-2V5h2zM8 13V7l5 3-5 3z" />
                        </svg>
                        Видео
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>