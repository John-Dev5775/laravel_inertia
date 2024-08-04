import React, { useEffect, useState } from 'react';
import axios from 'axios';
import Square from '../Components/Square';
import Layout from '../Layouts/Layout'

type Color = 'red' | 'blue';

interface GridState {
    grid: Color[][];
}

export default function Users(props: GridState) {

    const [grid, setGrid] = useState<GridState['grid']>(props.grid);
    const handleClick = (row: number, col: number) => {
        axios.post('/api/click', { row, col }).then((response) => {
            setGrid(response.data.grid);
        });
    };

    return (
        <Layout>
            <div style={{ flexGrow: 1, backgroundColor: '#dff0d8', padding: '20px' }}>
                {grid.map((row, rowIndex) => (
                    <div key={rowIndex} style={{ display: 'flex' }}>
                        {row.map((color, colIndex) => (
                            <Square
                                key={colIndex}
                                color={color}
                                onClick={() => handleClick(rowIndex, colIndex)}
                            />
                        ))}
                    </div>
                ))}
            </div>
            );
        </Layout>
    )
}

