
import { Modal } from 'react-bootstrap';


const CustomModal = ({show, children}) => {



    return (
            <Modal show={show}>
                <Modal.Header>
                    <Modal.Title>create</Modal.Title>
                </Modal.Header>
                {children}
            </Modal>
    );
}

export default CustomModal