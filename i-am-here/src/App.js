
import React from 'react';
import Dashboard from './themes/Dashboard';
import { Router, Switch, Route, Redirect } from 'react-router-dom';
import Login from './Login';
import { history } from './services/history';
import PrivateRoute from './PrivateRoute';
import PublicRoute from './PublicRoute';

export default function App() {
  return (
    <Router history={history}>
      <Switch>
        <PrivateRoute path="/app"
          component={Dashboard} />
        <PublicRoute exact path="/login" component={Login}>
        </PublicRoute>
        <Route path="*"><h1>Página não encontrada</h1></Route>
      </Switch>
    </Router>
  );
}