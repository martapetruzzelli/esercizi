import apiFetch from '../utils/AuthHelper';
import { useNavigate } from 'react-router-dom';

const Login = () => {

    const navigate = useNavigate()

    const handleSubmit = (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);

        const formDataObject = Object.fromEntries(formData.entries());

        apiFetch('login', 'POST', formDataObject, false)
        .then(accessData =>{
            localStorage.setItem('access_data', JSON.stringify(accessData))
            navigate('/dashboard');
        })
    }

  return (<>
    <div>Login</div>
    <form onSubmit={handleSubmit}>
        <input type="email" name="email" placeholder="Email" className="form-control" />
        <input type="password" name="password" placeholder="password" className="form-control" />

        <button className="btn btn-primary">Login</button>
    </form>

 </> )
}

export default Login