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
        
        <!-- Modern Footer -->
        <footer class="relative border-t border-slate-800 bg-slate-900/80 pt-16 pb-8 mt-20 overflow-hidden">
            <!-- Decorative gradient blur -->
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-lg h-px bg-gradient-to-r from-transparent via-indigo-500 to-transparent opacity-50"></div>
            <div class="absolute -bottom-24 -left-24 w-full max-w-xs md:max-w-md aspect-square bg-indigo-500 rounded-full mix-blend-multiply filter blur-[128px] opacity-20"></div>
            <div class="absolute -bottom-24 -right-24 w-full max-w-xs md:max-w-md aspect-square bg-cyan-500 rounded-full mix-blend-multiply filter blur-[128px] opacity-20"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
                    <!-- Brand Section -->
                    <div class="col-span-1 md:col-span-1">
                        <Link :href="route('home')" class="inline-block text-2xl font-black bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-cyan-400 mb-4">
                            Portfolio.
                        </Link>
                        <p class="text-slate-400 text-sm leading-relaxed max-w-xs">
                            Crafting digital experiences with modern web technologies. Building scalable, beautiful, and accessible applications.
                        </p>
                        <!-- Social Icons -->
                        <div class="mt-6 flex space-x-4">
                            <a href="#" class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-slate-400 hover:text-indigo-400 hover:bg-slate-700 transition-all shadow-sm border border-slate-700/50 hover:border-indigo-500/30">
                                <span class="sr-only">GitHub</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-slate-400 hover:text-cyan-400 hover:bg-slate-700 transition-all shadow-sm border border-slate-700/50 hover:border-cyan-500/30">
                                <span class="sr-only">LinkedIn</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd" /></svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-slate-400 hover:text-indigo-400 hover:bg-slate-700 transition-all shadow-sm border border-slate-700/50 hover:border-indigo-500/30">
                                <span class="sr-only">Twitter</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="col-span-1 md:col-span-1 flex flex-col md:pl-12">
                        <h3 class="text-white font-semibold mb-4 tracking-wide uppercase text-sm">Navigation</h3>
                        <ul class="space-y-3">
                            <li><Link :href="route('home')" class="text-sm text-slate-400 hover:text-cyan-400 transition-colors inline-block w-max">Home</Link></li>
                            <li><Link href="#projects" class="text-sm text-slate-400 hover:text-cyan-400 transition-colors inline-block w-max">Projects</Link></li>
                            <li><Link href="#skills" class="text-sm text-slate-400 hover:text-cyan-400 transition-colors inline-block w-max">Skills</Link></li>
                        </ul>
                    </div>

                    <!-- Contact/CTA -->
                    <div class="col-span-1 md:col-span-1" id="contact">
                        <h3 class="text-white font-semibold mb-4 tracking-wide uppercase text-sm">Let's Connect</h3>
                        <p class="text-sm text-slate-400 mb-4 line-clamp-3">
                            Currently open for new opportunities or exciting projects. Feel free to reach out.
                        </p>
                        <a href="mailto:hello@example.com" class="inline-flex items-center px-4 py-2 border border-slate-700 hover:border-indigo-500 rounded-lg text-sm font-medium text-slate-300 hover:text-white bg-slate-800/50 hover:bg-indigo-500/10 transition-colors shadow-sm w-max">
                            <svg class="w-4 h-4 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            hello@example.com
                        </a>
                    </div>
                </div>

                <!-- Bottom bar -->
                <div class="pt-8 border-t border-slate-800/80 flex flex-col md:flex-row justify-between items-center text-xs text-slate-500">
                    <p>&copy; {{ new Date().getFullYear() }} My Portfolio. All rights reserved.</p>
                    <p class="mt-2 md:mt-0 flex items-center">
                        Built with <svg class="w-3 h-3 mx-1 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg> using Laravel & Vue.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</template>
