import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, usePage } from "@inertiajs/react";
import ButtonReference from "@/Components/ButtonReference";

export default function Index({ auth }) {
    const { assets } = usePage().props;
    //console.log(assets);

    return (
        <AuthenticatedLayout user={auth.user} header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Activos Fijos</h2>}>
            <Head title="Activos Fijos" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-gray-100">
                            <ButtonReference url="/assets/create" name="Crear nuevo Activo Fijo" />
                            <table>
                                <thead>
                                    <tr>
                                        <th>Activo fijo</th>
                                        <th>Codigo</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {assets.map(asset => (
                                        <tr key={asset.id}>
                                            <td>{asset.name}</td>
                                            <td>{asset.code}</td>
                                            <td>{asset.brand}</td>
                                            <td>{asset.model}</td>
                                            <td>
                                                <a href={route('assets.edit', asset.id)}>Editar</a>
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