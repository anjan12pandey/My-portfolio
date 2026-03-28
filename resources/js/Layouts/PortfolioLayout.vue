<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
}>();
</script>

<template>
    <div class="min-h-screen bg-slate-900 text-slate-100 font-sans selection:bg-indigo-500 selection:text-white">
        <header class="fixed w-full backdrop-blur-md bg-slate-900/80 z-50 border-b border-slate-800 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center space-x-3">
                        <Link :href="route('home')" class="text-2xl font-black bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-cyan-400">
                            Portfolio.
                        </Link>
                    </div>
                    
                    <nav class="hidden md:flex space-x-8">
                        <Link :href="route('home')" class="text-sm font-medium hover:text-indigo-400 transition-colors">Home</Link>
                        <Link href="#projects" class="text-sm font-medium hover:text-indigo-400 transition-colors">Projects</Link>
                        <Link href="#skills" class="text-sm font-medium hover:text-indigo-400 transition-colors">Skills</Link>
                        <Link href="#contact" class="text-sm font-medium hover:text-indigo-400 transition-colors">Contact</Link>
                    </nav>

                    <div class="flex items-center space-x-4">
                        <template v-if="canLogin">
                            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm font-medium hover:text-indigo-400">Dashboard</Link>
                            <template v-else>
                                <Link :href="route('login')" class="text-sm font-medium hover:text-indigo-400">Log in</Link>
                                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm font-medium px-4 py-2 rounded-lg bg-indigo-500 hover:bg-indigo-600 transition-colors">Register</Link>
                            </template>
                        </template>
                    </div>
                </div>
            </div>
        </header>

        <main class="pt-16">
            <slot />
        </main>
        
        <footer class="border-t border-slate-800 py-8 text-center text-slate-500 text-sm mt-20">
            <p>&copy; {{ new Date().getFullYear() }} My Portfolio. All rights reserved.</p>
        </footer>
    </div>
</template>
