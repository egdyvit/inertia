<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link} from '@inertiajs/vue3';
</script>

<template>
    <Head title="Contactos" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Contactos</h2>

            <Link :href="route('contact.create')">Crear Contacto</Link>

            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
