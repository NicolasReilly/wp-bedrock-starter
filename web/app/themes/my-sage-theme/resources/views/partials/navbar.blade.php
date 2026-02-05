<nav class="navbar bg-black/15 py-4 ">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <div class="logo">
                <a href="{{ home_url('/') }}">
                    @if($site_logo)
                        <img src="{{ $site_logo }}" alt="{{ $siteName }}" class="h-12 w-auto">
                    @else
                        <span class="text-xl font-bold uppercase tracking-wider text-brand">
                            {{ $siteName }}
                        </span>
                    @endif
                </a>
            </div>
            @if ($primary_nav->isNotEmpty())
                <ul class="flex gap-6">
                    @foreach ($primary_nav->all() as $item)
                        <li class="menu-item {{ $item->active ? 'text-brand' : 'text-black' }}">
                            <a href="{{ $item->url }}" class="hover:text-brand no-underline! transition-colors">
                                {{ $item->label }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
            @if ($cta_nav->isNotEmpty())
                <ul class="flex items-center gap-4">
                    @foreach ($cta_nav->all() as $item)
                        <li class="menu-item {{ $item->active ? 'text-brand' : 'text-black' }}">
                            <a href="{{ $item->url }}"
                                class="hover:bg-black hover:rotate-5 block bg-brand no-underline! px-6 py-2 rounded-full text-white font-bold transition  active:scale-95">
                                {{ $item->label }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
            <!-- <div class="flex items-center gap-4">
                <button
                    class="bg-brand px-6 py-2 rounded-full text-white font-bold transition-transform active:scale-95">
                    Contact
                </button>
            </div> -->
        </div>
    </div>
</nav>