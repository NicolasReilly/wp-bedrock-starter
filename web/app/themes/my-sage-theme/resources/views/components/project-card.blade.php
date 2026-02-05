{{-- resources/views/components/project-card.blade.php --}}
<div x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false"
    class="relative overflow-hidden rounded-2xl bg-dark-bg border border-white/10 transition-all duration-500 hover:border-brand/50">
    {{-- Image du projet --}}
    <div class="aspect-video overflow-hidden">
        <img src="" alt="" class="h-full w-full object-cover transition-transform duration-700"
            :class="hover ? 'scale-110' : 'scale-100'">
    </div>

    {{-- Overlay d'infos (Alpine.js) --}}
    <div class="absolute inset-0 bg-gradient-to-t from-dark-bg via-dark-bg/40 to-transparent p-6 flex flex-col justify-end transition-opacity duration-300"
        :class="hover ? 'opacity-100' : 'opacity-90'">
        <h3 class="text-xl font-bold text-white mb-2"></h3>

        <div class="flex gap-2 mb-4">
            {{-- On passera les badges ici --}}
        </div>

        <a href="" class="text-brand font-semibold flex items-center gap-2 hover:underline">
            Voir le projet
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                </path>
            </svg>
        </a>
    </div>
</div>