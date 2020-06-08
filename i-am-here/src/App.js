
import React from 'react';
import Dashboard from './themes/Dashboard'
import { Router, Switch, Route, Redirect } from 'react-router-dom'
import { isAuthenticated } from './services/auth'
import Login from './Login'
import history from './services/history'

const PrivateRoute = ({ component: Component, ...rest }) => (
  <Route
    {...rest}
    render={props =>
      isAuthenticated() ? (
        <Component {...props} />
      ) : (
          <Redirect to={{ pathname: "/login", state: { from: props.location } }} />
        )
    }
  />
);

export default function App() {
  return (
    <>
      <Router history={history}>
        <Switch>
          <PrivateRoute path="/dashboard"
            component={Dashboard}></PrivateRoute>
          <Route exact path="/" component={Login}>
          </Route>
        </Switch>
      </Router>
    </>
  );
}