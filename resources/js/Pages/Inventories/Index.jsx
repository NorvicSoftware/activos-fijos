
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, usePage, useForm } from '@inertiajs/react';
import ButtonReference from '@/Components/ButtonReference';

export default function Index({ auth }) {
    const { inventories } = usePage().props;
    const { data, setData, post } = useForm({
        search_code: '',
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post(route('inventories.search'), {
            data,
        });
    };

    return (
        <AuthenticatedLayout user={auth.user} header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Inventarios</h2>}>
             <Head title="Inventories" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-gray-100">
                            <form onSubmit={handleSubmit}>
                                <input
                                    type="text"
                                    className="rounded border-gray-300 dark:border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 dark:focus:ring-indigo-500 dark:focus:border-indigo-500 block w-full sm:text-sm border dark:bg-gray-800"
                                    placeholder="Buscar por código"
                                    value={data.search_code}
                                    onChange={(e) => setData('search_code', e.target.value)}
                                />
                                <button
                                    type="submit"
                                    className="mt-2 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-offset-gray-900"
                                >
                                    Buscar
                                </button>
                            </form>
                     
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Fecha de inicio</th>
                                        <th>Fecha final</th>
                                        <th>Detalles</th>
                                        <th>Leído</th>
                                        <th>No Leído</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {inventories.map((inventory) => (
                                        <tr key={inventory.id}>
                                            <td>{inventory.name}</td>
                                            <td>{inventory.start_date}</td>
                                            <td>{inventory.final_date}</td>
                                            <td>{inventory.details}</td>
                                            <td>{inventory.read}</td>
                                            <td>{inventory.not_read}</td>
                                            <td>
                                                <a href={route('inventories.edit', inventory.id)}>Editar</a>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                            <ButtonReference url="/dashboard" name="IR DASHBOARD" />
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
