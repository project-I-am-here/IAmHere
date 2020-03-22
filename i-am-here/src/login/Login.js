import React, { Component } from 'react';

import './Login.css';
import loginImage from '../assets/undraw_authentication_fsn5.svg'

export default class Login extends Component {
    render() {
        return (
            <div className="back-groud">
                <div className="card">
                    <div className="image-login">

                        <img src={loginImage}></img>
                    </div>
                    <div className="login-fields">
                        <h2>Entre na sua conta</h2>
                        <div className="input">
                            <label className="label-input-field">Usuário</label>
                            <input className="input-login"></input>
                        </div>
                        <div className="input">
                            <label className="label-input-field">Senha</label>
                            <input className="input-login" type="password"></input>
                        </div>
                        <div className="input">
                            <button className="button-confirm">Login</button>
                        </div>
                        <a className="recovery-links" href="#">Recuperar Login</a>
                        <a className="recovery-links" href="#">Criar Conta</a>
                    </div>
                </div>
            </div>
        );
    }
}
