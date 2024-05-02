import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, usePage } from "@inertiajs/react";
import ButtonReference from "@/Components/ButtonReference";

export default function Read ({ auth }) {
    const { assets } = usePage().props;
  

    return (
        <AuthenticatedLayout user={auth.user} header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Activos Fijos</h2>}>
            <Head title="Activos Fijos" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-gray-100">
                           
                            <table>
                                <thead>
                                    <tr>
                                        <th>Activo fijo</th>
                                        <th>Codigo</th>
                                        <th>Checked</th>
                                       
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    {assets.map(asset => (
                                        <tr key={asset.id}>
                                           
                                           <td>{asset.model}</td>
                                           <td>{asset.code}</td>
                                           <td>{asset.checked === 1 ? "Inventariado" : "No inventariado"}</td>
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