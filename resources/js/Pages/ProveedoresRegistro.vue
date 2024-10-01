<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import {ref} from 'vue';
import MainLayout from "@/Layouts/MainLayout.vue";
import {Inertia} from "@inertiajs/inertia";


const file = ref(null);
const form = useForm({
    // name: '',
    ciuu: '',
    phone: '',
    // id_type: '',
    // identification_number: '',
    person_type: '',
    company_name: '',
    comercial_name: '',
    web_page: '',
    regimen: '',
    retainer: '',
    contributor: '',
    ica: '',
    // email: '',
    rut: '',
    iso_9001: '',
    copy_doc_represent: '',
    bank_certification: '',


});

const docs = useForm({file: ''})
const submit = () => {
    console.log(form);
    form.post(route('supplier.create'), {onSuccess: () => {
            Inertia.visit(route('convocatorias'));
        }
    });
};

const handleFileUpload = (event) => {
    file.value = event.target.files[0];
    console.log(file.value);
};
</script>

<template>
    <Head title="Registro Proveedores"></Head>

    <MainLayout>

        <div class="w-fit mx-auto flex justify-center items-center p-8 bg-white rounded-lg shadow-md space-y-8">
            <!-- Sección 1 -->
            <form @submit.prevent="submit">
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-1 mr-20">
                        <h2 class="text-2xl font-semibold">Informacion Basica</h2>
                    </div>

                    <div class="col-span-2">

                        <div class="grid grid-cols-2 gap-6 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="first-name">Tipo
                                    persona</label>
                                <select id="first-name" v-model="form.person_type"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option>Natural</option>
                                    <option>Juridica</option>

                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="last-name">Razon
                                    Social</label>
                                <input id="last-name" type="text" v-model="form.company_name"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="zip">Nombre Comercial
                                </label>
                                <input id="zip" type="text" v-model="form.comercial_name"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="state">Pagina web</label>
                                <input id="state" type="text" v-model="form.web_page"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>


                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="zip">Regimen
                                </label>
                                <input id="zip" type="text" v-model="form.regimen"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="city">Auto Retenedor</label>
                                <label class=" text-sm font-medium text-gray-700" for="city">Si</label>
                                <input class="mr-4" id="city" type="radio" v-model="form.retainer" value="Si" required/>
                                <label class=" text-sm font-medium text-gray-700" for="city">No</label>
                                <input id="city" type="radio" v-model="form.retainer" value="No" required
                                       class=""/>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="state">Gran
                                    contribuyente</label>
                                <label class=" text-sm font-medium text-gray-700" for="city">Si</label>
                                <input class="mr-4" id="city" type="radio" v-model="form.contributor" value="Si" required/>
                                <label class=" text-sm font-medium text-gray-700" for="city">No</label>
                                <input id="city" type="radio" v-model="form.contributor" value="No" required
                                       class=""/>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="zip">Contribuyente de Ica
                                </label>
                                <label class=" text-sm font-medium text-gray-700" for="city">Si</label>
                                <input class="mr-4" id="city" type="radio" v-model="form.ica" value="Si" required/>
                                <label class=" text-sm font-medium text-gray-700" for="city">No</label>
                                <input id="city" type="radio" v-model="form.ica" value="No" required
                                       class=""/>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="city">Telefono</label>
                                <input id="city" type="text" v-model="form.phone"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="city">ciuu</label>
                                <input id="city" type="text" v-model="form.ciuu"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                            </div>


                        </div>
                    </div>
                </div>

                <!-- Sección 2 -->
                <!--                <div class="grid grid-cols-3 gap-6">-->
                <!--                    <div class="col-span-1">-->
                <!--                        <h2 class="text-2xl font-semibold">Productos y servicios</h2>-->
                <!--                    </div>-->
                <!--                    <div class="col-span-2">-->

                <!--                        <div class="mb-4">-->
                <!--                            <label class="block text-sm font-medium text-gray-700" for="job-title">Job Title</label>-->
                <!--                            <select name="" multiple id="categories"-->
                <!--                                    v-model="selectedCategories">-->
                <!--                                <option-->
                <!--                                    v-for="category in categories"-->
                <!--                                    :key="category"-->
                <!--                                    :value="category"-->
                <!--                                >-->
                <!--                                    {{ category }}-->
                <!--                                </option>-->
                <!--                            </select>-->
                <!--                            <div class="mt-4">-->
                <!--                                <h3>Categorías seleccionadas:</h3>-->
                <!--                                <ul>-->
                <!--                                    <li v-for="(category, index) in selectedCategories" :key="index">-->
                <!--                                        {{ category }}-->
                <!--                                    </li>-->
                <!--                                </ul>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->

                <!-- Sección 3 -->
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-1">
                        <h2 class="text-2xl font-semibold">Documentos Adjuntos</h2>
                    </div>

                    <div class="col-span-1">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="rut">RUT</label>
                        <input
                            required class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="user_avatar_help" id="rut" type="file" ref="file" @input="form.rut=$event.target.files[0]"/>


                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="certificacion">Certificacion
                            Bancaria</label>
                        <input
                            required class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="certificacion" id="user_avatar" type="file" @input="form.bank_certification=$event.target.files[0]"/>
                    </div>
                    <div class="col-span-1">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="copia">Copia
                            documento representante legal</label>
                        <input
                            required class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="user_avatar_help" id="copia" type="file" @input="form.copy_doc_represent=$event.target.files[0]"/>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="iso">Calidad
                            ISO 9001</label>
                        <input
                            required class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="user_avatar_help" id="iso" type="file" @input="form.iso_9001=$event.target.files[0]"/>
                    </div>
                </div>

                <button class="bg-blue text-white p-4 rounded-lg mt-4 flex" type="submit">Enviar</button>
<!--                <Link href="{{url('/')}}/{{ Storage::disk('local')->url('file.txt')}}">hola</Link>-->
            </form>
        </div>


    </MainLayout>
</template>
