<script setup>
// import MainLayout from "@/Layouts/MainLayout.vue";
import {computed, ref, watch} from 'vue'
import {useForm, usePage} from "@inertiajs/vue3";

const props = defineProps({invitations: Array});
const authenticated = computed(() => usePage().props.auth.user)

const form = useForm({
    invitation_id:'',
    payload:[],
})
const isModalOpen = ref(false);

const selectedItem = ref(null);

const selectItem = (invitation) => {
    selectedItem.value = invitation;

}

watch(() => selectedItem.value, (newSelectedItem) => {
    if (newSelectedItem) {
        form.invitation_id = newSelectedItem.id;
    }
});

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
const submit = () => {
    console.log(form);
    form.post(route('supplier.apply'), {});
};
</script>

<template>
<!--    <MainLayout>-->
        <div class="flex h-4/5 p-6 overflow-y-hidden">
            <!-- Sidebar con tarjetas -->
            <div class="w-1/4 pr-4 overflow-y-auto ">
                <div
                    v-for="(invitation, index) in props.invitations"

                    @click="selectItem(invitation)"
                    :class="['p-4 mb-4 border mr-8 rounded-lg cursor-pointer', selectedItem && selectedItem.id === invitation.id ? 'border-blue' : 'border-gray-900']"
                >
                    <p v-if="invitation.active" class="rounded-lg bg-blue opacity-75 text-white w-fit p-2">Activa</p>
                    <h3 class="text-lg font-semibold">{{ invitation.name }}</h3>
                    <p class="text-gray-500">Fecha Limite: {{ invitation.date_finish }}</p>
                </div>
            </div>

            <!-- Cuadro de descripción a la derecha -->
            <div class="w-2/3 p-4 border ">
                <form @submit.prevent="submit">
                    <div v-if="selectedItem">
                        <h2 class="text-2xl font-bold mb-4">{{ selectedItem.name }}</h2>
                        <p class="text-gray-700 mb-4">La convocatoria inicia en {{ selectedItem.date_start }} y finaliza
                            en
                            {{ selectedItem.date_finish }}</p>
                        <p class="text-gray-700 mb-4">{{ selectedItem.description }}</p>

                        <p class="font-bold">Documentos relacionados:</p>

                        <div v-if="authenticated" class="mb-4">
                            <div v-for="(requirement, index) in selectedItem.requirements">

                                <label for="file" class="mr-2">Cargar el documento:
                                    {{ requirement.description }}</label>
                                <input type="file" required @input="form.payload = $event.target.files[0]">
                            </div>
                        </div>
                        <div v-if="isModalOpen"
                             class="fixed inset-0 flex items-center justify-center bg-gray-200 bg-opacity-75">
                            <div class="bg-white p-6 rounded-lg shadow-xl max-w-2/3 ">
                                <h3 class="text-xl font-bold mb-4">Documentos Relacionados</h3>
                                <div v-for="file in JSON.parse(selectedItem.files)">
                                    <a class="text-blue font-semibold cursor-pointer" :href="'/storage/'+file"
                                       target="_blank">{{ getFileName(file) }}</a>
                                </div>
                                <div class="flex justify-end ">
                                    <button @click="closeModal" class="bg-blue text-white px-4 py-2 rounded mt-4">
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="flex gap-4">
                            <!--                    <button class="bg-blue text-white px-4 py-2 rounded">Postularse</button>-->
                            <button @click="openModal" class="bg-blue text-white px-4 py-2 rounded">Ver documentos
                            </button>

                            <button v-if="authenticated" data-modal-target="default-modal" data-modal-toggle="default-modal" type="submit"
                                    class="bg-gray-300 text-blue border-blue border-4 border-solid px-4 py-2 rounded">Postularme
                            </button>
                            <button v-else
                                    class="bg-gray-300 text-blue border-blue border-4 border-solid px-4 py-2 rounded"><a
                                :href="route('convocatoriasIframe')">Postularme</a>
                            </button>


                        </div>

                    </div>
                    <div v-else>
                        <p class="text-gray-500">Selecciona una convocatoria para ver los detalles.</p>
                    </div>
                </form>

            </div>
        </div>
<!--    </MainLayout>-->
</template>

