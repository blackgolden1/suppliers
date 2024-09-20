<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import {ref, watch} from 'vue'

const props = defineProps({invitations: Array, errors: Object,});

let invitation_id = ref(0);
const actualInvitations = ref(props.invitations);
const payload = ref([]);

const isModalOpen = ref(false);
const successMessage = ref(null);
const errorMessage = ref(null);
const selectedItem = ref(null);

const selectItem = (invitation) => {
    selectedItem.value = invitation;
}

watch(() => selectedItem.value, (newSelectedItem) => {
    if (newSelectedItem) {
        invitation_id.value = newSelectedItem.id;
    }
});
watch(() => props.invitations.value, (newSelectedItem) => {
    if (newSelectedItem) {
        invitation_id.value = newSelectedItem.id;
    }
});
console.log(invitation_id.value)
const openModal = (invitation) => {
    isModalOpen.value = true;
}
const closeModal = (invitation) => {
    isModalOpen.value = false;
}
const getFileName = (file) => {
    const words = file.split('/');
    return words[words.length - 1]
}
const handleFileChange = (event, name) => {

    const selectedFiles = event.target.files[0];
    payload.value = [...payload.value, {name: name, file: selectedFiles}];

};
const submit = async () => {
    try {
        let formData = new FormData();

        formData.append('invitation_id', invitation_id.value);
        payload.value.forEach((file, index) => {
            formData.append(file.name, file.file);
        });
        const response = await axios.post('/apply-supplier', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })

    } catch (error) {
    }

};
const searchQuery = ref('');

const fetchInvitations = async (query) => {
    try {

        const response = await axios.get('/convocatorias-filter', {
            params: { name: query },
        });
        // Actualiza las convocatorias con las que devuelva la consulta
        actualInvitations.value = response.data;

    } catch (error) {
        console.error('Error fetching invitations:', error);
    }
};
const handleFilter = () => {

        fetchInvitations(searchQuery.value);

}
</script>

<template>
    <MainLayout>
        <div class="mb-4 px-6">
            <input @keyup.enter="handleFilter" v-model="searchQuery"
                class="w-full rounded-3xl" type="text" placeholder="Buscar por empresa o referencia">
        </div>

        <div class="flex h-4/5 px-6 overflow-y-hidden mt-8 space-x-12">
            <!-- Sidebar con tarjetas -->
            <div class="w-2/5  overflow-y-auto pr-4">
                <div
                    v-for="(invitation, index) in actualInvitations"

                    @click="selectItem(invitation)"
                    :class="['p-4 mb-4 border-2 rounded-lg cursor-pointer', selectedItem && selectedItem.id === invitation.id ? 'border-blueFigma' : 'border-gray-400']"
                >
                    <p v-if="invitation.active" class="rounded-3xl bg-lblue font-semibold text-black w-fit p-2 mb-4">
                        Activa</p>
                    <h3 class="text-lg font-semibold">{{ invitation.name }}</h3>
                    <p class="text-gray-500">Fecha Limite: {{ invitation.date_finish }}</p>
                </div>
            </div>

            <!-- Cuadro de descripción a la derecha -->
            <div class="w-2/3 p-4 border rounded-2xl h-full border-2 border-gray-400">
                <form @submit.prevent="submit">
                    <div v-if="selectedItem">
                        <h2 class="text-2xl font-bold mb-4">{{ selectedItem.name }}</h2>

                        <p class="text-gray-700 mb-4">{{ selectedItem.description }}</p>

                        <p class="font-bold">Para poder postularte, ten en cuenta la siguiente documentación </p>
                        <div v-for="file in JSON.parse(selectedItem.files)">
                            <a class="text-blue font-semibold cursor-pointer" :href="'/storage/'+file"
                               target="_blank">{{ getFileName(file) }}</a>
                        </div>
                        <div class="mb-4">
                            <div v-for="(requirement, index) in selectedItem.requirements">

                                <label for="file" class="mr-2">Cargar el documento:
                                    {{ requirement.description }}</label>

                                <input type="file" required
                                       @change="(event) => handleFileChange(event,requirement.description)">
                                <!--                                <file-pond allow-multiple="true" max-files="3" @input="form.payload = $event.target.files[0]" server="/api"  />-->
                            </div>
                        </div>
                        <!--                        <div v-if="isModalOpen"-->
                        <!--                             class="fixed inset-0 flex items-center justify-center bg-gray-200 bg-opacity-75">-->
                        <!--                            <div class="bg-white p-6 rounded-lg shadow-xl max-w-2/3 ">-->
                        <!--                                <h3 class="text-xl font-bold mb-4">Documentos Relacionados</h3>-->
                        <!--                                <div v-for="file in JSON.parse(selectedItem.files)">-->
                        <!--                                    <a class="text-blue font-semibold cursor-pointer" :href="'/storage/'+file"-->
                        <!--                                       target="_blank">{{ getFileName(file) }}</a>-->
                        <!--                                </div>-->
                        <!--                                <div class="flex justify-end ">-->
                        <!--                                    <button @click="closeModal" class="bg-blue text-white px-4 py-2 rounded mt-4">-->
                        <!--                                        Cerrar-->
                        <!--                                    </button>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </div>-->

                        <!-- Botones -->
                        <div class="flex gap-4">
                            <!--                    <button class="bg-blue text-white px-4 py-2 rounded">Postularse</button>-->
                            <!--                            <button @click="openModal" class="bg-blue text-white px-4 py-2 rounded">Ver documentos-->
                            <!--                            </button>-->

                            <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="submit"
                                    class="bg-blueFigma text-white px-4 py-2 rounded">Postularme
                            </button>

                            <div v-if="errors.Errores">
                                error
                            </div>
                        </div>

                    </div>
                    <div v-else>
                        <p class="text-gray-500">Selecciona una convocatoria para ver los detalles.</p>
                    </div>
                </form>

            </div>
        </div>
    </MainLayout>
</template>

