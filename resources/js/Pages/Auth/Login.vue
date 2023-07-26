<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: '',
});

const submit = () => {
    form.post(route('login.store'));
};
</script>

<template>
    <div>
        <form @submit.prevent="submit">
            <input type="email" v-model="form.email" name="email" id="email" placeholder="Email"><br>
            <input type="password" v-model="form.password" name="password" id="password" placeholder="Password"
                required><br>
            <button :disabled="form.processing" type="submit">Submit</button>
        </form>
    </div>
</template>