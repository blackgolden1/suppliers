<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';

const form = useForm({
    email: '',
    name: '',
    password: '',
    password_confirmation: '',
    identification_number: '',
    type_id: ''
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
        onSuccess: () => {
           // window.location.href = route('registerSupplier');
        }
    });
};
</script>

<template>
    <!--    <GuestLayout>-->
    <img class="opacity-100 fixed overflow-hidden " src="/images/login-fondo.jpg">
    <div class=" h-screen w-screen flex flex-cols justify-center items-center z-10 absolute">
        <div class="w-1/3 bg-white h-3/4 rounded-lg p-8 flex flex-cols gap-4">
            <Head title="Registro"/>
            <form @submit.prevent="submit" class="w-full">
                <p class="text-3xl text-blueFigma font-bold text-center mb-4" >Registro</p>
                <div>
                    <InputLabel for="name"/>

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Nombre completo"
                    />

                    <InputError class="mt-2" :message="form.errors.name"/>
                </div>

                <div class="mt-4">
                    <InputLabel for="email"/>

                    <TextInput
                        id="email"
                        type="email"
                        placeholder="Correo Electronico"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autocomplete="email"
                    />

                    <InputError class="mt-2" :message="form.errors.email"/>
                </div>

                <div class="mt-4">
                    <InputLabel for="type_id" class="text-xxs text-gray-300 font-normal" value="Tipo de identificacion"/>
                    <select name="" id="type_id"
                            class="border-gray-300 text-xxs focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                            v-model="form.type_id" required>
                        <option> RUT</option>
                        <option> NIT</option>
                    </select>

                    <InputError class="mt-2" :message="form.errors.password"/>
                </div>
                <div class="mt-4">
                    <InputLabel for="identification_number"/>

                    <TextInput
                        id="identification_number"
                        type="text"
                        class="mt-1 block w-full"
                        placeholder="Numero de Identificacion"
                        v-model="form.identification_number"
                        required
                        autocomplete="new-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password"/>
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
                        autocomplete="new-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password"/>
                </div>

                <div class="mt-4">
                    <InputLabel for="password_confirmation"/>

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password_confirmation"
                        required
                        placeholder="Confirmar contraseña"
                        autocomplete="new-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password_confirmation"/>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <Link
                        :href="route('login')"
                        class="underline text-xxs text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Ya estas registrado?
                    </Link>

                    <button class="bg-blueFigma text-white rounded-lg p-2" :class="{ 'opacity-25': form.processing }"
                          :disabled="form.processing">
                        Registrarme
                    </button>
                </div>
            </form>

        </div>
    </div>
    <!--    </GuestLayout>-->
</template>
