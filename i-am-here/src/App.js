
import React from 'react';
import Dashboard from './themes/Dashboard'
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom'
import Login from './Login'

export default function App() {
  return (
    <>
      <Router>
        <Switch>
          <Route path="/dashboard">
            <Dashboard></Dashboard>
          </Route>
        </Switch>
        <Switch>
          <Route path="/login">
            <Login />
          </Route>
        </Switch>
      </Router>
    </>
  );
}