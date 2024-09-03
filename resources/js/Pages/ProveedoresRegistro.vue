<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import {ref} from 'vue';
import {Inertia} from '@inertiajs/inertia';

const file = ref(null);

const form = useForm({
    name: '',
    ciuu: '',
    phone: '',
    address: '',
    userId: ''
});
const categories = ref([
    'Académicas: Asesorías Académicas',
    'Accesorios y Materiales de Reparación de Equipos',
    'Aseo y Cafetería',
    'Base de Datos',
    'Construcción y Adecuación de Ambientes Escolares',
    'Contratación de Servicios',
    'Dotaciones',
    'Elementos de Robótica',
    'Equipos de Cómputo',
    'Equipos de Comunicaciones - Audiovisuales',
    'Equipos de Piscina',
]);
const selectedCategories = ref([]);
const docs = useForm({file: ''})
const submit = () => {
    form.post(route('supplier.create'), {});
    docs.post(route('file.store'), {});
};

const handleFileUpload = (event) => {
    file.value = event.target.files[0];
    console.log(file.value);
};
</script>

<template>
    <Head title="Registro Proveedores"/>

    <AuthenticatedLayout>

        <div class="w-fit mx-auto flex justify-center items-center p-8 bg-white rounded-lg shadow-md space-y-8">
            <!-- Sección 1 -->
            <form @submit.prevent="submit">
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-1 mr-20">
                        <h2 class="text-2xl font-semibold">Informacion Basica</h2>
                    </div>

                    <div class="col-span-2">

                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="first-name">Nombre completo</label>
                                <input id="last-name" type="text" v-model="form.ciuu"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="first-name">Tipo de
                                    Identificacion</label>
                                <select id="first-name" v-model="form.name"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option>Cedula</option>
                                    <option>NIT</option>
                                    <option>RUT</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="last-name" >Numero de
                                    identificacion</label>
                                <input id="last-name" type="number" v-model="form.ciuu"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-6 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="first-name">Tipo persona</label>
                                <select id="first-name" v-model="form.name"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option>Cedula</option>
                                    <option>NIT</option>
                                    <option>RUT</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="last-name" >Razon Social</label>
                                <input id="last-name" type="number" v-model="form.ciuu"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="zip">Nombre Comercial
                                   </label>
                                <input id="zip" type="text"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="city">Email</label>
                                <input id="city" type="text" v-model="form.address"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="state">Pagina web</label>
                                <input id="state" type="text" v-model="form.userId"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>


                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="zip">Regimen
                                </label>
                                <input id="zip" type="text"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="city">Auto Retenedor</label>
                                <input id="city" type="text" v-model="form.address"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="state">Gran contribuyente</label>
                                <input id="state" type="text" v-model="form.userId"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="zip">Contribuyente de Ica
                                </label>
                                <input id="zip" type="text"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="city">Telefono</label>
                                <input id="city" type="text" v-model="form.address"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="state">mas? menos?</label>
                                <input id="state" type="text" v-model="form.userId"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Sección 2 -->
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-1">
                        <h2 class="text-2xl font-semibold">Productos y servicios</h2>
                    </div>
                    <div class="col-span-2">

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700" for="job-title">Job Title</label>
                            <select name="" multiple id="categories"
                                    v-model="selectedCategories">
                                <option
                                    v-for="category in categories"
                                    :key="category"
                                    :value="category"
                                >
                                    {{ category }}
                                </option>
                            </select>
                            <div class="mt-4">
                                <h3>Categorías seleccionadas:</h3>
                                <ul>
                                    <li v-for="(category, index) in selectedCategories" :key="index">
                                        {{ category }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección 3 -->
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-1">
                        <h2 class="text-2xl font-semibold">Documentos Adjuntos</h2>
                    </div>

                    <div class="col-span-1">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">RUT</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="user_avatar_help" id="user_avatar" type="file" ref="file"
                            @change="handleFileUpload">

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Certificacion Bancaria</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="user_avatar_help" id="user_avatar" type="file">
                    </div>
                    <div class="col-span-1">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Copia documento representante legal</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="user_avatar_help" id="user_avatar" type="file">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Calidad ISO 9001</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="user_avatar_help" id="user_avatar" type="file">
                    </div>



                </div>

                <button class="bg-blue text-white p-4 rounded-lg mt-4 flex" type="submit">Enviar</button>

            </form>
        </div>


    </AuthenticatedLayout>
</template>
