import React from 'react';
import { Head, usePage, useForm } from '@inertiajs/react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import ButtonReference from '@/Components/ButtonReference';

export default function Index({ auth }) {
    const { inventories } = usePage().props;
    const { data, setData, post } = useForm({
        search_code: '',
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post(route('inventories.search'), {});
    };

    return (
        <AuthenticatedLayout user={auth.user} header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Inventarios</h2>}>
            <Head title="Inventories" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-gray-100">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Fecha de inicio</th>
                                        <th>Fecha final</th>
                                        <th>Detalles</th>
                                        <th>No Leído</th>
                                        <th>Leído</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {inventories.map((inventory) => (
                                        <tr key={inventory.id}>
                                            <td>{inventory.name}</td>
                                            <td>{inventory.start_Date}</td>
                                            <td>{inventory.final_date}</td>
                                            <td>{inventory.details}</td>
                                            <td>{inventory.not_read}</td>
                                            <td>{inventory.read}</td>
                                            <td>
                                            </td>
                                            <ButtonReference url="/inventories/read/assets" name="Ver detalles" />
                                            
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                            <ButtonReference url="/dashboard" name="Ir al Dashboard" />
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
