<script setup>
import {ref} from 'vue'
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link, useForm} from '@inertiajs/vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";

const selectedTab = ref('personal-info')

const props = defineProps({invitation: Object});
console.log(props.invitation);

const form = useForm({
    name: props.invitation.name,
    date_start: props.invitation.date_start,
    date_finish: props.invitation.date_finish,
    active: props.invitation.active,
    quantity: props.invitation.quantity,
    description: props.invitation.description,
    requirements: props.invitation.requirements.map((requirement) => {
        return {type: 'archivo', description: requirement.description}
    }),
    files: [{}]
});
const addRequirement = () => {
    form.requirements.push({description: '', type: 'archivo'});

};
const removeRequirement = (index) => {
    if (form.requirements.length > 1) {
        form.requirements.splice(index, 1);
    }
};
const deleteFile = async (index) => {
    await axios.delete(route('convocatoria.deleteFile', {id: props.invitation.id, index}))
}
const handleFileChange = (event) => {
    form.files = event.target.files;
}

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
                            Informacion Basica
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

                    <form @submit.prevent="form.post(route('convocatoria.update', {id:props.invitation.id}))"
                          enctype="multipart/form-data">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-1">
                                <h2 class="text-2xl font-semibold">Informacion Basica</h2>
                            </div>

                            <div class="col-span-2">
                                <div>
                                    <label class="block text-xxs font-medium text-gray-700"
                                           for="first-name">Nombre</label>
                                    <input id="first-name" type="text" v-model="form.name"
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xxs"/>
                                </div>
                                <div class="grid grid-cols-2 gap-6 mb-4">
                                    <div>
                                        <label class="block text-xxs font-medium text-gray-700" for="last-name">Fecha de
                                            inicio</label>
                                        <input id="last-name" type="datetime-local" v-model="form.date_start"
                                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xxs"/>
                                    </div>
                                    <div>
                                        <label class="block text-xxs font-medium text-gray-700" for="street-address">Fecha
                                            final</label>
                                        <input id="street-address" type="datetime-local" v-model="form.date_finish"
                                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xxs"/>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-xxs font-medium text-gray-700" for="state">Descripcion</label>
                                    <textarea id="state" v-model="form.description"
                                              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xxs"
                                              rows="6"></textarea>
                                </div>

                                <div class="grid grid-cols-2 gap-4 mb-4 items-center">
                                    <div> Activa:
                                        <label class=" text-xxs font-medium text-gray-700" for="city">Si</label>
                                        <input class="mr-4" id="city" type="radio" v-model="form.active" value="1"
                                        />
                                        <label class=" text-xxs font-medium text-gray-700" for="city">No</label>
                                        <input id="city" type="radio" v-model="form.active" value="0"
                                               class=""/>

                                    </div>



                                    <div>
                                        <label class="block text-xxs font-medium text-gray-700" for="zip">Cuantia</label>
                                        <input id="zip" type="number" v-model="form.quantity"
                                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xxs"/>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6 mt-8 items-center">
                            <div class="col-span-1">
                                <h2 class="text-2xl font-semibold">Archivos solicitados</h2>
                                <p class="mt-2 text-xxs text-gray-600">Documentos adicionales requeridos para la
                                    postulacion.</p>
                            </div>
                            <div>
                                <div v-for="(requirement, index) in form.requirements" :key="index" class="mb-2 ">

                                    <label for="requirementName" class="text-xxs font-medium text-gray-700">Descripcion
                                        {{ index + 1 }}</label>
                                    <input

                                        v-model="form.requirements[index].description"
                                        type="text"
                                        id="requirementName"
                                        class="px-3 py-2 mx-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xxs"
                                        placeholder="Nombre del archivo"
                                    />

                                    <button type="button" @click="removeRequirement(index)"
                                            class="bg-white text-blueFigma border border-blueFigma font-bold px-2 rounded-lg text-lg py-1 ml-4">
                                        -
                                    </button>
                                    <button type="button" @click="addRequirement"
                                            class="bg-blueFigma text-white px-2 rounded-lg text-lg py-1 ml-4">+
                                    </button>
                                </div>


                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-6 mt-8 items-center ">
                            <div class="col-span-1">
                                <h2 class="text-2xl font-semibold">Archivos Adjuntos</h2>

                                <div v-for="(file,index) in invitation.files" class="flex flex-cols">-->
                                    <a :href="'/storage/'+  file" target="_blank" class="text-blueFigma font-semibold">Documento
                                        {{ index + 1 }}</a>
                                    <button @click="deleteFile(index)">Borrar</button>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label for="file">Adjuntar archivo</label>
                                <input type="file" id="file" accept="*/*" multiple @change="handleFileChange">
                            </div>
                        </div>
                        <div class="flex justify-end ">
                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Guardar cambios</PrimaryButton>

                                <Transition
                                    enter-active-class="transition ease-in-out"
                                    enter-from-class="opacity-0"
                                    leave-active-class="transition ease-in-out"
                                    leave-to-class="opacity-0"
                                >
                                    <p v-if="form.recentlySuccessful" class="text-xxs text-gray-600">Guardado</p>
                                </Transition>
                            </div>
                        </div>
                    </form>
                </div>

                <div v-if="selectedTab === 'billing'">
                    <!-- Billing Content -->
                    <table class="w-full text-xxs text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xxs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                        <tr v-for="(application,index) in invitation.postulations" class="border-b" :key="index">

                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <Link :href="route('proveedor.perfil', { id: invitation.suppliers[index].id })">
                                    {{ invitation.suppliers[index].name }}
                                </Link>
                            </th>
                            <td class="px-6 py-4">
                                {{ application.status }}
                            </td>
                            <td v-show="application.description !== null" class="px-6 py-4">
                                {{ application.description }}
                            </td>
                            <td v-show="application.description === null" class="px-6 py-4">
                                Sin observaciones
                            </td>
                            <td class="px-6 py-4">
                                <div v-for="(file, fIndex) in JSON.parse(application.payload)" :key="fIndex">
                                    <!-- Emparejamos los archivos con los requerimientos -->
                                    <div v-if="invitation.requirements[fIndex]">
                                        {{ invitation.requirements[fIndex].description }}:
                                        <a :href="'/storage/' + file" target="_blank">
                                            {{ file.split('/').pop() }} <!-- Mostrar el nombre del archivo -->
                                        </a>
                                    </div>
                                </div>
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


