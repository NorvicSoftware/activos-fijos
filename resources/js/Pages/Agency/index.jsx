import AuthenticatesLayout from "@/Layouts/AuthenticatedLayout"
import { Head, usePage } from "@inertiajs/react";
import ButtonReference from "@/Components/ButtonReference";

export default function Index ({ auth }){
    const { agencies } = usePage().props;
    return (
        <AuthenticatesLayout    user={auth.user}    header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Agencias</h2>}>
            <Head title="Agencias" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div className="p-6 text-gray-900 dark:text-gray-100">
                            <ButtonReference url="/agencies/create" name="Crear nueva Agencia" />
                            <table>
                                <thead>
                                    <tr>
                                        <th>Agencia</th>
                                        <th>Direccion</th>
                                        <th>Numero de telefono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {agencies.map(agency => (
                                        <tr key={agency.id}>
                                            <td>{agency.name}</td>
                                            <td>{agency.address}</td>
                                            <td>{agency.phoneNumber}</td>
                                            <td>
                                                <a href={route('agencies.edit', agency.id)}>Editar</a>
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