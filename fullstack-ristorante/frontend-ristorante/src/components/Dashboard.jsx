import { useEffect, useState } from 'react';
import apiFetch from '../utils/AuthHelper';
import apiConfig from '../config/apiConfig';
import CustomModal from './CustomModal';
import CreateForm from './CreateForm';
import { Button, Modal } from 'react-bootstrap';

const Dashboard = () => {

    const [dishes, setDishes] = useState([]);
    const [isShow, setIsShow] = useState(false);

    useEffect(() => {
        apiFetch('dishes')
            .then(data => {
                setDishes(data)
            })
    }, []);

    return (<>
        <h1>Dashboard</h1>

        <button type="button" className="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onClick={()=>setIsShow(true)}>
            Create
        </button>

        <table className="table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                {dishes.map(dish => {
                    return (

                        <tr key={dish.id}>
                            <td>{dish.id}</td>
                            <td>{dish.name}</td>
                            <td>{dish.description}</td>
                            <td>{dish.price}</td>
                            <td><img src={`${apiConfig.imgUrl}/${dish.img}`} className="card-img-top" alt={dish.name} /></td>

                            <td>
                                <a className="btn btn-warning" >Modifica</a>
                                <a className="btn btn-danger" >Elimina</a>
                            </td>
                        </tr>
                    )
                })}


            </tbody>

        </table>

        {isShow && <CustomModal show={isShow}> 
            
            <Modal.Body>
                    <CreateForm handleAction={()=>{}}/>
                </Modal.Body>

                <Modal.Footer>
                    <Button variant="secondary" onClick={()=>setIsShow(false)}>Close</Button>
                    <Button variant="primary" onClick={()=>{}}>Save changes</Button>
                </Modal.Footer>

        </CustomModal>
        }

    </>)
}

export default Dashboard