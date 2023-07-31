<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    slug: '',
});

const submit = () => {
    form.post(route('stores.store'));
};
</script>

<template>
    <div>
        <form @submit.prevent="submit">
            <input type="text" v-model="form.name" name="name" id="name" placeholder="Name" required><br>
            <input type="text" v-model="form.slug" name="slug" id="slug" placeholder="Slug"><br>
            <button :disabled="form.processing" type="submit">Submit</button>
        </form>
    </div>
</template>