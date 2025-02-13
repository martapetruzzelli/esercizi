import { useEffect, useState } from 'react'
import apiFetch from '../utils/AuthHelper';
import apiConfig from '../config/apiConfig';

const Home = () => {

    const [dishes, setDishes] = useState([]);
    
    useEffect(() => {
        apiFetch('dishes')
        .then(data =>{
            setDishes(data)
        })
    }, []);


    return (<>
        <h1>Home</h1>
            <div className="row row-cols-1 row-cols-md-3 g-4">
        {dishes.map(dish =>{
            return (
            
            <div key={dish.id} className="col">
                <div className="card">
                    <img src={`${apiConfig.imgUrl}/${dish.img}`} className="card-img-top" alt={dish.name}/>
                        <div className="card-body">
                            <h5 className="card-title">{dish.name}</h5>
                            <p className="card-text">{dish.description}</p>
                            <p className="card-text">{dish.price}</p>
                        </div>
                </div>
                <button>Order</button>
            </div>
        
            )
        })}
            </div>
        </> )
}

        export default Home 