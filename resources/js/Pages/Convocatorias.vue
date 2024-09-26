<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, usePage, Link} from '@inertiajs/vue3';
import Postularse from "@/Layouts/MainLayout.vue";
const props = defineProps({invitations: Array});
const active = props.invitations.active;
const page = usePage();

const role = page.props.auth.user.role_id;
</script>

<template>
    <Head title="Convocatorias"/>

<!--    <AuthenticatedLayout>-->
<Postularse>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full center px-16 py-4">
            <table class="w-full text-sm rounded-lg text-left rtl:text-right text-gray-500 rounded-lg">
                <thead class=" rounded-lg text-sm text-white uppercase bg-blueFigma text-center opacity-100 dark:text-gray-400 w-full">
                <tr>
                    <th scope="col" class="px-6 py-3 w-1/5 text-center">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 w-12 text-center">
                        Fecha Inicio
                    </th>
                    <th scope="col" class="px-6 py-3 w-12 text-center">
                        Fecha Final
                    </th>
                    <th scope="col" class="px-6 py-3 w-full text-center">
                        Descripcion
                    </th>
                    <th scope="col" class="px-6 py-3 w-full text-center">
                    </th>
                    <th scope="col" class="px-6 py-3 w-full text-center">
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="invitation in invitations" class="border-b"
                    :class="[ invitation.active ? 'bg-gray-100': '']"
                >
                    <th scope="row" class="px-6 py-4 whitespace-pre-wrap font-medium text-gray-900 dark:text-white">
                        <Link :href="route('convocatoria.perfil', { id: invitation.id })"> {{ invitation.name }} </Link>
                    </th>
                    <td class="px-6 py-4">
                        {{ invitation.date_start }}
                    </td>
                    <td class="px-6 py-4 ">
                        {{ invitation.date_finish }}
                    </td>
                    <td class="px-6 py-4">
                        {{ invitation.description }}
                    </td>
                    <td class="px-6 py-4 w-fit" >
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                    </td>
                    <td class="px-6 py-4 w-fit" >
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Eliminar</a>
                    </td>
                </tr>

                </tbody>
            </table>
<!--            <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4"-->
<!--                 aria-label="Table navigation">-->
<!--                <span-->
<!--                    class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing <span-->
<!--                    class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span-->
<!--                    class="font-semibold text-gray-900 dark:text-white">1000</span></span>-->
<!--                <ul class="inline-flex text-sm h-8">-->
<!--                    <li>-->
<!--                        <a href="#"-->
<!--                           class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#"-->
<!--                           class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#"-->
<!--                           class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#" aria-current="page"-->
<!--                           class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#"-->
<!--                           class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#"-->
<!--                           class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#"-->
<!--                           class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </nav>-->
            <div class="bg-blue text-white rounded-lg w-fit p-3 mt-4">
                <Link :href="route('registerInvitation')"> Nueva + </Link>
            </div>
        </div>
</Postularse>
<!--    </AuthenticatedLayout>-->
</template>
