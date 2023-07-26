<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register.store'));
};
</script>

<template>
    <div>
        <form @submit.prevent="submit">
            <input type="text" v-model="form.name" name="name" id="name" placeholder="Name" required><br>
            <input type="text" v-model="form.first_name" name="first_name" id="first_name" placeholder="First name"><br>
            <input type="text" v-model="form.last_name" name="last_name" id="last_name" placeholder="Last name"><br>
            <input type="email" v-model="form.email" name="email" id="email" placeholder="Email"><br>
            <input type="password" v-model="form.password" name="password" id="password" placeholder="Password"
                required><br>
            <input type="password" v-model="form.password_confirmation" name="password_confirmation"
                id="password_confirmation" placeholder="Password confirmation" required><br>
            <button :disabled="form.processing" type="submit">Submit</button>
        </form>
    </div>
</template>