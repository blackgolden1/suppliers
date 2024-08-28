<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const file = ref(null);

const form = useForm({
    name: '',
    ciuu: '',
    phone: '',
    address: '',
    userId: ''
});
const docs = useForm({file:''})
const submit = () => {
    form.post(route('supplier.create'), {});
    docs.post(route('file.store'),{});
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
                        <h2 class="text-2xl font-semibold">Personal Information</h2>
                        <p class="mt-2 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>
                    </div>

                    <div class="col-span-2">

                        <div class="grid grid-cols-2 gap-6 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="first-name">First
                                    name</label>
                                <input id="first-name" type="text" v-model="form.name"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="last-name">Last name</label>
                                <input id="last-name" type="text" v-model="form.ciuu"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>
                        </div>
<!--                                                <div class="mb-4">-->
<!--                                                    <label class="block text-sm font-medium text-gray-700" for="email">Email address</label>-->
<!--                                                    <input id="email" type="email"-->
<!--                                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>-->
<!--                                                </div>-->

<!--                                                <div class="mb-4">-->
<!--                                                    <label class="block text-sm font-medium text-gray-700" for="country">Tipo de Identificacion</label>-->
<!--                                                    <select id="country"-->
<!--                                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">-->
<!--                                                        <option>Cedula</option>-->
<!--                                                        <option>NIT </option>-->
<!--                                                        &lt;!&ndash; Agrega más opciones según sea necesario &ndash;&gt;-->
<!--                                                    </select>-->
<!--                                                </div>-->

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700" for="street-address">Street
                                address</label>
                            <input id="street-address" type="text" v-model="form.phone"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="city">City</label>
                                <input id="city" type="text" v-model="form.address"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="state">State /
                                    Province</label>
                                <input id="state" type="text" v-model="form.userId"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="zip">ZIP / Postal
                                    code</label>
                                <input id="zip" type="text"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Sección 2 -->
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-1">
                        <h2 class="text-2xl font-semibold">Employment Information</h2>
                        <p class="mt-2 text-sm text-gray-600">Provide details about your current employment status.</p>
                    </div>

                    <div class="col-span-2">

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700" for="job-title">Job Title</label>
                            <input id="job-title" type="text"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700" for="company-name">Company
                                Name</label>
                            <input id="company-name" type="text"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                        </div>

                        <div class="grid grid-cols-2 gap-6 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="start-date">Start
                                    Date</label>
                                <input id="start-date" type="date"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="end-date">End Date</label>
                                <input id="end-date" type="date"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700" for="employment-status">Employment
                                Status</label>
                            <select id="employment-status"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option>Full-time</option>
                                <option>Part-time</option>
                                <option>Contract</option>
                                <option>Unemployed</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-1">
                        <h2 class="text-2xl font-semibold">Documentos Adjuntos</h2>
                        <p class="mt-2 text-sm text-gray-600">Provide details about your current employment status.</p>
                    </div>

                    <div class="col-span-1">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload
                            file</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="user_avatar_help" id="user_avatar" type="file" ref="file" @change="handleFileUpload">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile
                            picture is useful to confirm your are logged into your account
                        </div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload
                            file</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="user_avatar_help" id="user_avatar" type="file">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile
                            picture is useful to confirm your are logged into your account
                        </div>


                    </div>
                    <div class="col-span-1">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload
                            file</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="user_avatar_help" id="user_avatar" type="file">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile
                            picture is useful to confirm your are logged into your account
                        </div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload
                            file</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="user_avatar_help" id="user_avatar" type="file">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile
                            picture is useful to confirm your are logged into your account
                        </div>


                    </div>

                </div>

                <button type="submit">Enviar</button>

            </form>
        </div>


    </AuthenticatedLayout>
</template>
