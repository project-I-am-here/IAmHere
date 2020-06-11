import React from 'react';
import Dashboard from '../dashboard/Dashboard';
import { Router, Switch } from 'react-router-dom';
import Login from '../login/Login';
import { history } from '../../services/history';
import PrivateRoute from '../privateRoute/PrivateRoute';
import PublicRoute from '../publicRoute/PublicRoute';
import SignUp from '../signup/SignUp';

export default function Routes() {
  return (
    <Router history={history}>
      <Switch>
        <PrivateRoute path="/app"
          component={Dashboard} />
        <PublicRoute exact path="/login" component={Login}>
        </PublicRoute>
        <PublicRoute exact path="/signup" component={SignUp}>
        </PublicRoute>
        <PrivateRoute path="*"
          component={Dashboard} />
        <PublicRoute exact path="*" component={Login}>
        </PublicRoute>
      </Switch>
    </Router>
  );
}