import React from 'react'
import axios from "axios"
import { useNavigate  } from "react-router-dom"


const SignOut = () => {
    const navigate  = useNavigate();
    let user = JSON.parse(localStorage.getItem('user'));

    var obj = {token: user.access_token};
    axios.post("http://127.0.0.1:8000/api/logout",obj)
    .then(resp=>{
        var data = resp.data;
        console.log(data);
        navigate('/login');
    }).catch(err=>{
        console.log(err);
    });
}
export default SignOut