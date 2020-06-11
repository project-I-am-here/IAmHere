import React from 'react';
import { Router, Switch, Route, Redirect } from 'react-router-dom';
import { isAuthenticated } from './services/auth';

const PrivateRoute = props => (
  isAuthenticated() ? (
    <Route {...props} />
  ) : (
      <Redirect to={{ pathname: "/login", state: { from: props.location } }} />
    )
);

export default PrivateRoute;