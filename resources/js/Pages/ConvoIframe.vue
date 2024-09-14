<script setup>
// import MainLayout from "@/Layouts/MainLayout.vue";
import {computed, ref, watch} from 'vue'
import {useForm, usePage} from "@inertiajs/vue3";

const props = defineProps({invitations: Array});
const authenticated = computed(() => usePage().props.auth.user)

const form = useForm({
    invitation_id: '',
    payload: [],
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
<div class="overflow-hidden h-screen w-screen">
    <div class="py-8 px-12 w-screen">
        <input class="w-full rounded-3xl" type="text" placeholder="Buscar por empresa o referencia">
    </div>
    <div class="flex h-4/5 py-4 px-12 overflow-y-hidden">
        <!-- Sidebar con tarjetas -->
        <div class="w-2/5 overflow-y-auto mr-8">
            <div
                v-for="(invitation, index) in props.invitations"

                @click="selectItem(invitation)"
                :class="['p-4 mb-4 border-2 border-blueFigma  rounded-lg cursor-pointer', selectedItem && selectedItem.id === invitation.id ? 'border-blueFigma' : 'border-gray-300']"
            >
                <!--                    <p v-if="invitation.active" class="rounded-lg bg-blue opacity-75 text-white w-fit p-2">Activa</p>-->
                <h3 class="text-lg font-semibold">{{ invitation.name }}</h3>
                <h3 class="text-lg line-clamp-4">{{ invitation.description }}</h3>
                <div class="flex flex-col">
                    <div class="flex justify-around font-bold">
                        <h3>Fecha Inicio </h3>
                        <h3>Fecha Final </h3>
                    </div>
                    <div class="flex justify-around">
                        <h3>{{ invitation.date_start }} </h3>
                        <h3>{{ invitation.date_finish }}</h3>
                    </div>

                </div>
            </div>
        </div>

        <!-- Cuadro de descripción a la derecha -->
        <div class="w-2/3 p-6 border border-gray-400 rounded-2xl ">

            <div v-if="selectedItem">
                <p class="text-gray-700 mb-4">{{ selectedItem.description }}</p>

                <div class="flex gap-4 mx-auto">

                    <button class="bg-blueFigma text-white px-4 py-2 rounded-xl"><a
                        :href="route('convocatoriasIframe')">Ir a postularse</a>
                    </button>
                    <button @click="openModal"
                            class="bg-white text-blueFigma border border-blueFigma px-4 py-2 rounded-xl">Ver documentos
                    </button>
                </div>
                <div v-if="isModalOpen">
                    <ul>
                        <li v-for="file in JSON.parse(selectedItem.files)" class="text-blue font-semibold cursor-pointer" >
                            <a :href="'/storage/'+file"
                               target="_blank">{{ getFileName(file) }}</a>
                        </li>
                    </ul>
                </div>

            </div>
            <div v-else>
                <p class="text-gray-500">Selecciona una convocatoria para ver los detalles.</p>
            </div>


        </div>
    </div>
</div>
    <!--    </MainLayout>-->
</template>

