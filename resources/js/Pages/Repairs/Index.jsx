import AuthenticatesLayout from "@/Layouts/AuthenticatedLayout"
import { Head, usePage } from "@inertiajs/react";
import ButtonReference from "@/Components/ButtonReference";

export default function Index ({ auth }){
    const { repairs } = usePage().props;
    return (
        <AuthenticatesLayout    user={auth.user}    header={<h2 className="font-semibold text-xl text-gray-800 dark:text-black-200 leading-tight">Reparaciones</h2>}>
            <Head title="Reaparaciones" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div className="p-6 text-gray-900 dark:text-black-100">
                            <ButtonReference url="/repairs/create" name="Crear nueva reparacion de activo fijo" />
                            <table>
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Precio</th>
                                        <th>Detalle</th>
                                        <th>ID de activo fijo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {repairs.map(repair => (
                                        <tr key={repair.id}>
                                            <td>{repair.repair_date}</td>
                                            <td>{repair.price}</td>
                                            <td>{repair.detail}</td>
                                            <td>{asset.id}</td>
                                            <td>
                                                <a className="EditButton text-blue-500 dark:text-black-100" href={route('repairs.edit', asset.id)}>Editar</a>
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
        </AuthenticatesLayout>
    )
}