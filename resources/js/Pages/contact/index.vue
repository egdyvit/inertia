<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage} from '@inertiajs/vue3';

const page = usePage();
const contacts = page.props.contacts;

</script>



<template>
    <Head title="Contactos"/>

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
                    <div className="relative overflow-x-auto">
                            <table className="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <!-- Encabezados -->
                                <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                    <th scope="col" class="px-6 py-3">
                                        NOMBRE
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        TELEFONO
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        VISIBILIDAD
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        AVATAR
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        ACCIONES
                                    </th>
                                    </tr>
                                </thead>
                                <!-- Filas -->
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr v-for="contact in contacts" className="bg-white border-b dark:bg-gray-800">
                                    <td class="px-6 py-4 text-sm">{{ contact.name }}</td>
                                    <td class="px-6 py-4 text-sm">{{ contact.phone }}</td>
                                    <td class="px-6 py-4 text-sm">{{ contact.privacity }}</td>
                                    <td class="px-6 py-4 text-sm"><img class="h-16" :src="`/storage/${contact.avatar}`"/></td>
                                    <td class="px-6 py-4 text-sm">
                                        <div>
                                            <Link :href="route('contact.edit', contact)">
                                                Editar
                                            </Link>
                                        </div>
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
