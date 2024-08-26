<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
const form = useForm({
    name: '',
    ciuu: '',
    phone: '',
    address:'',
    userId:''
});

const submit = () => {
    console.log("hola");
    form.post(route('supplier.create'), {
    });
};
</script>

<template>
    <Head title="Proveedores"/>

    <AuthenticatedLayout>

        <div class="max-w-4xl mx-auto p-8 bg-white rounded-lg shadow-md space-y-8">
            <!-- Sección 1 -->
            <form @submit.prevent="submit">
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-1">
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
                            <label class="block text-sm font-medium text-gray-700" for="street-address">Street
                                address</label>
                            <input id="street-address" type="text" v-model="form.phone"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="city">City</label>
                                <input id="city" type="text"  v-model="form.address"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="state">State /
                                    Province</label>
                                <input id="state" type="text"  v-model="form.userId"
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
<button type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>


    </AuthenticatedLayout>
</template>
