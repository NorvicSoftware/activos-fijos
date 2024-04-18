import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import TextInput from "@/Components/TextInput";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import { useForm } from "@inertiajs/react";

export default function Create({ auth}){

    const { data, setData, post, reset, errors } = useForm({ name: '', code: '' });

    const createAsset = (event) => {
        event.preventDefault();
        console.log(data);
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
    
    return (
        <AuthenticatedLayout user={ auth.user } header={<h2 className="text-amber-400 text-sm">NUEVO ACTIVO FIJO</h2>}>


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