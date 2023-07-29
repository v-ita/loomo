<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    categories: Object,
})

const form = useForm({
    name: '',
    slug: '',
    parent_id: ''
});

const submit = () => {
    form.post(route('categories.store'));
};
</script>

<template>
    <div>
        <form @submit.prevent="submit">
            <input type="text" v-model="form.name" name="name" id="name" placeholder="Name" required><br>
            <input type="text" v-model="form.slug" name="slug" id="slug" placeholder="Slug"><br>
            <select id="parent_id" v-model="form.parent_id" v-if="categories.length">
                <option :value="null" selected>
                    --- Select an option ---
                </option>
                <option v-for="category in categories" :key="category.id" :value="category.id" v-text="category.name" />
            </select><br>
            <button :disabled="form.processing" type="submit">Submit</button>
        </form>
    </div>
</template>