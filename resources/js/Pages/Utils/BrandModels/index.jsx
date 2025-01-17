import ActionButtons from "@/Components/ActionButtons";
import Dropdown from "@/Components/Dropdown";
import Pagination from "@/Components/Pagination";
import Tags from "@/Components/Tags";
import TopMenu from "@/Components/TopMenu";
import DashboardLayout from "@/Pages/Layouts/DashboardLayout";
import { usePage } from "@inertiajs/react";
import { useEffect } from "react";
import toast from "react-hot-toast";


export default function Featrures({ brand_models }) {
    const { errors } = usePage().props;
    useEffect(() => {
        if (errors && errors.success) {
            //reset form //
            toast.success(errors.success);
        }
    }, [errors]);

    // console.log(features);
    return (
        <DashboardLayout>
            <TopMenu
                title={"Models"}
                link={"/dashboard/brand_models/create"}
                linkText={"Add New"}
            />

            <div className="relative overflow-x-auto sm:rounded-lg mt-5">
                <table className="w-full text-sm text-left text-gray-500">
                    <thead className="text-xs text-gray-700 uppercase bg-lightergray">
                        <tr>
                            <th scope="col" className="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" className="px-6 py-3">
                                name
                            </th>
                            <th scope="col" className="px-6 py-3">
                                Manufacture
                            </th>
                            <th scope="col" className="px-6 py-3">
                                status
                            </th>
                            <th scope="col" className="px-6 py-3 text-end">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {brand_models?.length === 0 && (
                            <tr>
                                <td colSpan="5" className="text-center py-4">
                                    No data found
                                </td>
                            </tr>
                        )}

                        {brand_models?.map((item, index) => (
                            <tr
                                className="odd:bg-white even:bg-gray-50"
                                key={index}
                            >
                                <th
                                    scope="row"
                                    className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap "
                                >
                                    {index + 1}
                                </th>
                                <td className="px-6 py-4">{item.model}</td>
                                <td className="px-6 py-4">{item.manufacturer.make}</td>

                                <td className="px-6 py-4"><Tags type={item.status.toLowerCase()} /></td>
                                <td className="px-6 py-4 flex justify-end">
                                    <ActionButtons
                                        editRoute={`/dashboard/brand_models/edit/${item.id}`}
                                        deleteRoute={`/dashboard/brand_models/delete/${item.id}`}
                                        blockRoute={`/dashboard/brand_models/block/${item.id}`}
                                        restoreRoute={`/dashboard/brand_models/restored/${item.id}`}
                                        item = {item}
                                    />
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
                <div className="mt-8 flex justify-end items-center">


                    {/* <Pagination links = {features.links}  /> */}
                </div>

            </div>
        </DashboardLayout>
    );
}
