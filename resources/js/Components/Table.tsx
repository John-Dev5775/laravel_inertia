import React from 'react';

interface User {
    name: string;
    age: string;
    gender: string;
    degree: string;
}

interface TableProps {
    users: User[];
}

const Table: React.FC<TableProps> = ({ users }) => {
    return (
        <div className="relative overflow-x-auto">
            <table className="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" className="px-6 py-3">Name</th>
                        <th scope="col" className="px-6 py-3">Age</th>
                        <th scope="col" className="px-6 py-3">Gender</th>
                        <th scope="col" className="px-6 py-3">Degree</th>
                    </tr>
                </thead>
                <tbody>
                    {
                        users.map((user, index) => (
                            <tr key={index} className="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td className="px-6 py-4">{user.name}</td>
                                <td className="px-6 py-4">{user.age}</td>
                                <td className="px-6 py-4">{user.gender}</td>
                                <td className="px-6 py-4">{user.degree}</td>
                            </tr>
                        ))
                    }
                </tbody>
            </table>
        </div>
    );
};

export default Table;
