<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import Postularse from "@/Layouts/MainLayout.vue";
import 'filepond/dist/filepond.min.css';
import {ref} from "vue";

import vueFilePond from 'vue-filepond';

// Import plugins
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

// Import styles
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';

// Create FilePond component
const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginImagePreview);
const previews = ref([]);

const handleFilePondUpdateFile = (files) => {
    const map = files.map(files => files.file)
    console.log(map);
}
const form = useForm({
    name: '',
    date_start: '',
    date_finish: '',
    active: '',
    quantity: '',
    description: '',
    requirements: [{description: '', type: 'archivo'}],
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


const handleFileChange = (event) => {

    form.files = event.target.files;
    previews.value = [];

    for (const file of form.files) {
        const reader = new FileReader();

        reader.onload = (e) => {
            const base64Str = e.target.result.split(',')[1];
            previews.value.push({
                base64: base64Str,
                name: file.name,
                type: file.type,
            });
        };
        reader.readAsDataURL(file);
    }
}
const base64ToArrayBuffer = (base64Str) => {
    const binaryString = window.atob(base64Str);
    const binaryLen = binaryString.length;
    const bytes = new Uint8Array(binaryLen);

    for (let i = 0; i < binaryLen; i++) {
        bytes[i] = binaryString.charCodeAt(i);
    }

    return bytes;
};

const showDocument = (base64Str, contentType) => {
    const byteArray = base64ToArrayBuffer(base64Str);
    const blob = new Blob([byteArray], {type: contentType});
    const url = URL.createObjectURL(blob);

    window.open(url, '_blank');
};
const submit = () => {
    console.log(form);
    form.post(route('invitation.create'), {
        onSuccess: () => {
            window.location.href = route('convocatorias');
        }
    });
};

</script>

<template>
    <Head title="Convocatorias"/>

    <Postularse>

        <div class="w-scren mx-32 px-8 py-8  bg-white rounded-lg border border-blueFigma shadow-2xl space-y-8">
            <!-- Sección 1 -->
            <form @submit.prevent="submit">
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-1">
                        <h2 class="text-2xl font-semibold">Informacion Basica</h2>
                    </div>

                    <div class="col-span-2">

                        <div class="mb-4">
                            <div class="mb-4">
                                <label class="block text-xxs font-medium text-gray-700" for="name">Nombre</label>
                                <input id="name" type="text" v-model="form.name" required
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none
               focus:ring-indigo-500 focus:border-indigo-500 sm:text-xxs"/>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xxs font-medium text-gray-700" for="date-start">Fecha de
                                        inicio</label>
                                    <input id="date-start" type="datetime-local" v-model="form.date_start" required
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none
                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-xxs"/>
                                </div>

                                <div>
                                    <label class="block text-xxs font-medium text-gray-700" for="date-finish">Fecha
                                        final</label>
                                    <input id="date-finish" type="datetime-local" v-model="form.date_finish" required
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none
                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-xxs"/>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-xxs font-medium text-gray-700" for="state">Descripcion</label>
                            <input type="text" id="state"  v-model="form.description" required
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none
                                      focus:ring-indigo-500 focus:border-indigo-500 sm:text-xxs">
<!--                            <textarea id="state" type="textarea" v-model="form.description" required-->
<!--                                      class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none -->
<!--                                      focus:ring-indigo-500 focus:border-indigo-500 sm:text-xxs"> </textarea>-->
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4 items-center">
                            <div> Activa:
                                <label class=" text-xxs font-medium text-gray-700" for="city">Si</label>
                                <input class="mr-4" id="city" type="radio" v-model="form.active" value="1" required/>
                                <label class=" text-xxs font-medium text-gray-700" for="city">No</label>
                                <input id="city" type="radio" v-model="form.active" value="0" required
                                       class=""/>

                            </div>
                            <div>
                                <label class="block text-xxs font-medium text-gray-700" for="zip">Cuantia</label>
                                <input id="zip" type="number" v-model="form.quantity" required
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xxs"/>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6 mt-8 items-center ">
                    <div class="col-span-1">
                        <h2 class="text-2xl font-semibold">Adjuntar archivos</h2>
                        <p class="mt-2 text-xxs text-gray-600">Documentos de informacion sobre la postulacion.</p>
                    </div>
                    <div class="col-span-1">
                        <label for="file">Adjuntar archivo</label>
                        <input type="file" id="file" accept="*/*" multiple @change="handleFileChange" required>
                        <!--                                                <FilePond allowMultiple="true" ref="pond" v-on:updatefiles="handleFilePondUpdateFile" />-->

                        <!-- Previsualización de las imágenes seleccionadas -->
                        <!--                        <div v-if="previews.length">-->
                        <!--                            <h3>Previsualización:</h3>-->
                        <!--                            <div v-for="(file, index) in previews" :key="index" class="preview-container">-->
                        <!--                                <img v-if="file.type.startsWith('image/')" :src="file.url" alt="Previsualización de imagen" class="preview-image" />-->
                        <!--                                <iframe v-if="file.type === 'application/pdf'" :src="file.url" class="preview-pdf">{{file.url}}</iframe>-->
                        <!--                            </div>-->
                        <!--                        </div>-->

                        <div v-if="previews.length">
                            <h3>Archivos seleccionados:</h3>
                            <div v-for="(file, index) in previews" :key="index" class="preview-container">
                                <!-- Mostrar nombre de cualquier archivo y abrir en nueva pestaña al hacer clic -->
                                <a class="text-blueFigma font-semibold" href="#"
                                   @click.prevent="showDocument(file.base64, file.type)">{{ file.name }}</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6 mt-8 items-center">
                    <div class="col-span-1">
                        <h2 class="text-2xl font-semibold">Solicitar archivos</h2>
                        <p class="mt-2 text-xxs text-gray-600">Solicite documentos adicionales requeridos para la
                            postulacion.</p>
                    </div>
                    <div>
                        <div v-for="(requirement, index) in form.requirements" :key="index" class="mb-2 ">

                            <label for="requirementName" class="text-xxs font-medium text-gray-700">Descripcion
                                {{ index + 1 }}</label>
                            <input
                                required
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
                <div class="flex justify-end ">
                    <button class="bg-blueFigma text-white rounded-lg px-8 py-2 mt-8" type="submit">Enviar</button>
                </div>
            </form>
        </div>


    </Postularse>
</template>
