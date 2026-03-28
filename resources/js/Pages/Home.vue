<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PortfolioLayout from '@/Layouts/PortfolioLayout.vue';
import { ref, onMounted } from 'vue';

defineProps<{
    projects: Array<any>;
    skills: Array<any>;
    experiences: Array<any>;
}>();

const text = ref('');
const fullText = "Full Stack Developer building stunning web experiences.";
let index = 0;

onMounted(() => {
    setInterval(() => {
        if (index < fullText.length) {
            text.value += fullText.charAt(index);
            index++;
        }
    }, 100);
});
</script>

<template>
    <Head title="Home" />
    <PortfolioLayout :canLogin="true" :canRegister="true">
        <!-- Hero Section -->
        <section class="relative h-[90vh] flex items-center justify-center overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/20 via-slate-900 to-cyan-900/20"></div>
            <div class="absolute inset-0 opacity-30 bg-slate-900 bg-[radial-gradient(#4f46e5_1px,transparent_1px)] [background-size:20px_20px] pointer-events-none"></div>
            <div class="relative z-10 text-center max-w-4xl mx-auto px-4">
                <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-6 mt-10">
                    Hi, I'm <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-indigo-500 drop-shadow-sm">John Doe</span>
                </h1>
                <p class="text-xl md:text-2xl text-slate-300 h-8 font-light tracking-wide flex justify-center items-center">
                    <span>{{ text }}</span><span class="animate-pulse font-bold ml-1 text-indigo-400">|</span>
                </p>
                <div class="mt-12 flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                    <a href="#projects" class="px-8 py-3.5 rounded-full bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 text-white font-medium transition-all transform hover:scale-105 shadow-lg shadow-indigo-500/25 border border-indigo-400/20">View My Work</a>
                    <a href="#skills" class="px-8 py-3.5 rounded-full bg-slate-800/80 hover:bg-slate-700 text-slate-300 font-medium transition-all border border-slate-600/50 backdrop-blur-sm shadow-xl shadow-slate-900/50 hover:text-white">Discover My Skills</a>
                </div>
            </div>
            
            <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
                <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="py-24 bg-slate-900 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-cyan-400">Featured Projects</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-transparent mx-auto mt-4 rounded-full opacity-70"></div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div v-for="project in projects" :key="project.id" class="group bg-slate-800/30 backdrop-blur-sm rounded-3xl overflow-hidden border border-slate-700/50 hover:border-indigo-500/50 transition-all duration-300 hover:shadow-[0_0_30px_rgba(99,102,241,0.1)]">
                        <div class="h-52 bg-slate-800 relative overflow-hidden group-hover:bg-slate-700 transition-colors">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent z-10"></div>
                            <img v-if="project.preview_image_path" :src="project.preview_image_path" :alt="project.title" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
                            <div v-else class="w-full h-full flex items-center justify-center text-slate-600">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        </div>
                        <div class="p-6 relative">
                            <h3 class="text-2xl font-bold text-slate-100 mb-2 group-hover:text-indigo-400 transition-colors">{{ project.title }}</h3>
                            <p class="text-slate-400 text-sm mb-6 line-clamp-3 leading-relaxed">{{ project.description }}</p>
                            <div class="flex flex-wrap gap-2 mb-6" v-if="project.tech_stack">
                                <span v-for="tech in project.tech_stack" :key="tech" class="px-3 py-1 text-xs font-semibold rounded-full bg-slate-900/50 text-indigo-300 border border-slate-700/50 shadow-inner">{{ tech }}</span>
                            </div>
                            <div class="flex justify-between items-center mt-auto border-t border-slate-700/50 pt-4">
                                <a :href="project.project_url || '#'" class="text-cyan-400 hover:text-cyan-300 text-sm font-semibold flex items-center group-hover:translate-x-1 transition-transform">
                                    Live Demo 
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </a>
                                <a v-if="project.github_url" :href="project.github_url" class="text-slate-400 hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div v-if="!projects.length" class="col-span-full flex flex-col items-center justify-center py-20 opacity-50">
                        <svg class="w-16 h-16 text-slate-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        <p class="text-lg text-slate-400">No projects crafted yet.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Skills Section -->
        <section id="skills" class="py-24 bg-slate-900 border-t border-t-slate-800 relative z-10 shadow-[0_-20px_40px_-20px_rgba(0,0,0,0.5)]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-16 items-center">
                    <div>
                        <h2 class="text-3xl md:text-5xl font-extrabold mb-8 bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-cyan-400">Technical Arsenal</h2>
                        <p class="text-slate-400 text-lg leading-relaxed mb-8">
                            I've spent years honing my skills across the modern web development stack. From robust backend architectures to fluid frontend experiences, I choose the right tools for each unique challenge to build scalable, premium applications.
                        </p>
                        
                        <div class="flex gap-4 mb-8">
                            <div class="bg-indigo-500/10 border border-indigo-500/20 p-4 rounded-2xl">
                                <span class="block text-3xl font-bold text-indigo-400 mb-1">4+</span>
                                <span class="text-sm text-slate-400 uppercase tracking-widest font-semibold">Years Exp</span>
                            </div>
                            <div class="bg-cyan-500/10 border border-cyan-500/20 p-4 rounded-2xl">
                                <span class="block text-3xl font-bold text-cyan-400 mb-1">30+</span>
                                <span class="text-sm text-slate-400 uppercase tracking-widest font-semibold">Projects</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-slate-800/50 border border-slate-700/50 p-8 rounded-3xl shadow-xl">
                        <div class="space-y-6">
                            <div v-for="skill in skills" :key="skill.id" class="group">
                                <div class="flex justify-between mb-2">
                                    <span class="text-slate-200 font-semibold text-sm flex items-center">
                                        {{ skill.name }}
                                        <span class="ml-2 px-2 py-0.5 text-xs rounded-full bg-slate-700/50 text-slate-400 border border-slate-600/30">{{ skill.category }}</span>
                                    </span>
                                    <span class="text-cyan-400 text-sm font-mono">{{ skill.proficiency }}%</span>
                                </div>
                                <div class="w-full bg-slate-900/80 rounded-full h-2 overflow-hidden shadow-inner">
                                    <div class="bg-gradient-to-r from-indigo-500 via-cyan-400 to-indigo-400 h-2 rounded-full transition-all duration-1000 ease-out group-hover:shadow-[0_0_10px_rgba(34,211,238,0.5)]" :style="{ width: skill.proficiency + '%' }"></div>
                                </div>
                            </div>
                            <div v-if="!skills.length" class="text-slate-500 text-center py-8">
                                Skills framework ready.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Experience Timeline -->
        <section id="experience" class="py-24 bg-slate-800/30 border-t border-slate-800">
           <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-white">Career Journey</h2>
                    <div class="w-16 h-1 bg-cyan-500 mx-auto rounded-full"></div>
                </div>
                
                <div class="relative border-l-2 border-slate-700/80 ml-3 md:ml-6 space-y-16">
                    <div v-for="exp in experiences" :key="exp.id" class="relative pl-8 md:pl-0">
                        <!-- Mobile marker -->
                        <div class="md:hidden absolute w-5 h-5 rounded-full bg-gradient-to-r from-indigo-400 to-cyan-400 -left-[2.85rem] top-1.5 border-4 border-slate-900 shadow-md"></div>
                        
                        <div class="md:flex items-start justify-between mb-2 group">
                            <div class="md:w-1/3 md:text-right md:pr-12 relative pt-1">
                                <!-- Desktop marker -->
                                <div class="hidden md:block absolute w-5 h-5 rounded-full bg-gradient-to-r from-indigo-400 to-cyan-400 -right-[0.7rem] top-1.5 border-4 border-slate-900 shadow-[0_0_15px_rgba(99,102,241,0.6)] group-hover:scale-125 transition-transform duration-300"></div>
                                <span class="bg-slate-800/80 text-cyan-300 px-3 py-1 rounded-full border border-slate-700 font-mono text-sm max-w-max inline-block shadow-sm">
                                    {{ exp.start_date.substring(0,4) }} - {{ exp.is_current ? 'Present' : exp.end_date.substring(0,4) }}
                                </span>
                            </div>
                            <div class="md:w-2/3 md:pl-12 mt-4 md:mt-0 p-6 bg-slate-800/40 border border-slate-700/50 rounded-2xl hover:bg-slate-800/70 transition-colors backdrop-blur-sm">
                                <h3 class="text-xl font-bold text-slate-100">{{ exp.role }}</h3>
                                <div class="text-indigo-400 font-medium mb-4 text-sm">{{ exp.company }}</div>
                                <p class="text-slate-400 text-sm leading-relaxed">{{ exp.description }}</p>
                            </div>
                        </div>
                    </div>
                    <div v-if="!experiences.length" class="text-slate-500 text-center py-8">
                         Career timeline initialized.
                    </div>
                </div>
            </div>
        </section>
    </PortfolioLayout>
</template>
