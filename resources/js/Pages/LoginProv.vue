<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <!--    <GuestLayout>-->
    <Head title="Inicio Sesion Proveedores"/>
    <div class="p-8 h-full w-screen overflow-hidden">
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <div class="text-6xl font-bold z-1000">PORTAL <br> PROVEEDORES</div>
        <div class="flex h-full justify-around  items-center">
            <img src="images/login-prov.svg" class="w-2/5 " alt="">
            <div class="w-fit bg-white min-h-fit rounded-lg mx-4 md:mx-16 p-2 md:p-8 flex flex-cols gap-4 border-2 border-gray-300 border-solid">
                <form class="w-full" @submit.prevent="submit">
                    <div>
                                            <img class="mx-auto mb-4 w-4/5" src="images/cci-logo.png"  alt="">
<!--                        <div class="font-semibold text-center text-2xl my-4">Cámara de Comercio de Ibagué</div>-->

                        <InputLabel for="email"/>

                        <TextInput
                            id="email"
                            type="email"
                            placeholder="Correo electrónico"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.email"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="password"/>

                        <TextInput
                            id="password"
                            type="password"
                            placeholder="Contraseña"

                            class="mt-1 block w-full"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                        />

                        <InputError class="mt-2" :message="form.errors.password"/>
                    </div>

                    <div class="block mt-4 flex justify-between">
                        <label class="flex items-center">
                            <Checkbox name="remember" v-model:checked="form.remember"/>
                            <span class="ms-2 text-sm text-gray-600">Recordar</span>
                        </label>

                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button class="bg-blueFigma w-full text-white rounded-2xl py-2 px-4">Ingresar</button>
                    </div>
                    <div class="flex items-center w-full my-4">
                        <div class="border-t border-gray-300 flex-grow"></div>
                        <span class="mx-4 text-gray-500">ó</span>
                        <div class="border-t border-gray-300 flex-grow"></div>
                    </div>
                    <div>
                        <Link
                            class="bg-white flex justify-center w-full text-blueFigma border-blueFigma border-2 rounded-2xl py-2 px-4"
                            :href="route('register')">Registrarse
                        </Link>
                    </div>
                    <Link :href="route('password.request')"
                        class="underline text-sm text-blueFigma font-semibold mt-8 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    > Olvide mi contrasena
                    </Link>
                </form>
            </div>
        </div>
    </div>
</template>
