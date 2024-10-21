<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import {ref, watch} from 'vue'

const props = defineProps({postulations: Array, errors: Object,});
console.log(props.postulations)
const selectedInvitation = null;

const formatDate = (dateString) => {
    const options = {year: 'numeric', month: 'long', day: 'numeric'};
    return new Date(dateString).toLocaleDateString(undefined, options);
};
const getFileName = (file) => {
    const words = file.split('/');
    return words[words.length - 1]
}
</script>

<template>
    <MainLayout>
        <div class="flex justify-center align-baseline">
            <div v-if="props.postulations.length > 0" class=" px-16 pt-4">
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-blueFigma text-white text-center">
                    <tr>
                        <th class="p-4 text-center">Radicado</th>
                        <th class="p-4 text-center">Estado</th>
                        <th class="p-4 text-center">Fecha de Postulacion</th>
                        <th class="p-4 text-center">Convocatoria</th>
                        <th class="p-4 text-center">Fecha de Inicio</th>
                        <th class="p-4 text-center">Fecha de Cierre</th>
                        <th class="p-4 text-center">Activa</th>
                        <th class="p-4 text-center">Documentos Subidos</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr
                        v-for="postulation in postulations"
                        :key="postulation.id"
                        class="border-b border-gray-200 hover:bg-gray-100 transition-colors"
                    >
                        <td class="p-4 text-center">{{ postulation.radicado }}</td>
                        <td class="p-4">
            <span
                :class="{
                'bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-semibold': postulation.status === 'accepted',
                'bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-semibold': postulation.status === 'pending',
                'bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-semibold': postulation.status === 'rejected',
              }"
            >
              {{ postulation.status }}
            </span>
                        </td>
                        <td class="p-4">{{ formatDate(postulation.created_at) }}</td>
                        <td class="p-4">{{ postulation.invitations.name }}</td>
                        <td class="p-4">{{ formatDate(postulation.invitations.date_start) }}</td>
                        <td class="p-4">{{ formatDate(postulation.invitations.date_finish) }}</td>
                        <td class="p-4 text-center">
            <span
                :class="{
                'bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-semibold': postulation.invitations.active,
                'bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-semibold': !postulation.invitations.active,
              }"
            >
              {{ postulation.invitations.active ? 'Si' : 'No' }}
            </span>
                        </td>
                        <td class="text-center">
                            <div v-for="file in JSON.parse(postulation.payload)">
                                <a class="text-blue font-semibold cursor-pointer" :href="'/storage/'+file"
                                   target="_blank">{{ getFileName(file) }}</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div v-else class="flex flex-col items-center justify-center py-10 bg-gray-50 rounded-lg shadow-md w-1/2">
                <svg class="w-16 h-16 text-blueFigma mb-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 12l2 2 4-4"></path>
                    <path d="M21 12a9 9 0 1 0-9 9 9 9 0 0 0 9-9z"></path>
                </svg>
                <p class="text-lg font-semibold text-gray-700 mb-2">Aún no tienes postulaciones</p>
                <p class="text-gray-500 mb-4">Dirígete a convocatorias para postularte y participar.</p>
                <a href="/convocatorias"
                   class="bg-blueFigma text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600 transition-colors">
                    Ver Convocatorias
                </a></div>
        </div>
    </MainLayout>
</template>

