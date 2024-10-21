<script setup>
import {computed, ref} from 'vue'
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
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
    requirements: props.invitation.requirements.map((requirement)=>{
        return { type: requirement.type, description: requirement.description}
    }),
    files: [{}]
});
const addRequirement = () => {
    form.requirements.push({description: '', type: ''});

};
const removeRequirement = (index) => {
    if (form.requirements.length > 1) {
        form.requirements.splice(index, 1);
    }
};
const deleteFile = async(index)=>{
    await axios.delete(route('convocatoria.deleteFile',{id:props.invitation.id, index}))
}
const handleFileChange = (event) => {
    form.files = event.target.files; // Asigna el archivo al modelo
}
//
// const excludeKeys = ['files', 'active', 'name', 'description', 'applications', 'suppliers'];
// const displayNames = {
//     name: 'Nombre',
//     quantity: 'Cuantia',
//     description: 'Descripcion',
//     date_start: 'Fecha Inicio',
//     date_finish: 'Fecha final',
// };
// const filteredObject = computed(() => {
//     return Object.keys(props.invitation)
//         .filter(key => !excludeKeys.includes(key))
//         .reduce((obj, key) => {
//             obj[key] = props.invitation[key];
//             return obj;
//         }, {});
//
// });
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
                    <!--                    <h2 class="text-2xl font-semibold mb-6">{{ invitation.name }}</h2>-->
                    <!--                    <p class="text-gray-500 mb-8">-->
                    <!--                        {{ invitation.description }}-->
                    <!--                    </p>-->
                    <!--                    <div class="grid grid-cols-3 gap-8">-->
                    <!--                    <div v-for="(filter,key) in filteredObject" :key="key" class="bg-white p-4 rounded-lg border border-gray-400 shadow-md">-->
                    <!--                        <div class="flex items-center mb-2">-->
                    <!--                            <svg class="w-6 h-6 text-blue" fill="currentColor" viewBox="0 0 24 24">-->
                    <!--                                <path-->
                    <!--                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>-->
                    <!--                            </svg>-->
                    <!--                            <p class="ml-2 text-gray-700">{{ displayNames[key] || key }}</p>-->
                    <!--                        </div>-->
                    <!--                        <p class="text-gray-500">{{ filter }}</p>-->

                    <!--                    </div>-->
                    <!--                    </div>-->
                    <!--                        <p class="font-bold text-lg mt-8">Documentos relacionados de la convocatoria</p>-->
                    <!--                    <div v-for="(file,index) in JSON.parse(invitation.files)" class="flex flex-cols">-->
                    <!--                        <a :href="'/storage/'+  file" target="_blank">Documento {{index+1}}</a>-->
                    <!--                    </div>-->

                    <form @submit.prevent="form.post(route('convocatoria.update', {id:props.invitation.id}))" enctype="multipart/form-data">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-1">
                                <h2 class="text-2xl font-semibold">Informacion Basica</h2>
                            </div>

                            <div class="col-span-2">

                                <div class="grid grid-cols-2 gap-6 mb-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700"
                                               for="first-name">Nombre</label>
                                        <input id="first-name" type="text" v-model="form.name"
                                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700" for="last-name">Fecha de
                                            inicio</label>
                                        <input id="last-name" type="date" v-model="form.date_start"
                                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                                    </div>
                                </div>

                                <!--                        <div class="mb-4">-->
                                <!--                            <label class="block text-sm font-medium text-gray-700" for="email">Email address</label>-->
                                <!--                            <input id="email" type="email"-->
                                <!--                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>-->
                                <!--                        </div>-->

                                <!--                        <div class="mb-4">-->
                                <!--                            <label class="block text-sm font-medium text-gray-700" for="country">Country</label>-->
                                <!--                            <select id="country"-->
                                <!--                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">-->
                                <!--                                <option>United States</option>-->
                                <!--                                &lt;!&ndash; Agrega más opciones según sea necesario &ndash;&gt;-->
                                <!--                            </select>-->
                                <!--                        </div>-->

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700" for="street-address">Fecha
                                        final</label>
                                    <input id="street-address" type="date" v-model="form.date_finish"
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                                </div>

                                <div class="grid grid-cols-3 gap-4 mb-4 items-center">
                                    <div> Activa:
                                        <label class=" text-sm font-medium text-gray-700" for="city">Si</label>
                                        <input class="mr-4" id="city" type="radio" v-model="form.active" value="1"
                                               />
                                        <label class=" text-sm font-medium text-gray-700" for="city">No</label>
                                        <input id="city" type="radio" v-model="form.active" value="0"
                                               class=""/>

                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700"
                                               for="state">Descripcion</label>
                                        <input id="state" type="text" v-model="form.description"
                                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700" for="zip">Cuantia</label>
                                        <input id="zip" type="number" v-model="form.quantity"
                                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="grid grid-cols-2 gap-6 mt-8 items-center">
                            <div class="col-span-1">
                                <h2 class="text-2xl font-semibold">Archivos solicitados</h2>
                                <p class="mt-2 text-sm text-gray-600">Documentos adicionales requeridos para la
                                    postulacion.</p>
                            </div>
                            <div>
                                <div v-for="(requirement, index) in form.requirements" :key="index" class="mb-2 ">
                                    <label for="type" class="text-sm font-medium text-gray-700">Tipo</label>
                                    <select id="type" v-model="form.requirements[index].type"
                                            class="px-3 py-2 mx-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <!--                                <option value="texto">Texto</option>-->
                                        <option value="archivo">Archivo</option>
                                        <!--                                <option value="numerico">Numerico</option>-->
                                    </select>

                                    <label for="requirementName" class="text-sm font-medium text-gray-700">Descripcion
                                        {{ index + 1 }}</label>
                                    <input

                                        v-model="form.requirements[index].description"
                                        type="text"
                                        id="requirementName"
                                        class="px-3 py-2 mx-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
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
                                  <a :href="'/storage/'+  file" target="_blank" class="text-blueFigma font-semibold">Documento {{ index + 1 }}</a>
                                    <button @click="deleteFile(index)" >Borrar</button>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label for="file">Adjuntar archivos</label>
                                <input type="file" id="file" accept="*/*" multiple @change="handleFileChange" >
                            </div>
                        </div>
                        <div class="flex justify-end ">
                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                                <Transition
                                    enter-active-class="transition ease-in-out"
                                    enter-from-class="opacity-0"
                                    leave-active-class="transition ease-in-out"
                                    leave-to-class="opacity-0"
                                >
                                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                                </Transition>
                            </div>
                        </div>
                    </form>
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
                        <tr v-for="(application,index) in invitation.postulations" class="border-b"  :key="index">

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
                            <td class="px-6 py-4">
                                <a href="#"
                                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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


