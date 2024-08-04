import React, { useState, useEffect } from 'react';
import axios from 'axios';
import Layout from '../Layouts/Layout';
import SearchInput from '../Components/SearchInput';
import Table from '../Components/Table';

interface User {
    name: string;
    age: string;
    gender: string;
    degree: string;
}

interface UsersProps {
    content: User[];
}

const Users: React.FC<UsersProps> = ({ content }) => {
    const [searchTerm, setSearchTerm] = useState('');
    const [debouncedTerm, setDebouncedTerm] = useState(searchTerm);
    const [users, setUsers] = useState<User[]>(content);

    useEffect(() => {
        const timerId = setTimeout(() => {
            setDebouncedTerm(searchTerm);
        }, 300);

        return () => {
            clearTimeout(timerId);
        };
    }, [searchTerm]);

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await axios.get(`/api/users?search=${debouncedTerm}`);
                if(Array.isArray(response.data.content)) {
                    setUsers(response.data.content);
                } else {
                    var data: Array<any> = [];
                    for (var ele of Object.values(response.data.content)) {
                        data.push(ele)
                    }
                    setUsers(data)
                }
                
            } catch (error) {
                console.error("Error fetching data:", error);
            }
        };

        fetchData();

    }, [debouncedTerm]);

    return (
        <Layout>
            <SearchInput value={searchTerm} onChange={setSearchTerm} />
            <Table users={users} />
        </Layout>
    );
};

export default Users;
