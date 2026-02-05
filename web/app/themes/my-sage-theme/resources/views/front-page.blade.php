@extends('layouts.app')
@section('content')
    @include('partials.page-header')
    <div class="py-10">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <x-project-card title="Refonte Agence 130$" image="/app/themes/mon-theme/dist/images/projet1.jpg" link="#">
                    <x-slot name="tags">
                        <span
                            class="text-[10px] px-2 py-0.5 rounded-full bg-brand/20 text-brand border border-brand/30">Sage
                            10</span>
                        <span
                            class="text-[10px] px-2 py-0.5 rounded-full bg-white/10 text-white border border-white/20">Tailwind
                            v4</span>
                    </x-slot>
                </x-project-card>
            </div>
        </div>
    </div>
    <div x-data="{ open: false }" class="p-10 bg-white/5 rounded-xl border border-white/10 mt-10 text-center">
        <button @click="open = !open"
            class="bg-brand px-6 py-2 rounded-full text-white font-bold transition-transform active:scale-95">
            Tester Alpine.js
        </button>

        <div x-show="open" x-transition class="mt-4 text-brand font-mono">
            🚀 Alpine est bien configuré et fonctionne avec Vite !
        </div>
    </div>
    <!-- @include('components.project-card') -->
@endsection