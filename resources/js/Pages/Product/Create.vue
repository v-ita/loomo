<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    slug: '',
    description: '',
    quantity_stock: '',
});

const submit = () => {
    form.post(route('products.store'));
};
</script>

<template>
    <div>
        <form @submit.prevent="submit">
            <input type="text" v-model="form.name" name="name" id="name" placeholder="Name" required><br>
            <input type="text" v-model="form.slug" name="slug" id="slug" placeholder="Slug"><br>
            <textarea name="description" v-model="form.description" id="description" cols="30" rows="10"
                placeholder="Description"></textarea><br>
            <input type="number" v-model="form.quantity_stock" name="quantity_stock" id="quantity_stock"
                placeholder="Quantity stock" min="0"><br>
            <button :disabled="form.processing" type="submit">Submit</button>
        </form>
    </div>
</template>