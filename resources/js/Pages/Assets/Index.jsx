
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, usePage } from '@inertiajs/react';

export default function Index ( { auth }){
    const { assets } = usePage().props;
    console.log('assets', assets);

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Activos Fijos</h2>}
        >
            <Head title="Activos FIjos" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <table className="min-w-full">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Activo Fijo</th>
                                        <th>Codigo</th>
                                        <th>Descripcion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    { assets.map((asset, id)  =>(
                                        <tr key={asset.id}>
                                            <td> { asset.id } </td>
                                            <td> { asset.name} </td>
                                            <td> {asset.code }</td>
                                            <td> { asset.description }</td>
                                        </tr>
                                    )) }
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </AuthenticatedLayout>
    );

}