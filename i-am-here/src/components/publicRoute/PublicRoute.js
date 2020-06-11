import React from 'react';
import { Route, Redirect } from 'react-router-dom';
import { isAuthenticated } from '../../services/auth';

const PublicRoute = props => (
  isAuthenticated() ? (
    <Redirect to={{ pathname: "/app/dashboard", state: { from: props.location } }} />
  ) : (
      <Route {...props} />
    )
);

export default PublicRoute;