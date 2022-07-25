import React from "react";
import '../App.css';
import { Link } from "react-router-dom";
const Head = () => {
    return ( 
        <div className = "App-header" >
        
        <Link to = "/" > < b > Home </b></Link >
        <Link to = "/userList" > < b > Users </b></Link >
        <Link to = "/contact" > < b > Contact </b></Link >
        </div>
    )
}

export default Head;