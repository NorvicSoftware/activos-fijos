import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, usePage } from "@inertiajs/react";
import ButtonReference from "@/Components/ButtonReference";

export default function Index({ auth }) {
    const { assets } = usePage().props;

    return (
        <AuthenticatedLayout user={auth.user} header={<h2 className="font-semibold text-xl text-gray-800 dark:text-black-200 leading-tight">Activos Fijos</h2>}>
            <Head title="Activos Fijos" />

            <div className="py-10">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-2">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-gray-100">
                            <ButtonReference url="/assets/create" name="Crear nuevo Activo Fijo" />
                            <table className="mt-2 w-auto border border-solid border-l-1">
                                <thead>
                                    <tr className="border border-l-1">
                                        <th className="text-md px-6 py-1">Activo fijo</th>
                                        <th className="text-md px-6 py-1">Codigo</th>
                                        <th className="text-md px-6 py-1">Descripcion</th>
                                        <th className="text-md px-6 py-1">Marca</th>
                                        <th className="text-md px-6 py-1">Modelo</th>
                                        <th className="text-md px-6 py-1">Serie</th>
                                        <th className="text-md px-6 py-1">Estado</th>
                                        <th className="text-md px-6 py-1">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {assets.map(asset => (
                                        <tr key={asset.id}>

                                            <td className="border-b text-center">{asset.name}</td>
                                            <td className="border-b text-center">{asset.code}</td>
                                            <td className="border-b text-center">{asset.description}</td>
                                            <td className="border-b text-center">{asset.brand}</td>
                                            <td className="border-b text-center">{asset.model}</td>
                                            <td className="border-b text-center">{asset.series}</td>
                                            <td className="border-b text-center">{asset.status}</td>
                                            <td className="border-b">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" className="ml-12 w-6 h-6">
                                                    <a href={route('assets.edit', asset.id)}> AAAAAAAAAAAAAAAAAAAAAAAAA
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />

                                                    </a>
                                                </svg>
                                                
                                            </td>
                                        </tr>
                                    ))

                                    }
                                </tbody>
                            </table>
                            <ButtonReference url="/dashboard" name="IR DASHBOARD" />
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    )
}