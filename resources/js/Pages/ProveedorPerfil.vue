<script setup>
import { ref } from 'vue'
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
const selectedTab = ref('personal-info')
const props = defineProps({supplier:Object})
console.log(props.supplier);
</script>
<template>
    <MainLayout>
    <div class=" h-screen w-full m-0 relative flex flex-col">
        <!-- Sidebar -->
        <div class=" bg-white p-8 center">
            <ul class=" flex justify-between ">
                <li>
                    <button
                        @click="selectedTab = 'personal-info'"
                        :class="{'text-blue': selectedTab === 'personal-info'}"
                        class="text-left w-full mb-4 p-2 hover:text-blue"
                    >
                        Informacion Personal
                    </button>
                </li>
                <li>
                    <button
                        @click="selectedTab = 'billing'"
                        :class="{'text-blue': selectedTab === 'billing'}"
                        class="text-left w-full mb-4 p-2 hover:text-blue"
                    >
                        Billing & Payments
                    </button>
                </li>
                <li>
                    <button
                        @click="selectedTab = 'order-history'"
                        :class="{'text-blue': selectedTab === 'order-history'}"
                        class="text-left w-full mb-4 p-2 hover:text-blue"
                    >
                        Order History
                    </button>
                </li>
                <li>
                    <button
                        @click="selectedTab = 'gift-cards'"
                        :class="{'text-blue': selectedTab === 'gift-cards'}"
                        class="text-left w-full mb-4 p-2 hover:text-blue"
                    >
                        Gift Cards
                    </button>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class=" p-8 max-w-2/3">
            <h2 class="text-2xl font-semibold mb-6">Personal information</h2>
            <p class="text-gray-500 mb-8">
                Manage your personal information, including phone numbers and email
                address where you can be contacted.
            </p>

            <div v-if="selectedTab === 'personal-info'" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="flex items-center mb-2">
                        <svg class="w-6 h-6 text-blue" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                        <p class="ml-2 text-gray-700">Name</p>
                    </div>
                    <p class="text-gray-500">{{supplier.name}}</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="flex items-center mb-2">
                        <svg class="w-6 h-6 text-blue" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 12c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zm0-2c2.76 0 5 2.24 5 5 0 1.48-.62 2.8-1.61 3.74L16 18.94V22h-2v-3.06l-3.39-3.2A4.997 4.997 0 0111 15c0-2.76 2.24-5 5-5zm-4 2V5h-2v7h-2v2h2v5h2v-5h2v-2h-2z" />
                        </svg>
                        <p class="ml-2 text-gray-700">Date of Birth</p>
                    </div>
                    <p class="text-gray-500">07 July 1993</p>
                </div>
                <!-- Add more cards as necessary -->
            </div>

            <!-- You can add similar sections for Billing, Order History, and Gift Cards -->
            <div v-if="selectedTab === 'billing'">
                <!-- Billing Content -->
                <p>Billing & Payments content goes here...</p>
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


