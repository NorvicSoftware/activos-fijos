import AuthenticatesLayout from "@/Layouts/AuthenticatedLayout"


export default function index (){
    return (
        <AuthenticatesLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >

        </AuthenticatesLayout>
    )
}