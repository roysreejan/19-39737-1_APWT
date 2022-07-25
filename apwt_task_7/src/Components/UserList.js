import React , {useState, useEffect} from "react";
import axios from 'axios';
import User from './User';

const UserList = ()=>{
const [users, setUsers] = useState([]);

useEffect(()=>{
    axios.get("http://127.0.0.1:8000/api/Users/list")
    .then(resp=>{
        console.log(resp);
        setUsers(resp.data);
    }).catch(err=>{
    console.log(err);
    });
},[]);
return(
    <div>
        {
            users.map(users=>
                <User users = {users}></User>
            )
        }
    </div>
)

}
export default UserList;