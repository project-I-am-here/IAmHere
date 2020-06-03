
import React from 'react';
import Dashboard from './themes/Dashboard'
import { BrowserRouter as Router } from 'react-router-dom'

export default function App() {
  return (
    <>
      <Router>
        <Dashboard></Dashboard>
      </Router>
    </>
  );
}