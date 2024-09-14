<script setup>
import {computed, ref} from 'vue';
import {Link, usePage} from "@inertiajs/vue3";

import DropdownLink from "@/Components/DropdownLink.vue";
import Dropdown from "@/Components/Dropdown.vue";

const page = usePage();
const role = computed(() => page.props.auth.user.role_id)

const menuOpen = ref(false);

function toggleMenu() {
    menuOpen.value = !menuOpen.value;
}
</script>
<template>
    <div class="flex h-screen ">
        <!-- Sidebar -->
        <div :class="menuOpen ? 'w-36' : 'w-0'" class="bg-blue transition-all duration-300 overflow-hidden">
            <div class="h-1/2 p-4 text-white flex flex-col justify-around">
                <!-- Contenido del menú -->
                <div>
                    <Link :href="route('proveedores')">Proveedores</Link>
                </div>
                <div>
                    <Link :href="route('convocatorias')">Convocatorias</Link>
                </div>
                <div>
                    <Link :href="route('profile.edit')">Mi perfil</Link>
                </div>
                <div>
                    <Link :href="route('logout')" method="post" as="button">Cerrar Sesion</Link>
                </div>

            </div>
        </div>


        <!-- Main Content -->
        <div class="flex-1 transition-all duration-300 p-4">
            <!-- Botón de menú -->
            <div class="flex justify-between py-4 px-8">

                <button @click="toggleMenu" class="p-2 bg-blue-500 text-blue rounded">
                    ☰
                </button>
                <div class="flex flex-col justify-center items-center">
                <div class="font-bold text-2xl">¡Bienvenido! <br></div>
                <div class="text-xl">{{ page.props.auth.user.name }}</div>
                </div>
            </div>
            <!-- Contenido principal -->
            <slot></slot>

        </div>
    </div>
</template>


