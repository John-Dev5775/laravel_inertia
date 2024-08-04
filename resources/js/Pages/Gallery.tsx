import React, { useState } from 'react';
import axios from 'axios';
import { Swiper, SwiperSlide } from 'swiper/react';
import { Navigation } from 'swiper/modules';

import Layout from '../Layouts/Layout';
import SearchInput from '../Components/SearchInput';

import 'swiper/css';
import 'swiper/css/navigation';


export default function Users() {
    const [searchTerm, setSearchTerm] = useState('')
    const [photos, setPhotos] = useState([])
    
    const fetchData = async () => {
        try {
            const response = await axios.get(`/api/gallery?search=${searchTerm}`);
            console.log(response.data.photos[0].src);
            setPhotos(response.data.photos);
        } catch (error) {
            console.error("Error fetching data:", error);
        }
    };

    return (
        <Layout>
            <SearchInput value={searchTerm} onChange={setSearchTerm} onClick={fetchData} />
            <Swiper navigation={true} modules={[Navigation]} className="mySwiper" style={{ width: "33%"}}>
                {
                    photos.map((item, index) => (
                        <SwiperSlide key={index}>
                            <img src={item.src.original} />
                        </SwiperSlide>
                    ))
                }
            </Swiper>
        </Layout>
    )
}

