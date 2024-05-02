import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import TextInput from "@/Components/TextInput";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import { useForm, usePage } from "@inertiajs/react";
import ButtonReference from "@/Components/ButtonReference";
import { useState, useEffect } from "react";

export default function Create({ auth }) {

    const { agency } = usePage().props;
    const { id } = usePage().props;

    if (id === 0) {
        console.log('CREAR')
    }
    else {
        console.log('EDITAR');
    }

    const { data, setData, post, put, reset, errors } = useForm({
        name: agency ? agency.name : '',
        code: agency ? agency.address : '',
        code: agency ? agency.phoneNumber : ''
    });

    const createAgency = (event) => {
        event.preventDefault();
        console.log(data);
        if (id === 0) {
            post(route('agencies.store'), {
                onSuccess: (res) => {
                    //
                    console.log('Success');
                },
                onError: (error) => {
                    console.log('Error');
                }
            })
        }
        else {
            put(route('agencies.update', id), {
                onSuccess: (res) => {
                    //
                    console.log('Success');
                },
                onError: (error) => {
                    console.log('Error');
                }
            })
        }


    }

    return (
        <AuthenticatedLayout user={auth.user} header={<h2 className="text-black-400 text-sm">NUEVA AGENCIA</h2>}>
            <ButtonReference url="/agencies" name="ATRAS" />
            <div className="py-12">
                <div className="max-w-2xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-black-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-black-100 ">
                            <form onSubmit={createAgency}>
                                <div className=" py-2">
                                    <InputLabel value="Nombre de la Agencia" />
                                    <TextInput className="w-full " value={data.name} onChange={(e) => setData('name', e.target.value)} />
                                </div>

                                <div className=" py-2">
                                <InputLabel value="Direccion" />
                                <TextInput className="w-full" value={data.address} onChange={(e) => setData('address', e.target.value)} />
                                </div>
                                
                                <div className=" py-2">
                                <InputLabel value="Numero de telefono" />
                                <TextInput className="w-full" value={data.phoneNumber} onChange={(e) => setData('phoneNumber', e.target.value)} />
                                </div>
                                
                                <div className="flex flex-col items-center mt-4">
                                    <PrimaryButton className="">Guardar</PrimaryButton>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    )
}