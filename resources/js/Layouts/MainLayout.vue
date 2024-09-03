<script setup>
import {computed, ref} from 'vue';
import {Link, usePage} from "@inertiajs/vue3";

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
        <div :class="menuOpen ? 'w-64' : 'w-0'" class="bg-blue transition-all duration-300 overflow-hidden">
            <div class="h-full p-4 text-white">
                <!-- Contenido del menú -->
                <div  v-if="role== '2' || role== '3'" ><Link :href="route('proveedores')">Proveedores</Link> </div>
                <div ><Link :href="route('convocatorias')">Convocatorias </Link> </div>
                <div ><Link :href="route('convocatorias')">Mi perfil </Link> </div>
            </div>
        </div>

        <!-- Main Content -->
        <div  class="flex-1 transition-all duration-300 p-4">
            <!-- Botón de menú -->
            <div class="flex justify-between p-8">

                <button @click="toggleMenu" class="p-2 bg-blue-500 text-blue rounded">
                    ☰
                </button>
                <div>Bienvenidos</div>
            </div>
            <!-- Contenido principal -->
                <slot></slot>

        </div>
    </div>
</template>


