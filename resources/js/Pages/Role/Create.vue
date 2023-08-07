<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    code: '',
});

const submit = () => {
    form.post(route('roles.store'));
};
</script>

<template>
    <div>
        <form @submit.prevent="submit">
            <input type="text" v-model="form.name" name="name" id="name" placeholder="Name" required><br>
            <input type="text" v-model="form.code" name="slug" id="code" placeholder="Code"><br>
            <button :disabled="form.processing" type="submit">Submit</button>
        </form>
    </div>
</template>