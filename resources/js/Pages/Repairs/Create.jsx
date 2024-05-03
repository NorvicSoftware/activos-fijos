import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import TextInput from "@/Components/TextInput";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import { useForm, usePage } from "@inertiajs/react";
import ButtonReference from "@/Components/ButtonReference";
import { useState, useEffect } from "react";

export default function Create({ auth }) {

    const { repair } = usePage().props;
    const { id } = usePage().props;

    if (id === 0) {
        console.log('CREAR')
    }
    else {
        console.log('EDITAR');
    }

    const { data, setData, post, put, reset, errors } = useForm({
        date: repair ? repair.repair_date : '',
        code: repair ? repair.price : '',
        text: repair ? repair.detail : '',
        code: repair ? repair.asset_id : ''
    });

    const createRepair = (event) => {
        event.preventDefault();
        console.log(data);
        if (id === 0) {
            post(route('repairs.store'), {
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
            put(route('repairs.update', id), {
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
        <AuthenticatedLayout user={auth.user} header={<h2 className="text-black-400 text-sm">NUEVA REPARACION</h2>}>
            <ButtonReference url="/repairs" name="ATRAS" />
            <div className="py-12">
                <div className="max-w-2xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-black-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-black-100 ">
                            <form onSubmit={createRepair}>
                                <div className=" py-2">
                                    <InputLabel value="Fecha" />
                                    <TextInput className="w-full " value={data.repair_date} onChange={(e) => setData('repair_date', e.target.value)} />
                                </div>

                                <div className=" py-2">
                                <InputLabel value="Precio" />
                                <TextInput className="w-full" value={data.price} onChange={(e) => setData('price', e.target.value)} />
                                </div>
                                
                                <div className=" py-2">
                                <InputLabel value="Detalle" />
                                <TextInput className="w-full" value={data.detail} onChange={(e) => setData('detail', e.target.value)} />
                                </div>

                                <div className=" py-2">
                                <InputLabel value="ID de Activo Fijo" />
                                <TextInput className="w-full" value={data.asset_id} onChange={(e) => setData('asset_id', e.target.value)} />
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