<script setup>
import {ref, computed} from 'vue'
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Link} from '@inertiajs/vue3';
import MainLayout from "@/Layouts/MainLayout.vue";

const selectedTab = ref('personal-info')
const props = defineProps({supplier: Object})

const excludeKeys = ['id', 'user_id', 'bank_certification', 'iso_9001', 'copy_doc_represent', 'rut'];
const displayNames = {
    name: 'Nombre',
    email: 'Correo Electrónico',
    phone: 'Teléfono',
    identification_number: 'Número de Identificación',
    company_name: 'Razon social',
    id_type: 'Tipo de Identificacion',
    person_type: 'Tipo de persona',
    comercial_name: 'Nombre comercial',
    regimen: 'regimen',
    retainer: 'retenefor',
    contributor: 'contribuidor',
    ica: 'ica',

};
const filteredObject = computed(() => {
    return Object.keys(props.supplier)
        .filter(key => !excludeKeys.includes(key))
        .reduce((obj, key) => {
            obj[key] = props.supplier[key];
            return obj;
        }, {});

});
console.log(filteredObject.value);
</script>
<template>
    <MainLayout>
        <div class=" h-screen w-full m-0 relative flex flex-col">
            <!-- Sidebar -->
            <div class=" bg-white px-4  center">
                <ul class=" flex justify-around ">
                    <li>
                        <button
                            @click="selectedTab = 'personal-info'"
                            :class="{'text-blue': selectedTab === 'personal-info'}"
                            class="text-left w-full mb-4 p-2 hover:text-blue font-semibold"
                        >
                            Informacion Personal
                        </button>
                    </li>
                    <li>
                        <button
                            @click="selectedTab = 'billing'"
                            :class="{'text-blue': selectedTab === 'billing'}"
                            class="text-left w-full mb-4 p-2 hover:text-blue font-semibold"
                        >
                            Documentos
                        </button>
                    </li>
                </ul>
            </div>


            <div class=" p-8 max-w-2/3">
                <h2 class="text-2xl font-semibold mb-6">Informacion Personal</h2>


                <div v-if="selectedTab === 'personal-info'"
                     class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <div v-for="(filter,key) in filteredObject" :key="key" class="bg-white p-4 rounded-lg shadow-md border border-gray-400">
                        <div class="flex items-center mb-2">
                            <svg class="w-6 h-6 text-blue" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                            <p class="ml-2 text-gray-700">{{ displayNames[key] || key }}</p>
                        </div>
                        <p class="text-gray-500">{{ filter }}</p>
                    </div>
                </div>

                <!-- You can add similar sections for Billing, Order History, and Gift Cards -->
                <div v-if="selectedTab === 'billing'">
                    <!-- Billing Content -->
                    <div class="flex flex-col text-blue font-bold">
                        <a :href="'/storage/' + supplier.rut" target="_blank">RUT</a>
                        <a :href="'/storage/' + supplier.bank_certification" target="_blank">Certificado Bancario</a>
                        <a :href="'/storage/' + supplier.copy_doc_represent" target="_blank">Copia del documento del
                            representante</a>
                        <a :href="'/storage/' + supplier.iso_9001" target="_blank">ISO 9001</a>


                    </div>
                </div>
                <div v-if="selectedTab === 'order-history'">
                    <!-- Order History Content -->
                    <p>Order History content goes here...</p>
                </div>
                <div v-if="selectedTab === 'gift-cards'">
                    <!-- Gift Cards Content -->
                    <p>Gift Cards content goes here...</p>
                </div>
            </div>
        </div>
    </MainLayout>
</template>


