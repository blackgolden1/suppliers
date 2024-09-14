<script setup>
import {computed, ref} from 'vue'
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from '@inertiajs/vue3';

const selectedTab = ref('personal-info')

const props = defineProps({invitation: Object});
console.log(props.invitation);

const excludeKeys = ['files', 'active', 'name', 'description','applications','suppliers'];
const displayNames = {
    name: 'Nombre',
    quantity: 'Cuantia',
    description: 'Descripcion',
    date_start: 'Fecha Inicio',
    date_finish: 'Fecha final',
};
const filteredObject = computed(() => {
    return Object.keys(props.invitation)
        .filter(key => !excludeKeys.includes(key))
        .reduce((obj, key) => {
            obj[key] = props.invitation[key];
            return obj;
        }, {});

});
</script>
<template>
    <MainLayout>
        <div class=" h-screen w-full m-0 relative flex flex-col">
            <!-- Sidebar -->
            <div class=" bg-white px-4 center">
                <ul class=" flex justify-around ">
                    <li>
                        <button
                            @click="selectedTab = 'personal-info'"
                            :class="{'text-blue': selectedTab === 'personal-info'}"
                            class="text-left w-full p-2 hover:text-blue font-semibold"
                        >
                            Personal information
                        </button>
                    </li>
                    <li>
                        <button
                            @click="selectedTab = 'billing'"
                            :class="{'text-blue': selectedTab === 'billing'}"
                            class="text-left w-full p-2 hover:text-blue font-semibold">
                            Postulaciones
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class=" p-8 max-w-2/3">

                <div v-if="selectedTab === 'personal-info'" class="">
                    <h2 class="text-2xl font-semibold mb-6">{{ invitation.name }}</h2>
                    <p class="text-gray-500 mb-8">
                        {{ invitation.description }}
                    </p>
                    <div class="grid grid-cols-3 gap-8">
                    <div v-for="(filter,key) in filteredObject" :key="key" class="bg-white p-4 rounded-lg border border-gray-400 shadow-md">
                        <div class="flex items-center mb-2">
                            <svg class="w-6 h-6 text-blue" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                            <p class="ml-2 text-gray-700">{{ displayNames[key] || key }}</p>
                        </div>
                        <p class="text-gray-500">{{ filter }}</p>

                    </div>
                    </div>
                        <p class="font-bold text-lg mt-8">Documentos relacionados de la convocatoria</p>
                    <div v-for="(file,index) in JSON.parse(invitation.files)" class="flex flex-cols">
                        <a :href="'/storage/'+  file" target="_blank">Documento {{index+1}}</a>
                    </div>
                </div>

                <!-- You can add similar sections for Billing, Order History, and Gift Cards -->
                <div v-if="selectedTab === 'billing'">
                    <!-- Billing Content -->
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col" class="px-6 py-3">
                                Proveedor
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Observaciones
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Documentos
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(application,index) in invitation.applications" class="border-b">

                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <Link :href="route('convocatoria.perfil', { id: invitation.id })"> {{ invitation.name }} </Link>
                            </th>
                            <td class="px-6 py-4">
                                {{ application.description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ application.status }}
                            </td>
                            <td class="px-6 py-4">
                                {{ application.description }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>

            <div>
            </div>
        </div>
    </MainLayout>
</template>


