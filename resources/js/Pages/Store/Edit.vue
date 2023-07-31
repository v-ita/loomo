<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    store: Object
})

const form = useForm({
    name: props.store.name,
    slug: props.store.slug,
});

const submit = () => {
    form.put(route('stores.update', {
        store: props.store.id
    }));
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