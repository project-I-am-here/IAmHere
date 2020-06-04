
import React from 'react';
import Dashboard from './themes/Dashboard'
import { BrowserRouter as Router, Switch, Route, Redirect } from 'react-router-dom'
import { isAuthenticated } from './services/auth'
import Login from './Login'

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
      <Router>
        <Switch>
          <PrivateRoute path="/dashboard"
            component={() => Dashboard}></PrivateRoute>
          <Route exact path="/">
            <Login />
          </Route>
        </Switch>
      </Router>
    </>
  );
}