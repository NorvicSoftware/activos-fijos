import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import TextInput from "@/Components/TextInput";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import { useForm, usePage } from "@inertiajs/react";
import ButtonReference from "@/Components/ButtonReference";
import { useState, useEffect } from "react";

export default function Create({ auth}){

    const { asset } = usePage().props;
    const { id } = usePage().props;

    if(id === 0) {
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
        if(id === 0) {
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
        <AuthenticatedLayout user={ auth.user } header={<h2 className="text-amber-400 text-sm">NUEVO ACTIVO FIJO</h2>}>
        <ButtonReference url="/assets" name="ATRAS"/>

        <form onSubmit={createAsset}>
            <div className="flex justify-center items-center h-full">
                <div className="bg-blue-900 rounded-lg p-8">
                    <InputLabel value="Nombre del activo fijo"/>
                    <TextInput value={ data.name } onChange={(e) => setData('name', e.target.value)}/>

                    <InputLabel value="Codigo"/>
                    <TextInput value={ data.code } onChange={(e) => setData('code', e.target.value)}/>

                    <InputLabel value="Descripcion"/>
                    <TextInput value={ data.description } onChange={(e) => setData('description', e.target.value)}/>

                    <InputLabel value="Marca"/>
                    <TextInput value={ data.brand } onChange={(e) => setData('brand', e.target.value)}/>

                    <InputLabel value="Modelo"/>
                    <TextInput value={ data.model } onChange={(e) => setData('model', e.target.value)}/>

                    <InputLabel value="Serie"/>
                    <TextInput value={ data.series } onChange={(e) => setData('series', e.target.value)}/>

                    <InputLabel value="Estado"/>
                    <TextInput value={ data.status } onChange={(e) => setData('status', e.target.value)}/>
                </div>
            </div>
            <div className="flex flex-col items-center mt-4">
                <PrimaryButton className="">Guardar</PrimaryButton>
            </div>
        </form>


        </AuthenticatedLayout>
    )
}