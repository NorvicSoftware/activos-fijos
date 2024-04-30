import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import TextInput from "@/Components/TextInput";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import { useForm, usePage } from "@inertiajs/react";
import ButtonReference from "@/Components/ButtonReference";
import { useState, useEffect } from "react";

export default function Create({ auth }) {

    const { asset } = usePage().props;
    const { id } = usePage().props;

    if (id === 0) {
        console.log('CREAR')
    }
    else {
        console.log('EDITAR');
    }

    const { data, setData, post, put, reset, errors } = useForm({
        name: asset ? asset.name : '',
        code: asset ? asset.code : '',
        code: asset ? asset.description : '',
        code: asset ? asset.brand : '',
        code: asset ? asset.model : '',
        code: asset ? asset.series : '',
        code: asset ? asset.status : '',
    });

    const createAsset = (event) => {
        event.preventDefault();
        console.log(data);
        if (id === 0) {
            post(route('assets.store'), {
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
            put(route('assets.update', id), {
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
        <AuthenticatedLayout user={auth.user} header={<h2 className="text-amber-400 text-sm">NUEVO ACTIVO FIJO</h2>}>
            <ButtonReference url="/assets" name="ATRAS" />
            <div className="py-12">
                <div className="max-w-2xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-gray-100 ">
                            <form onSubmit={createAsset}>
                                <div className=" py-2">
                                    <InputLabel value="Nombre del activo fijo" />
                                    <TextInput className="w-full " value={data.name} onChange={(e) => setData('name', e.target.value)} />
                                </div>

                                <div className=" py-2">
                                <InputLabel value="Codigo" />
                                <TextInput className="w-full" value={data.code} onChange={(e) => setData('code', e.target.value)} />
                                </div>
                                
                                <div className=" py-2">
                                <InputLabel value="Descripcion" />
                                <TextInput className="w-full" value={data.description} onChange={(e) => setData('description', e.target.value)} />
                                </div>

                                <div className=" py-2">
                                <InputLabel value="Marca" />
                                <TextInput className="w-full" value={data.brand} onChange={(e) => setData('brand', e.target.value)} />
                                </div>

                                <div className=" py-2">
                                <InputLabel value="Modelo" />
                                <TextInput className="w-full" value={data.model} onChange={(e) => setData('model', e.target.value)} />
                                </div>

                                <div className=" py-2">
                                <InputLabel value="Serie" />
                                <TextInput className="w-full" value={data.series} onChange={(e) => setData('series', e.target.value)} />
                                </div>
                                
                                <div className=" py-2">
                                <InputLabel value="Estado" />
                                <TextInput className="w-full" value={data.status} onChange={(e) => setData('status', e.target.value)} />
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