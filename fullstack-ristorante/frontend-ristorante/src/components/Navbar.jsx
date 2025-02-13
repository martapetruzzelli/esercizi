import { Link } from "react-router-dom";

const NavBar = () => {
    return (
        <nav className="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <div className="container-fluid container">
                <a className="navbar-brand" href="/">
                    Ristorante
                </a>
                <button
                    className="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse" id="navbarCollapse">
                    <ul className="navbar-nav me-auto mb-2 mb-md-0">
                        <li className="nav-item">
                            <Link className="nav-link active" aria-current="/menu" to="/menu">
                                Menu
                            </Link>
                        </li>
                        <li className="nav-item">
                            <Link className="nav-link" href="/dashboard">
                                Dashboard
                            </Link>
                        </li>
                    </ul>
                </div>
                <div className="d-flex gap-2">
                    <Link className="btn btn-success" to="/login">
                        Login
                    </Link>
                </div>
            </div>
        </nav>
    );
};

export default NavBar;