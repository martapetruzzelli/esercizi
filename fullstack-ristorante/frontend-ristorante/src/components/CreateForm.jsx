
import { useEffect, useState } from 'react';
import apiFetch from '../utils/AuthHelper';

import { Button, InputGroup } from 'react-bootstrap';
import { Form } from 'react-bootstrap';

const CreateForm = ({handleAction}) => {

    const [ingredients, setIngredients] = useState([]);
    
    useEffect(() => {
        apiFetch('ingredients')
        .then(data =>{
            setIngredients(data)
        })
    }, []);

    const handleSubmit = (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        console.log(formData);
        

        handleAction();
    }

  return (
    <Form onSubmit={handleSubmit}>

        <InputGroup className="mb-3">
        <Form.Control type="text" name="name"/>
            <Form.Control type="text" name="description"/>
            <Form.Control type="number" name="price"/>
            <Form.Control type="file" name="img"/>
        {ingredients.map(ingredient =>{
            return (<>

            <Form.Check label={ingredient.name} key={ingredient.id} value={ingredient.id} aria-label="Text input with checkbox" />
            
            </>)
        })}
        </InputGroup>

        <Button type="submit" variant="primary">Create</Button>


    </Form>
  )
}

export default CreateForm