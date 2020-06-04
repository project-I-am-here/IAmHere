import React, { useState } from 'react'
import { makeStyles } from '@material-ui/core/styles';
import {
    Grid,
    Dialog,
    DialogTitle,
    DialogActions,
    DialogContent,
    TextField,
    Button
} from '@material-ui/core'
import axios from 'axios';


const useStyles = makeStyles((theme) => ({
    root: {
        '& .MuiTextField-root': {
            margin: theme.spacing(1),
        },
    },
    textField: {
        width: '33.3ch'
    }
}));

export default function NewPatient(props) {
    const classes = useStyles();
    const [state, setState] = useState({
    })

    const handleClose = () => {
        props.handleClose(false)
    }

    const handleSubmit = () => {
        axios({
            method: 'post',
            url: 'http://api.moveisdevalor.com.br/public/api/user',
            responseType: 'json',
            data: state
        }).then(response => {
            console.log(response)
            handleClose()
        })
    }

    const handleChange = (evt) => {
        const value = evt.target.value;
        setState({
            ...state,
            [evt.target.name]: value
        });
    }

    return (
        <Dialog style={{ outline: 'none' }}
            fullWidth={true}
            open={props.toggle}
            onClose={handleClose}
        >
            <form className={classes.root} >
                <DialogContent>
                    <DialogTitle >
                        Novo paciente
                </DialogTitle>
                    <Grid container justify="center">
                        <Grid item>
                            <TextField
                                autoFocus
                                margin="dense"
                                name='name'
                                id="name"
                                value={state.name || ''}
                                onChange={e => handleChange(e)}
                                label="Nome"
                                type="text"
                                className={classes.textField}
                            />
                            <TextField
                                autoFocus
                                margin="dense"
                                name='surname'
                                id="surname"
                                value={state.surname || ''}
                                onChange={e => handleChange(e)}
                                label="Sobrenome"
                                type="text"
                                className={classes.textField}
                            />
                            <TextField
                                autoFocus
                                margin="dense"
                                name='email'
                                id="email"
                                value={state.email || ''}
                                onChange={e => handleChange(e)}
                                label="Email"
                                type="email"
                                fullWidth
                            />
                            <TextField
                                autoFocus
                                margin="dense"
                                id="profession"
                                name="profession"
                                value={state.profession || ''}
                                onChange={e => handleChange(e)}
                                label="Profissão"
                                type="text"
                                fullWidth
                            />
                            <TextField
                                autoFocus
                                margin="dense"
                                id="cpf"
                                name="cpf"
                                value={state.cpf || ''}
                                onChange={e => handleChange(e)}
                                label="CPF"
                                type="text"
                                className={classes.textField}
                            />
                            <TextField
                                autoFocus
                                margin="dense"
                                id="rg"
                                name="rg"
                                value={state.rg || ''}
                                onChange={e => handleChange(e)}
                                label="RG"
                                type="text"
                                className={classes.textField}
                            />
                            <TextField
                                autoFocus
                                margin="dense"
                                id="naturality"
                                name="naturality"
                                value={state.naturality || ''}
                                onChange={e => handleChange(e)}
                                label="Naturalidade"
                                type="text"
                                className={classes.textField}
                            />
                            <TextField
                                autoFocus
                                margin="dense"
                                id="phone"
                                name="phone"
                                value={state.phone || ''}
                                onChange={e => handleChange(e)}
                                label="Telefone"
                                type="text"
                                className={classes.textField}
                            />
                        </Grid>
                    </Grid>
                </DialogContent>
                <DialogActions>
                    {/* <Grid container
                    direction="row" justify="space-between">
                    <Grid item> */}
                    <Button color="secondary" onClick={handleClose}>Cancelar</Button>
                    {/* </Grid>
                    <Grid item> */}
                    <Button color="primary" onClick={handleSubmit}>Salvar</Button>
                    {/* </Grid>
                </Grid> */}
                </DialogActions>
            </form>
        </Dialog>
    )
}


// birtdate: "0000-00-00"
// cpf: 383244438
// email: "edson@email.com"
// id: 2
// id_adress: 0
// name: "Edson"
// naturality: "Curitiba"
// password: "teste"
// phone: 2147483647
// profession: "Programador"
// rg: ""
// status: 0
// surname: "Rodrigues Pinto"