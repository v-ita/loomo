<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    products: Object,
    carts: Object,
})

const form = useForm({
    product_id: '',
    cart_id: '',
    quantity: ''
});

const submit = () => {
    form.post(route('cart_items.store'));
};
</script>

<template>
    <div>
        <form @submit.prevent="submit">
            <select id="cart_id" v-model="form.cart_id">
                <option :value="null" selected>
                    --- Select an option ---
                </option>
                <option v-for="cart in carts" :key="cart.id" :value="cart.id" v-text="cart.id" />
            </select><br>
            <select id="product_id" v-model="form.product_id">
                <option :value="null" selected>
                    --- Select an option ---
                </option>
                <option v-for="product in products" :key="product.id" :value="product.id" v-text="product.name" />
            </select><br>
            <input type="number" v-model="form.quantity" name="quantity" id="quantity" placeholder="Quantity" min="1"><br>
            <button :disabled="form.processing" type="submit">Submit</button>
        </form>
    </div>
</template>