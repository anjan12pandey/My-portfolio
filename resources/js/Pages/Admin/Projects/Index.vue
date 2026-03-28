<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
    projects: Array<any>;
}>();
</script>

<template>
    <Head title="Manage Projects" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manage Projects</h2>
                <Link :href="route('admin.projects.create')" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Add New Project</Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b-2 border-slate-200 text-slate-500 uppercase text-xs tracking-wider">
                                    <th class="p-4">Title</th>
                                    <th class="p-4">Thumbnail</th>
                                    <th class="p-4">Featured</th>
                                    <th class="p-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="project in projects" :key="project.id" class="border-b border-slate-100 hover:bg-slate-50">
                                    <td class="p-4 font-medium text-slate-800">{{ project.title }}</td>
                                    <td class="p-4">
                                        <img v-if="project.preview_image_path" :src="project.preview_image_path" class="w-16 h-10 object-cover rounded shadow-sm" />
                                        <span v-else class="text-slate-400 text-sm italic">None</span>
                                    </td>
                                    <td class="p-4">
                                        <span v-if="project.is_featured" class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800">Yes</span>
                                        <span v-else class="px-2 py-1 text-xs rounded-full bg-slate-100 text-slate-800">No</span>
                                    </td>
                                    <td class="p-4 space-x-3">
                                        <Link :href="route('admin.projects.edit', project.id)" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">Edit</Link>
                                    </td>
                                </tr>
                                <tr v-if="projects.length === 0">
                                    <td colspan="4" class="p-8 text-center text-slate-500">No projects found. Create one.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
