import { BrowserRouter, Route, Routes } from 'react-router-dom'
import './App.css'
import NavBar from './components/Navbar'
import Home from './components/Home'
import Login from './components/Login'
import Dashboard from './components/Dashboard'

function App() {

  return (
    <>
      <BrowserRouter>
        <NavBar/>
        <Routes>
          <Route path="/" element={<Home/>}>Home</Route>
          <Route path="/login" element={<Login/>}>Login</Route>
          <Route path="/dashboard" element={<Dashboard/>}>Dashboard</Route>
        </Routes>
      </BrowserRouter>  
    </>
  )
}

export default App
