import React , {useState, useEffect} from "react";
import axios from 'axios';
import { useNavigate  } from "react-router-dom"

const Login = ()=>{
    let[token, setToken]= useState("");
    let[email, setEmail] = useState("");
    let[password, setPassword] =useState("");
    const navigate  = useNavigate("");


    const loginSubmit= ()=>{
        var obj = {email: email, password: password};
        axios.post("http://127.0.0.1:8000/api/login",obj)
        .then(resp=>{
            var token = resp.data;
            console.log(token);
            var user = {userId: token.id, access_token:token.token};
            localStorage.setItem('user',JSON.stringify(user));
            if(token == "No user found"){
                navigate('/login');
            }else{
                navigate('/userList');
            }
            // console.log(localStorage.getItem('user'));
        }).catch(err=>{
            console.log(err);
        });
    }

    return(
        <div>
            <form>
                <input type="text" value={email} onChange={(e)=>setEmail(e.target.value)}></input>
                <input type="password" value={password} onChange={(e)=>setPassword(e.target.value)}></input>

            </form>
                <button onClick={loginSubmit}>Login</button>
        </div>

    )
}
export default Login;