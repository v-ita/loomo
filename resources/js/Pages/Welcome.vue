<script setup>
import { Link, Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Welcome" />

    <div>
        <h1>Welcome</h1>
        <Link v-if="$page.props.auth.user" :href="route('logout')" method="post" as="button">Logout</Link>
    </div>
</template>
