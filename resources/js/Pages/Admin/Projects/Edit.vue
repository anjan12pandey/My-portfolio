<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps<{
    project: any;
}>();

const form = useForm({
    title: props.project.title,
    description: props.project.description,
    preview_image_path: props.project.preview_image_path || '',
    project_url: props.project.project_url || '',
    github_url: props.project.github_url || '',
    tech_stack: props.project.tech_stack ? (Array.isArray(props.project.tech_stack) ? props.project.tech_stack.join(', ') : props.project.tech_stack) : '',
    is_featured: props.project.is_featured === 1,
});

const submit = () => {
    form.put(route('admin.projects.update', props.project.id));
};

const destroy = () => {
    if (confirm('Are you sure you want to delete this project?')) {
        form.delete(route('admin.projects.destroy', props.project.id));
    }
};
</script>

<template>
    <Head title="Edit Project" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Project</h2>
                <button @click="destroy" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Delete Project</button>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <form @submit.prevent="submit" class="space-y-6">
                        <div>
                            <InputLabel for="title" value="Project Title" />
                            <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required autofocus />
                            <InputError class="mt-2" :message="form.errors.title" />
                        </div>

                        <div>
                            <InputLabel for="description" value="Description" />
                            <textarea id="description" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="4" v-model="form.description" required></textarea>
                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>
                        
                        <div>
                            <InputLabel for="tech_stack" value="Tech Stack (comma separated)" />
                            <TextInput id="tech_stack" type="text" class="mt-1 block w-full" v-model="form.tech_stack" />
                            <InputError class="mt-2" :message="form.errors.tech_stack" />
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <InputLabel for="project_url" value="Live URL" />
                                <TextInput id="project_url" type="url" class="mt-1 block w-full" v-model="form.project_url" />
                                <InputError class="mt-2" :message="form.errors.project_url" />
                            </div>
                            <div>
                                <InputLabel for="github_url" value="GitHub URL" />
                                <TextInput id="github_url" type="url" class="mt-1 block w-full" v-model="form.github_url" />
                                <InputError class="mt-2" :message="form.errors.github_url" />
                            </div>
                        </div>

                        <div>
                            <InputLabel for="preview_image_path" value="Image URL" />
                            <TextInput id="preview_image_path" type="url" class="mt-1 block w-full" v-model="form.preview_image_path" />
                            <InputError class="mt-2" :message="form.errors.preview_image_path" />
                        </div>

                        <div class="block mt-4">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_featured" v-model="form.is_featured" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                                <span class="ml-2 text-sm text-gray-600">Feature this project on homepage</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Update Project
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
