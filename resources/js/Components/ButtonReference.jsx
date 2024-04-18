export default function ButtonReference ({url = '', name = 'ATRAS'}){
    return (
        <a href={url} className="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">{name}</a>
    )
}