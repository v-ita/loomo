<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    product: Object,
    categories: Object,
    stores: Object,
})

const form = useForm({
    store_id: props.product.store_id,
    category_id: props.product.category_id,
    name: props.product.name,
    slug: props.product.slug,
    description: props.product.description,
    quantity_stock: props.product.quantity_stock,
});

const submit = () => {
    form.put(route('products.update', { product: props.product.id }));
};
</script>

<template>
    <div>
        <form @submit.prevent="submit">
            <input type="text" v-model="form.name" name="name" id="name" placeholder="Name"><br>
            <input type="text" v-model="form.slug" name="slug" id="slug" placeholder="Slug"><br>
            <textarea name="description" v-model="form.description" id="description" cols="30" rows="10"
                placeholder="Description"></textarea><br>
            <input type="number" v-model="form.quantity_stock" name="quantity_stock" id="quantity_stock"
                placeholder="Quantity stock" min="0"><br>
            <select id="category_id" v-model="form.category_id" v-if="categories.length">
                <option :value="null" selected>
                    --- Select an option [category] ---
                </option>
                <option v-for="category in categories" :key="category.id" :value="category.id" v-text="category.name" />
            </select><br>
            <select id="store_id" v-model="form.store_id" v-if="stores.length">
                <option :value="null" selected>
                    --- Select an option [store] ---
                </option>
                <option v-for="store in stores" :key="store.id" :value="store.id" v-text="store.name" />
            </select><br>
            <button :disabled="form.processing" type="submit">Submit</button>
        </form>
    </div>
</template>