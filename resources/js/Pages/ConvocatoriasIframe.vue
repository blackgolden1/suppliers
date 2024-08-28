<script>
export default {
    data() {
        return {
            items: [
                {
                    id: 1,
                    title: "Ministerio de comercio",
                    referencia: "4456214",
                    fechaFin: "12/Oct/2024",
                    description: "Análisis de impacto normativo para establecimientos nacionales de dispositivos médicos que elaboran y adaptan ortopédicos a medida."
                },
                {
                    id: 2,
                    title: "Comfenalco",
                    referencia: "968462",
                    fechaFin: "15/Oct/2024",
                    description: "Prestación del servicio de conectividad para el sistema de video de vigilancia."
                },
                {
                    id: 3,
                    title: "Bancolombia",
                    referencia: "665842",
                    fechaFin: "19/Oct/2024",
                    description: "Convocatoria para la adquisición de información/consultas de antecedentes."
                },
                {
                    id: 4,
                    title: "Tolima Travel",
                    referencia: "886544",
                    fechaFin: "23/Oct/2024",
                    description: "Prestación del servicio de conectividad para el sistema de video de vigilancia."
                },
                {
                    id: 5,
                    title: "Comfenalco",
                    referencia: "968462",
                    fechaFin: "15/Oct/2024",
                    description: "Prestación del servicio de conectividad para el sistema de video de vigilancia."
                },
                {
                    id: 6,
                    title: "Bancolombia",
                    referencia: "665842",
                    fechaFin: "19/Oct/2024",
                    description: "Convocatoria para la adquisición de información/consultas de antecedentes."
                },
                {
                    id: 7,
                    title: "Tolima Travel",
                    referencia: "886544",
                    fechaFin: "23/Oct/2024",
                    description: "Prestación del servicio de conectividad para el sistema de video de vigilancia."
                }
            ],
            selectedItem: null,
            isModalOpen: false,
        };
    },
    methods: {
        selectItem(item) {
            this.selectedItem = item;
        },openModal() {
            this.isModalOpen = true;
        },
        closeModal() {
            this.isModalOpen = false;
        }
    }
};
</script>

<template>
    <div class="flex p-6 h-2/5 overflow-hidden">
        <!-- Sidebar con tarjetas -->
        <div class="w-2/3 h-2/5 pr-4 ">
            <div
                v-for="item in items"
                :key="item.id"
                @click="selectItem(item)"
                :class="['p-4 mb-4 border mr-8 rounded-lg cursor-pointer', selectedItem && selectedItem.id === item.id ? 'border-blue' : 'border-gray-900']"
            >
                <h3 class="text-lg font-semibold">{{ item.title }}</h3>
                <p class="text-gray-500">Referencia: {{ item.referencia }}</p>
                <p class="text-gray-500">Fecha Fin: {{ item.fechaFin }}</p>
            </div>
        </div>

        <!-- Cuadro de descripción a la derecha -->
        <div class="w-2/3 p-4 border-l-2 h-2/5 ">
            <div v-if="selectedItem">
                <h2 class="text-2xl font-bold mb-4">{{ selectedItem.title }}</h2>
                <p class="text-gray-700 mb-4">{{ selectedItem.description }}</p>

                <!-- Botones -->
                <div class="flex gap-4">
<!--                    <button class="bg-blue text-white px-4 py-2 rounded">Postularse</button>-->
                    <button @click="openModal" class="bg-blue text-white px-4 py-2 rounded">Ver documentos</button>

                    <button data-modal-target="default-modal" data-modal-toggle="default-modal"  class="bg-gray-300 text-blue border-blue border-4 border-solid px-4 py-2 rounded">Ir a postulacion</button>


                </div>
                <div v-if="isModalOpen" class="fixed inset-0 flex items-center justify-center ">
                    <div class="bg-white p-6 rounded-lg shadow-xl max-w-2/3 ">
                        <h3 class="text-xl font-bold mb-4">Documentos requeridos</h3>
                        <p class="mb-4">Seria poner una lista de los documentos requeridos</p>
                        <div class="flex justify-end ">
                            <button @click="closeModal" class="bg-blue text-white px-4 py-2 rounded">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <p class="text-gray-500">Selecciona una convocatoria para ver los detalles.</p>
            </div>
        </div>
    </div>
</template>

