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
        <ButtonReference url="/assets" name="ATRAS" />

        <form onSubmit={createAsset}>
            <InputLabel value="Nombre del activo fijo"/>
            <TextInput value={ data.name } onChange={(e) => setData('name', e.target.value)}/>

            <InputLabel value="Codigo"/>
            <TextInput value={ data.code } onChange={(e) => setData('code', e.target.value)}/>

            <PrimaryButton>Guardar</PrimaryButton>

        </form>


        </AuthenticatedLayout>
    )
}