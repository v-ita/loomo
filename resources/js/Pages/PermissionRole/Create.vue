<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    roles: Object,
    permissions: Object,
})

const form = useForm({
    role_id: '',
    permission_id: '',
});

const submit = () => {
    form.post(route('permission_role.store'));
};
</script>

<template>
    <div>
        <form @submit.prevent="submit">
            <select id="role_id" v-model="form.role_id" v-if="roles.length">
                <option :value="null" selected>
                    --- Select an option ---
                </option>
                <option v-for="role in roles" :key="role.id" :value="role.id" v-text="role.name" />
            </select><br>
            <select id="permission_id" v-model="form.permission_id" v-if="permissions.length">
                <option :value="null" selected>
                    --- Select an option ---
                </option>
                <option v-for="permission in permissions" :key="permission.id" :value="permission.id"
                    v-text="permission.name" />
            </select><br>
            <button :disabled="form.processing" type="submit">Submit</button>
        </form>
    </div>
</template>