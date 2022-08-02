import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
// import App from './App';
import reportWebVitals from './reportWebVitals';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import '../node_modules/bootstrap/dist/css/bootstrap.min.css';
import Head from './Components/Head';
import Home from './Components/Home';
import Contact from './Components/Contact';
import Foot from './Components/Foot';
import UserList from './Components/UserList';
import UserDetails from './Components/UserDetails';
import Login from './Components/Login';
import SignOut from './Components/SignOut';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
     <Router>
      <Head/>
      <Routes>
        <Route exact path='/' element={<Home/>} />
        <Route exact path='/userList' element={<UserList/>} />
        <Route exact path='/userDetails/:userID/:name/:email/:phoneNumber/:password/:dob/:gender/:role' element={<UserDetails/>}/>
        <Route exact path='/contact' element={<Contact/>} />
        <Route exact path='/login' element={<Login/>} />
        <Route exact path='/signout' element={<SignOut/>} />
        {/* <Route exact path='/color' element={<ColorState/>} />
        <Route exact path='/effect' element={<EffectHookCheck/>} />
        <Route exact path='/posts' element={<AllPosts/>} /> */}
      </Routes>
      <Foot/>
    </Router>
  </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a functions
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
