<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    iso_code: '',
});

const submit = () => {
    form.post(route('languages.store'));
};
</script>

<template>
    <div>
        <form @submit.prevent="submit">
            <input type="text" v-model="form.name" name="name" id="name" placeholder="Name" required><br>
            <input type="text" v-model="form.iso_code" name="iso_code" id="iso_code" placeholder="ISO code"><br>
            <button :disabled="form.processing" type="submit">Submit</button>
        </form>
    </div>
</template>