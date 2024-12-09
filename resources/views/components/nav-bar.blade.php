<header class="py-12 fixed w-screen z-50 pb-12 left-0 top-0 bg-gradient-to-r from-fuchsia-600 to-blue-600">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="text-center xl:flex xl:items-center xl:justify-between xl:text-left">
            <div class="xl:flex xl:items-center xl:justify-start">
                <img class="w-auto mx-auto h-7" src="https://cdn.rareblocks.xyz/collection/celebration/images/logo-alt-2.svg" alt="" />
                
            </div>

            <div class="items-center mt-8 xl:mt-0 xl:flex xl:justify-end xl:space-x-8">
                <ul class="flex flex-wrap items-center justify-center gap-x-8 gap-y-3 xl:justify-end">
                    <li>
                        <a href="/" title="" class="text-sm text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> Create </a>
                    </li>

                    <li>
                        <a href="/show" title="" class="text-sm text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> Show </a>
                    </li>
                    <li>
                        <a href="/logout" title="" class="text-sm text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80">Logout</a>
                    </li>

                   
                </ul>

                <div class="w-full h-px mt-8 mb-5 xl:w-px xl:m-0 xl:h-6 bg-gray-50/20"></div>

                @if (Auth::check())
                    <span class="text-sm text-white" >HEllo {{Auth()->user()->name}}</span>
                    
                @elseif (!Auth::check())
                <button>
                    <a href="{{route('register')}}" title="" class="text-sm text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> Sign In </a>
                </button>
                @endif
            </div>
        </div>
    </div>
</header>
