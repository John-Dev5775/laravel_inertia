import { Link } from '@inertiajs/react';

export default function Home(props:any) {

    const {children} = props
    return (
        <>

            <div className="flex h-screen">
                <div className="w-1/4 bg-gray-800 text-white p-4">
                    <ul>
                        <li>
                            <Link href="/screen1">Screen 1</Link>
                        </li>
                        <li>
                            <Link href="/gallery">Screen 2</Link>
                        </li>
                        <li>
                            <Link href="/squaregrid">Screen 3</Link>
                        </li>
                    </ul>
                </div>
                <div className='flex w-full flex-col'>
                    {children}
                </div>
            </div>
        </>
    )
}