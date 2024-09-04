<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import {ref} from 'vue'
import {usePage, Link} from "@inertiajs/vue3";

const props = defineProps({invitations: Array});
console.log(props);
const selectedItem = ref(null);
const isModalOpen = ref(false);
const selectItem = (invitation) => {
    selectedItem.value = invitation;
}
const openModal = (invitation) => {
    isModalOpen.value = true;
}
const closeModal = (invitation) => {
    isModalOpen.value = false;
}
const getFileName = (file) =>{
    const words = file.split('/');
    return words[words.length-1]

}
</script>

<template>
    <MainLayout>
        <div class="flex p-6 h-2/5">
            <!-- Sidebar con tarjetas -->
            <div class="w-2/3 h-2/5 pr-4 ">
                <div
                    v-for="invitation in props.invitations"
                    :key="invitation.id"
                    @click="selectItem(invitation)"
                    :class="['p-4 mb-4 border mr-8 rounded-lg cursor-pointer', selectedItem && selectedItem.id === invitation.id ? 'border-blue' : 'border-gray-900']"
                >
                    <h3 class="text-lg font-semibold">{{ invitation.name }}</h3>
                    <p class="text-gray-500">Referencia: {{ invitation.description }}</p>
                    <p class="text-gray-500">Fecha Fin: {{ invitation.date_finish }}</p>
                </div>
            </div>

            <!-- Cuadro de descripción a la derecha -->
            <div class="w-2/3 p-4 border-l-2 h-2/5 ">
                <div v-if="selectedItem">
                    <h2 class="text-2xl font-bold mb-4">{{ selectedItem.name }}</h2>
                    <p class="text-gray-700 mb-4">{{ selectedItem.description }}</p>
                    <p class="text-gray-700 mb-4">La convocatoria inicia en {{ selectedItem.date_start }} y finaliza en
                        {{ selectedItem.date_finish }}</p>

                    <p>Docmentos relacionados</p>
                    <div v-for="file in JSON.parse(selectedItem.files)">
                    <a :href="'/storage/'+file" target="_blank">{{getFileName(file)}}</a>
                    </div>
                    <div v-if="1===1">

                        <div v-for="requirement in selectedItem.requirements">

                            <label for="file">Cargar la siguiente informacion:
                                {{ requirement.description }}</label>
                            <input type="file">
                        </div>
                    </div>
                    <!-- Botones -->
                    <div class="flex gap-4">
                        <!--                    <button class="bg-blue text-white px-4 py-2 rounded">Postularse</button>-->
                        <button @click="openModal" class="bg-blue text-white px-4 py-2 rounded">Ver documentos</button>

                        <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                class="bg-gray-300 text-blue border-blue border-4 border-solid px-4 py-2 rounded">Ir a
                            postulacion
                        </button>


                    </div>
                    <div v-if="isModalOpen" class="fixed inset-0 flex items-center justify-center ">
                        <div class="bg-white p-6 rounded-lg shadow-xl max-w-2/3 ">
                            <h3 class="text-xl font-bold mb-4">Documentos requeridos</h3>
                            <p class="mb-4">Seria poner una lista de los documentos requeridos</p>
                            <div class="flex justify-end ">
                                <button @click="closeModal" class="bg-blue text-white px-4 py-2 rounded">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <p class="text-gray-500">Selecciona una convocatoria para ver los detalles.</p>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

