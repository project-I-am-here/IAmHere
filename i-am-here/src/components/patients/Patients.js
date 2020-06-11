import React from 'react';
import { useState, useEffect } from "react";
import Paper from '@material-ui/core/Paper';
import Table from '@material-ui/core/Table';
import TableBody from '@material-ui/core/TableBody';
import TableCell from '@material-ui/core/TableCell';
import TableContainer from '@material-ui/core/TableContainer';
import TableHead from '@material-ui/core/TableHead';
import TableRow from '@material-ui/core/TableRow';
import Button from '@material-ui/core/Button';
import Box from '@material-ui/core/Box';
import Grid from '@material-ui/core/Grid';
import NewPatient from '../newPatient/NewPatient';

import { api } from '../../services/api';



export default function Patients() {
  const [data, setData] = useState([]);
  const [toggle, setToggle] = useState(false);





  useEffect(() => {
    api.get('/users').then(response => {
      console.log(response.data);
      let patients = response.data;
      setData(patients);
    });
  }, []);

  return (
    <Grid container spacing={3}>
      <NewPatient handleClose={(data) => setToggle(data)} toggle={toggle}></NewPatient>
      <Grid item xs={12}>
        <Box component="span" m={1}>
          <Button variant="contained" color="primary" onClick={() => setToggle(true)}>Novo Paciente</Button>
        </Box>
      </Grid>
      <Grid item xs={12}>
        <Paper elevation={3}>
          <TableContainer>
            <Table>
              <TableHead>
                <TableRow>
                  <TableCell>Nome</TableCell>
                  <TableCell>Profissão</TableCell>
                  <TableCell>E-mail</TableCell>
                  <TableCell>Telefone</TableCell>
                </TableRow>
              </TableHead>
              <TableBody>
                {data.map((patient, index) =>
                  <TableRow key={patient.id}>
                    <TableCell>{patient.name} {patient.surname}</TableCell>
                    <TableCell>{patient.profession} </TableCell>
                    <TableCell>{patient.email}</TableCell>
                    <TableCell>{patient.phone}</TableCell>
                  </TableRow>
                )}
              </TableBody>
            </Table>
          </TableContainer>
        </Paper>
      </Grid>
    </Grid>
  );
}




